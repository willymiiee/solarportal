<template>
  <div>
    <legend class="clearfix">
      <span class="pull-left">
        2. Services
      </span>
      <a @click.prevent="addItem" href="#" class="btn btn-sm btn-default pull-right">
        <i class="fa fa-plus"></i>
        Add Service
      </a>
    </legend>
    <div class="box-group" id="accordion-services">
      <template v-if="items.length > 0">
        <service-item
          v-for="(item, index) in items"
          :item="item"
          :key="index"
          :index="index">
        </service-item>
      </template>
      
      <p v-else class="lead">
        There is no services. <a href="#" @click.prevent="addItem">Add Service</a>
      </p>
    </div>
  </div>
</template>

<script>
  import ServiceItem from './ServiceItem.vue'

  export default {
    components: {
      'service-item': ServiceItem
    },
    props: ['current-value'],
    data () {
      return {
        items: []
      }
    },
    methods: {
      addItem () {
        if (this.items.length >= 5) {
          return alert('Maximal Service is 5')
        }

        this.items.push({
          'id': 0,
          'name': 'Service #'+ (this.items.length + 1),
          'image': null,
          'content': 'Lorem ipsum'
        })
      },
      deleteItem (item) {
        if (! confirm('Are you sure to delete this service?')) {
          return false
        }

        this.items.splice(this.items.indexOf(item), 1)
      },
      filterCurrentValue() {
        try {
          this.items = JSON.parse(this.currentValue)

          if (!_.isArray(this.items)) {
            this.items = []
          }

          // we should have filter for adding default value
          // that not provided by currentValue
          // ...
        }
        catch(err) {
          console.log(err)
          this.items = []
        }
      },
      defaultItem () {
        return {
          'id': 0,
          'name': '',
          'image': '',
          'content': ''
        }
      }
    },
    created () {
      if (this.currentValue.constructor !== Array) {
        this.filterCurrentValue()
      }
    },
    mounted () {
      // console.log('hello world')
      $('#accordion-services').collapse({
        toggle: true
      })
    }
  }
</script>