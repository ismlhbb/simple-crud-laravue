/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal', {
    template: '#modal-template'
})

const app = new Vue({
    el: '#app',
    data: {
        newStudent: { 'name': '', 'major': '' },
        hasError: true,
        students: [],
        e_id: '',
        e_name: '',
        e_major: '',
    },

    mounted: function mounted() {
        this.getStudents();
    },

    methods: {
        getStudents: function getStudents() {
            var _this = this;
            axios.get('/getStudents').then(function (response) {
                _this.students = response.data;
            }).catch(error => {
                console.log("Get All: " + error);
            });
        },

        createStudent: function createStudent() {
            var input = this.newStudent;
            var _this = this;
            if (input['name'] == '' || input['major'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError = true;
                axios.post('/storeStudent', input).then(function (response) {
                    _this.newStudent = { 'name': '', 'major': '' }
                    _this.getStudents();
                }).catch(error => {
                    console.log("Insert: " + error);
                });
            }
        },

        deleteStudent: function deleteStudent(student) {
            var _this = this;
            axios.post('/deleteStudent/' + student.id).then(function (response) {
                _this.getStudents();
            }).catch(error => {
                console.log("Delete student: " + error);
            });
        },

        setVal(val_id, val_name, val_major) {
            this.e_id = val_id;
            this.e_name = val_name;
            this.e_major = val_major;
        },

        editStudent: function () {
            var _this = this;
            var id_val_1 = document.getElementById('e_id');
            var name_val_1 = document.getElementById('e_name');
            var major_val_1 = document.getElementById('e_major');
            var major = document.getElementById('myModal').value;
            axios.post('/editStudents/' + id_val_1.value, { val_1: name_val_1.value, val_2: major_val_1.value })
                .then(response => {
                    _this.getStudents();
                });
        },
    }
});

