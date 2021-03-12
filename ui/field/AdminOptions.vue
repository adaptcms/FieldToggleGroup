<template>
  <div class="flex-col">
    <div class="w-full mb-2">
      <div class="flex justify-between">
        <label for="form-toggle-items" class="text-lg font-normal text-gray-700 w-auto">
          Toggle Items
          <span class="text-sm text-red-500 font-bold">*</span>
        </label>

        <button
          type="button"
          class="w-auto opacity-75 hover:opacity-100 text-base font-semibold button-primary-alt py-4 px-6 inline-block shadow-md text-center lg:text-left my-2"
          @click.prevent="addToggleItem"
        >
          Add Item
        </button>
      </div>

      <div v-if="selected.length" class="flex flex-col">
        <div v-for="(item, index) in selected" class="w-full mb-2 flex justify-between">
          <div class="w-auto">
            <label class="text-gray-700 text-sm">Key</label>

            <input type="text" v-model="selected[index].key" class="text-base py-3 px-3 shadow-sm block mt-1 border w-auto" />
          </div>

          <div class="w-auto">
            <label class="text-gray-700 text-sm">Label</label>

            <input type="text" v-model="selected[index].label" class="text-base py-3 px-3 shadow-sm block mt-1 border w-auto" />
          </div>

          <div class="w-auto mt-7">
            <button
              type="button"
              class="inline-flex items-center px-5 py-4 bg-red-200 border border-red-300 text-sm leading-5 font-medium rounded-md text-red-500 bg-white hover:text-red-800 focus:outline-none focus:shadow-outline-red focus:border-red-300 active:text-red-900 active:bg-red-50 transition duration-150 ease-in-out opacity-75 hover:opacity-100"
              @click.prevent="deleteToggleItem(index)"
            >
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <span v-if="hasError" class="border-red-700 block px-2 py-2 text-sm text-red-100 bg-red-500">
      At least one toggle group item is required with a key and label value
    </span>
  </div>
</template>

<script>
import { get, isEmpty } from 'lodash'

export default {
  props: [
    'value',
    'field',
    'package',
    'errors',
    'fields'
  ],

  watch: {
    value (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected: {
      handler: function (newVal, oldVal) {
        this.$emit('input', newVal)
      },
      deep: true
    }
  },

  computed: {
    hasError () {
      let keys = [
        'meta',
        'meta.0',
        'meta.0.key',
        'meta.0.label'
      ]
      let errors = get(this.$page, 'props.errors')

      let hasError = keys.filter(key => {
        return typeof errors[key] !== 'undefined'
      })

      return hasError.length
    }
  },

  data () {
    return {
      selected: []
    }
  },

  methods: {
    addToggleItem () {
      this.selected.push({
        key: '',
        label: ''
      })
    },

    deleteToggleItem (index) {
      this.selected.splice(index, 1)
    }
  },

  mounted () {
    if (!isEmpty(this.value)) {
      this.selected = this.value
    } else {
      this.$emit('input', this.selected)
    }
  }
}
</script>
