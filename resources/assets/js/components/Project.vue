<template>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Galeri</h3>
      <div class="box-tools pull-right">
        <button type="button" @click.prevent="addItem" class="btn btn-box-tool" ><i class="fa fa-plus"></i> Tambah</button>
      </div> <!-- /.box-tools -->
    </div>
    <div class="box-body">
      <template v-if="items.length > 0">
        <project-image
          v-for="(item, index) in items"
          :item="item"
          :key="index"
          :index="index"></project-image>
      </template>
      <p v-else class="text-muted">Tidak ada gambar saat ini</p>
    </div>
  </div>
</template>

<script>
  import ProjectImage from './ProjectImage.vue'

  export default {
    components: {
      'project-image': ProjectImage
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
          return alert('Maximal Images is 5')
        }

        this.items.push({
          'imgFile': null,
          'imgCurrent': null,
          'path': null
        })
      },
      deleteItem (item) {
        if (this.items.length == 1) {
          return alert('Gambar minimal 1')
        }

        if (! confirm('Anda yakin untuk menghapus gambar ini?')) {
          return false
        }

        this.items.splice(this.items.indexOf(item), 1)
      },
      init () {
        // do process current value that given from database
        try {
          this.items = JSON.parse(this.currentValue)
        } catch (err) {
          this.items = []
        }
      }
    },
    created () {
      if (this.currentValue.constructor !== Array) {
        this.init()
      }
    }
  }
</script>