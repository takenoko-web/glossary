<template>
  <div>
    <div class="md-form">
      <label for="word">用語</label>
      <input type="text" name="word" id="word" class="form-control" v-model="word" required @input="handleNameInput">
    </div>
    <div class="md-form">
      <label for="read">読み</label>
      <input type="text" name="read" id="read" class="form-control" v-model="read">
    </div>
  </div>
</template>
<script>
  import * as AutoKana from 'vanilla-autokana';

  let word;
  let read;

  export default {
    props: {
      initialInputWord:{
        type:String,
        default: '',
      },
      initialInputRead: {
        type:String,
        default: '',
      },
    },
    data() {
        return{
            word: this.initialInputWord,
            read: this.initialInputRead,
        };
    },
    mounted() {
      word = AutoKana.bind('#word');
      read = AutoKana.bind('#read');
    },
    methods: {
      handleNameInput() {
        this.read = word.getFurigana();
      }
    }
  }
</script>