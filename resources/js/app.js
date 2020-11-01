
require('./bootstrap');

window.Vue = require('vue');
import Vue2Editor from "vue2-editor";

Vue.use(Vue2Editor);
   Vue.component("modal", {
        template: "#modal-template"
      });


const app = new Vue({
    el: '#app',
    data: {
    	newItem : {'name' : '', 'age' : '', 'description' : ''},
    	hasError : 'invisible',
    	items : [],
    	showModal: false,
    	e_id :'',
		e_name :'',
		e_age :'',
		e_description :''
    },
    mounted: function mounted() {
    	    		// alert("ss");
    	this.getItems();
    },
    methods:{
    	getItems : function getItems() {
    		// alert("ss");
    		var _this = this;
    		axios.get('/getdata').then(function (response) {
    			_this.items = response.data;
    			// console.log(_this.data);
    		});
    	},
    	setVal(val_id, val_name, val_age, val_description){
    		this.e_id=val_id;
    		this.e_name=val_name;
    		this.e_age=val_age;
    		this.e_description=val_description;
    	},
    createItem : function createItem() {
    	var input = this.newItem;
    	var _this= this;
    	if(input['name'] == '' || input['description'] == '' || input['age'] == ''){
    		this.hasError = 'visible';
    	}else{

    		this.hasError='invisible';
    		axios.post('/setdata',input).then(function (response) {
    			_this.newItem = {'name' : '', 'age' : '', 'description' : ''};
    			_this.getItems();
    		});
    		// alert("ss");
    	}
    },
    deleteItem : function deleteItem (item) {
    	var _this = this;
    	axios.post('/deleteiteme/'+ item.id).then(function (response) {
    		_this.getItems();
    	})
    },
      editItem : function editItem (id) {
    	var name=document.getElementById('e_name');
    	var age=document.getElementById('e_age');
    	var description=document.getElementById('e_description');
    	var _this= this;
    	// console.log(name.value);
    		axios.post('/edititeme/'+id , {val1: name.value , val2: age.value ,val3: description.value}).then(function (response) {
    			// _this.newItem = {'name' : '', 'age' : '', 'description' : ''};
    			_this.getItems();
    			_this.showModal=false;
    		});
    	
    },
    pdf : function pdf() {
    	var _this = this;
    	axios.get('/pdf').then(function (response) {
    			var p = response.pdf;
    			console.log(_this.p);
    		});
    }
}
});
