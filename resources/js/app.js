import './bootstrap';
import Vue from 'vue';
import WordTagsInput from './components/WordTagsInput';
import WordRead from './components/WordRead';
import SearchForm from './components/SearchForm';

const app = new Vue({
    el:'#app',
    components:{
        WordTagsInput,
        WordRead,
        SearchForm,
    }
});