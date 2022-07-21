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
             document.getElementById("uploadPreviewImage").src = oFREvent.target.result;
         };
     },
     previewCurriculum() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("curriculum").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreviewCv").src = oFREvent.target.result;
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
        email: '',
        mail: '',
        content: '',
        number: '',
        checkMail: false,
        checkName: false,
        checkNumber: false,
    },
    updated(){
        if(this.nome == ''){
            this.checkName = false;
            console.log(this.checkName)
            console.log(this.nome)
        }else if(!this.nome.includes(' ') || this.nome.substr(-1) == ' ' || this.nome.substr(0, 1) == ' '){
            this.checkName = true;
            console.log(this.checkName)
        } else{
            this.checkName = false;
        }
        if(this.mail.includes('@', '.') == false && this.mail !== ''){
            this.checkMail = true
            console.log(this.checkMail)
        } else{
            this.checkMail = false
        }
        if(this.mail.includes('@', '.') == false && this.mail !== ''){
            this.checkMail = true
            console.log(this.checkMail)
        } else{
            this.checkMail = false
        }
    },
    created(){
        console.log('tua mamma')
    }
 })

