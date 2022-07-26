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
         //console.log(this.currentForm);
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
        users: [],
        checkMail: false,
        checkName: false,
        developers:[],
        selectedLanguage: 'nulla',
        selectedRate: 0,
        selectedNumber: 0,
        checkNumber: false,
        reviews: [],
        comments: [],
        createComment: false,
        createRev: false,
    }, 
    methods:{
        filtra: function(){
                axios.get(`/api/filter/${this.selectedLanguage}/${this.selectedRate}/${this.selectedNumber}`).then((res)=>{
                    this.developers = res.data;
                }).catch((error) =>{
                    console.log(error);
                });
            
        },
        redirect: function($id){
            let url = "{{route('admin.developers.show', ':id')}}"
            url = url.replace(':id', $id)
            return url
        },
        visualFormCom: function(){
            if(this.createComment == false){
                this.createComment = true
            } else{
                this.createComment = false
            }
        },
        visualFormRev: function(){
            if(this.createRev == false){
                this.createRev = true
            } else{
                this.createRev = false
            }
        },
    },
    updated(){
        if(this.nome == ''){
            this.checkName = false;
        }else if(!this.nome.includes(' ') || this.nome.substr(-1) == ' ' || this.nome.substr(0, 1) == ' '){
            this.checkName = true;
        } else{
            this.checkName = false;
        }
        if(this.mail.includes('@', '.') == false && this.mail !== ''){
            this.checkMail = true
        } else{
            this.checkMail = false
        }
        if(this.mail.includes('@', '.') == false && this.mail !== ''){
            this.checkMail = true
        } else{
            this.checkMail = false
        }
    },
    created(){
            axios.get(`/api/filter/${this.selectedLanguage}/${this.selectedRate}/${this.selectedNumber}`).then((res)=>{
                this.developers = res.data;
            }).catch((error) =>{
                console.log(error);
            });
        
        let idDev = document.getElementById('idDev').value


            axios.get(`/api/review/${idDev}`).then((res)=>{
                this.reviews = res.data;
                console.log(this.reviews);
            }).catch((error) =>{
                console.log(error);
            });

            axios.get(`/api/comm/${idDev}`).then((res)=>{
                this.comments = res.data;
                console.log(this.comments);
            }).catch((error) =>{
                console.log(error);
            });
    }
 })

 

