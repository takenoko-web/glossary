<template>
  <div>
    <input type="hidden" name="tags" :value="tagsJson">
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="最大3つまで登録できます"
      :autocomplete-items="filteredItems"
      :add-on-key="[13, 32]"
      @tags-changed="newTags => tags = newTags"
    />
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput,
  },
  props: {
      initialTags: {
          type:Array,
          default: [],
      },
      autocompleteItems: {
          tupe:Array,
          default: [],
      },
  },
  data() {
    return {
      tag: '',
      tags: this.initialTags,
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
        return JSON.stringify(this.tags);
    },
  },
};
</script>
<style lang="css" scoped>
  .vue-tags-input {
    max-width: inherit;
  }
</style>
<style lang="css">
  .vue-tags-input .ti-tag {
    background: transparent;
    border: 1px solid #747373;
    color: #747373;
    margin-right: 4px;
    border-radius: 0px;
    font-size: 13px;
  }
</style>