/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
window.boolpress = {
  currentForm: null,
  itemid: null,
  openModal: function openModal(e, id) {
    e.preventDefault(); //console.log(id);

    this.itemid = id; //console.log(e.currentTarget);

    this.currentForm = e.currentTarget.parentNode; //console.log(this.currentForm);

    $('#deleteModal-body').html("Sei sicuro di voler eliminare l'elemento con id: ".concat(this.itemid));
    $('#deleteModal').modal('show');
  },
  previewImage: function previewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("photo").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreviewImage").src = oFREvent.target.result;
    };
  },
  previewCurriculum: function previewCurriculum() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("curriculum").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreviewCv").src = oFREvent.target.result;
    };
  },
  submitForm: function submitForm() {
    this.currentForm.submit();
  }
};
var app = new Vue({
  el: '#app',
  data: {
    nome: '',
    email: '',
    mail: '',
    content: '',
    number: '',
    users: [],
    checkMail: false,
    checkName: false,
    developers: [],
    selectedLanguage: 'nulla',
    selectedRate: 0,
    selectedNumber: 0,
    checkNumber: false,
    reviews: [],
    comments: [],
    createComment: false,
    createRev: false
  },
  methods: {
    filtra: function filtra() {
      var _this = this;

      axios.get("/api/filter/".concat(this.selectedLanguage, "/").concat(this.selectedRate, "/").concat(this.selectedNumber)).then(function (res) {
        _this.developers = res.data;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    redirect: function redirect($id) {
      var url = "{{route('admin.developers.show', ':id')}}";
      url = url.replace(':id', $id);
      return url;
    },
    visualFormCom: function visualFormCom() {
      if (this.createComment == false) {
        this.createComment = true;
      } else {
        this.createComment = false;
      }
    },
    visualFormRev: function visualFormRev() {
      if (this.createRev == false) {
        this.createRev = true;
      } else {
        this.createRev = false;
      }
    }
  },
  updated: function updated() {
    if (this.nome == '') {
      this.checkName = false;
    } else if (!this.nome.includes(' ') || this.nome.substr(-1) == ' ' || this.nome.substr(0, 1) == ' ') {
      this.checkName = true;
    } else {
      this.checkName = false;
    }

    if (this.mail.includes('@', '.') == false && this.mail !== '') {
      this.checkMail = true;
    } else {
      this.checkMail = false;
    }

    if (this.mail.includes('@', '.') == false && this.mail !== '') {
      this.checkMail = true;
    } else {
      this.checkMail = false;
    }
  },
  created: function created() {
    var _this2 = this;

    axios.get("/api/filter/".concat(this.selectedLanguage, "/").concat(this.selectedRate, "/").concat(this.selectedNumber)).then(function (res) {
      _this2.developers = res.data;
    })["catch"](function (error) {
      console.log(error);
    });
    var idDev = document.getElementById('idDev').value;
    axios.get("/api/review/".concat(idDev)).then(function (res) {
      _this2.reviews = res.data;
      console.log(_this2.reviews);
    })["catch"](function (error) {
      console.log(error);
    });
    axios.get("/api/comm/".concat(idDev)).then(function (res) {
      _this2.comments = res.data;
      console.log(_this2.comments);
    })["catch"](function (error) {
      console.log(error);
    });
  }
});

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")["default"];
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/front.scss":
/*!***********************************!*\
  !*** ./resources/sass/front.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*******************************************************************************************!*\
  !*** multi ./resources/js/admin.js ./resources/sass/app.scss ./resources/sass/front.scss ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\MAMP\htdocs\esercizi\progetto_finale\resources\js\admin.js */"./resources/js/admin.js");
__webpack_require__(/*! C:\MAMP\htdocs\esercizi\progetto_finale\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\MAMP\htdocs\esercizi\progetto_finale\resources\sass\front.scss */"./resources/sass/front.scss");


/***/ })

/******/ });