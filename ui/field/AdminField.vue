<template>
  <div v-if="formReady" class="flex flex flex-wrap my-4">
    <div v-for="item in field.meta" class="w-auto mb-2 mr-8 clear">
      <label class="text-gray-700 text-sm mb-1">{{ item.label }}</label>

      <Toggle
        :field="`${field.column_name}-${item.key}`"
        v-model="selected[item.key]"
        @update:modelValue="update(item.key, $event)"
      />
    </div>
  </div>
</template>

<script>
import Toggle from '@/Adaptcms/Base/ui/components/Form/Toggle'

export default {
  props: [
    'modelValue',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  emits: [
    'update:modelValue'
  ],

  components: {
    Toggle
  },

  watch: {
    modelValue (newVal, oldVal) {
      if (newVal !== oldVal && newVal !== 'null') {
        this.selected = JSON.parse(newVal)
      }
    }
  },

  data () {
    return {
      selected: {},
      formReady: false
    }
  },

  methods: {
    update (key, $event) {
      if (typeof $event !== 'undefined') {
        this.selected[key] = $event

        this.$emit('update:modelValue', JSON.stringify(this.selected))
      }
    }
  },

  mounted () {
    if (this.modelValue && this.modelValue !== 'null') {
      this.selected = JSON.parse(this.modelValue)
    } else {
      let items = this.field.meta
      for (let i in items) {
        this.selected[items[i].key] = false
      }
    }

    this.formReady = true
  }
}
</script>
