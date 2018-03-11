/**
 * Multiselect plugin
 */
window.Vue = require('vue');

const Multiselect = VueMultiselect.Multiselect;

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
        },
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
    },
    watch: {
        // Set the form input when the tags modified.
        'value': function (val) {
            var str = '';
            for (var i = 0, len = val.length; i < len; i++) {
                if(i>0) {
                    str += '|';
                }
                str += val[i]
            }
            document.getElementById('tags-selected').value = str;
        }
    },
    created: function () {
        this.fetchAllTags();
    },
}).$mount('#multiselect')