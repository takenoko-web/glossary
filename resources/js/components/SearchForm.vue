<template>
    <div class="col-12">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" list="word-list" 
        type="text" placeholder="Search" aria-label="Search" autocomplete="on" name="word"
        v-model="search" @input="autocompleteSearch">
        <datalist id="word-list">  

        </datalist>
        <div>
            <div class="custom-control custom-radio custom-control-inline p-5">
                <input type="radio" class="custom-control-input" id="type-0" name="type" value="0" checked>
                <label class="custom-control-label" for="type-0">完全一致</label>
            </div>
            <option v-for="word in words" :key="word">{{word}}</option>
            <div class="custom-control custom-radio custom-control-inline p-5">
                <input type="radio" class="custom-control-input" id="type-1" name="type" value="1">
                <label class="custom-control-label" for="type-1">部分一致</label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        endpoint:{
            type: String,
        },
        search:{
            type: String,
            default: '',
        },
    },
    data() {
        return {
            //words: this.words,
            seachValue: this.search,
        };
    },
    methods: {
        async autocompleteSearch() {
            const response = await axios.get(this.endpoint, {
                word: this.seachValue,
            });

            console.log(response);
        },
    },
}
</script>