<template>
  <div class="flex flex-col">
    <div v-for="(item, key) in items" class="w-auto mb-1 flex">
      <span class="w-auto text-sm mr-4">{{ meta[key] }}</span>

      <div class="w-auto text-sm leading-5 font-semibold inline-block">
        <span v-if="item" class="text-green-500">
          True
        </span>
        <span v-else class="text-red-500">
          False
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'value',
    'field',
    'model',
    'module',
    'action'
  ],

  computed: {
    items () {
      return JSON.parse(this.value)
    },

    meta () {
      let meta = {}
      let items = this.field.meta

      for (let i in items) {
        let item = items[i]

        meta[item.key] = item.label
      }

      return meta
    }
  }
}
</script>
