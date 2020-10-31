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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/authForm.js":
/*!**********************************!*\
  !*** ./resources/js/authForm.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBtn = document.querySelector("#registerBtn");
registerBtn.addEventListener("click", function (e) {
  var form = document.querySelector("#form");
  var formInner = document.querySelector("#formInner");
  var oldFormInner = formInner.innerHTML;
  console.log('click');
  e.preventDefault(); //Toogle form action

  if (form.action.includes("login")) {
    form.action = "http://localhost:8000/register";
    formInner.innerHTML = "<div class=\"form-group\">\n        <label for=\"name\">Your name and surname</label>\n        <input type=\"text\" class=\"form-control \" name=\"name\"\n            id=\"name\" value=\"\" required autocomplete=\"name\" autofocus>\n    \n     \n            </div>\n            <div class=\"form-group\">\n                <label for=\"email\">Email</label>\n                <input type=\"email\" class=\"form-control \"\n                    name=\"email\" id=\"email\" aria-describedby=\"emailHelp\"  }}\"\n                    required autocomplete=\"email\" autofocus>\n            \n            </div>\n            <div class=\"form-group\">\n                <label for=\"password\">Password</label>\n                <input id=\"password\" type=\"password\"\n                    class=\"form-control\" name=\"password\"\n                    required autocomplete=\"current-password\">\n\n                \n            </div>\n            <div class=\"form-group\">\n                <label for=\"password-confirmation\">Confirm Password</label>\n                <input id=\"password-confirmation\" type=\"password\"\n                    class=\"form-control\"\n                    name=\"password_confirmation\" required autocomplete=\"current-password\">\n\n                \n            </div>\n            <div class=\"form-row align-items-center\">\n                <div class=\"col\">\n                    <button type=\"submit\"\n                        class=\"btn b-btn w-100\">Register</button>\n                </div>\n                <span class=\"px-3 text-muted\">or</span>\n                <div class=\"col text-center\">\n                    <a class=\"color-main\" id=\"#registerBtn\">Login</a>\n                </div>\n            </div>";
  } else if (form.action.includes("register")) {
    form.action = "http://localhost:8000/login";
  }
});

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/authForm.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\sebou\wa\hack18\zap_presto\resources\js\authForm.js */"./resources/js/authForm.js");


/***/ })

/******/ });