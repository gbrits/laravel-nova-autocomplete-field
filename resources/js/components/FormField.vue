<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <input
        :id="field.attribute"
        type="text"
        class="w-full form-control form-input form-input-bordered"
        :class="errorClasses"
        :placeholder="field.name"
        v-model="value"
        @input="onInput"
        ref="autocompleteInput"
      />
      <ul v-if="suggestions.length" class="autocomplete-suggestions">
        <li v-for="suggestion in suggestions" :key="suggestion" @click="selectSuggestion(suggestion)">
          {{ suggestion }}
        </li>
      </ul>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  data() {
    return {
      suggestions: []
    };
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },

    /**
     * Handle input event to filter suggestions.
     */
     onInput() {
      const searchTerm = this.value.toLowerCase();
      if (searchTerm) {
        this.suggestions = this.field.items.filter(item => item.toLowerCase().includes(searchTerm));
      } else {
        this.suggestions = [];
      }
    },

    /**
     * Select a suggestion from the list.
     */
    selectSuggestion(suggestion) {
      this.value = suggestion;
      this.suggestions = [];
    }
  }
}
</script>

<style scoped>
.autocomplete-suggestions {
  border: 1px solid #ddd;
  max-height: 150px;
  overflow-y: auto;
  background: white;
}
.autocomplete-suggestions li {
  padding: 8px;
  cursor: pointer;
}
.autocomplete-suggestions li:hover {
  background: #f0f0f0;
}
</style>
