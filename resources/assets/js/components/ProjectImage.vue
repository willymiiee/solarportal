<template>
  <div style="position: relative;">
    <span class="badge" style="position: absolute; left: 10px; top: 5px;">{{ this.index + 1 }}</span>
    <a @click.prevent="$parent.deleteItem(item)" href="#" class="btn btn-default btn-sm" style="position: absolute; right: 10px; top: 0px;">
      <i class="fa fa-trash"></i>
      Hapus
    </a>
    <p style="margin-bottom: 20px;">&nbsp;</p>
    <input type="hidden" :name="'imgCurrents['+ this.index +']'" :value="this.item.path" />
    <a v-if="this.item.path" class="thumbnail">
      <img :src="this.item.url">
    </a>
    <input type="file" :name="'images['+ this.index +']'" class="form-control" accept="image/*" />

    <hr/>
  </div>
</template>

<script>
  export default {
    props: ['item', 'index'],
    data () {
      return {}
    },
    methods: {
      // 
    }
  }
</script>