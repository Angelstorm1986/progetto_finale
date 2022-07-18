/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');


 window.boolpress = {
     currentForm: null,
     itemid: null,
     openModal(e,id){
         e.preventDefault();
         //console.log(id);
         this.itemid = id;
         //console.log(e.currentTarget);
         this.currentForm = e.currentTarget.parentNode;
         // console.log(this.currentForm);
         $('#deleteModal-body').html(`Sei sicuro di voler eliminare l'elemento con id: ${this.itemid}`);
         $('#deleteModal').modal('show');
     },
     previewImage() {
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("photo").files[0]);
 
         oFReader.onload = function (oFREvent) {
             document.getElementById("uploadPreview").src = oFREvent.target.result;
         };
     },
     previewCurriculum() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("curriculum").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    },
     submitForm(){
         this.currentForm.submit();
     }
 
 }

 const app = new Vue({
    el: '#app',
    data:{
        nome : '',
        surname : '',
        address: '',
        date_of_birth: '',
        email: '',
        password: '',
        password_confirmation: '',
    },
    updated(){
        if(this.nome.length > 3 && this.nome != ''){
            console.log(this.nome)
        } else{

        }
    },
    created(){
        console.log('tua mamma')
    }
 })

