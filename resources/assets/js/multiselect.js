/**
 * Multiselect plugin
 */
window.Vue = require('vue');

const Multiselect = VueMultiselect.Multiselect;
import axios from 'axios';

new Vue({
    components: {
        Multiselect: window.VueMultiselect.default
    },
    data: function () {
        return {options: [], value: []}
    },
    props: {
        trackBy: {
            type: String,
            default: 'id'
        }
    },
    methods: {
        fetchAllTags: function () {
            var vm = this;

            // Get the fresh tags
            axios.get('/tags/get-all-tags')
                .then(function (response) {

                    var data = response.data;

                    var arr = [];
                    for (var i = 0, len = data.length; i < len; i++) {
                        arr.push(data[i].name);
                    }

                    vm.$set(vm, 'options', arr);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        fetchConnectedTags: function () {
            var vm = this;
            var element = document.getElementById('post-id');

            // Check the post-id is exist
            if (element === null ) {
                return false;
            }

            var postId = element.value;

            // Get the connected tags for the post
            axios.get('/posts/' + postId + '/tags')
                .then(function (response) {

                    var data = response.data;

                    var arr = [];
                    for (var i = 0, len = data.length; i < len; i++) {
                        arr.push(data[i].name);
                    }

                    vm.$set(vm, 'value', arr);

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
    created: function () {
        this.fetchConnectedTags();
        this.fetchAllTags();
    }
}).$mount('#multiselect');