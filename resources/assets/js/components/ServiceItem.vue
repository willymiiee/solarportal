<template>
  <div class="panel box box-default">
    <div class="box-header with-border clearfix">
      <h4 class="box-title pull-left">
        <a data-toggle="collapse" data-parent="#accordion-services" :href="'#collapse-'+ index" aria-expanded="false" class="collapsed">
          {{ item.name }}
        </a>
      </h4>
      <a @click.prevent="$parent.deleteItem(item)" href="#" class="btn btn-sm btn-danger pull-right">
        <i class="fa fa-trash"></i>
      </a>
    </div>
    <div :id="'collapse-'+ index" class="panel-collapse collapse" aria-expanded="false">
      <input type="hidden" :name="inputName('id')" v-model="item.id">
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input type="text" :name="inputName('name')" v-model="item.name" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
            <div v-if="item.image">
              <a href="#" class="thumbnail">
                <img :src="item.image">
              </a>
              <button type="button" @click="removeImage" class="btn btn-default">Remove image</button>
            </div>
            <div v-show="!item.image">
              <input type="file" :name="inputName('image')" @change="onFileChange" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Detail</label>
          <div class="col-sm-9">
            <textarea :name="inputName('content')" v-model="item.content" class="form-control" rows="5"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['item', 'index'],
    data () {
      return {}
    },
    methods: {
      inputName (name) {
        return 'services['+ this.index +']['+ name +']'
      },
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files
        if (!files.length)
          return

        this.createImage(files[0])
      },
      createImage(file) {
        var image = new Image()
        var reader = new FileReader()
        var self = this

        reader.onload = (e) => {
          self.item.image = e.target.result
        }
        reader.readAsDataURL(file)
      },
      removeImage: function (e) {
        if (!confirm('Are you sure?')) {
          return
        }
        this.item.image = null
      }
    },
    created () {
      if (!_.has(this.item, 'id')) {
        this.item['id'] = 0
      }

      if (!_.has(this.item, 'image')) {
        this.item['image'] = null
      }
    },
    mounted () {
      // console.log('hello world')
    }
  }
</script>