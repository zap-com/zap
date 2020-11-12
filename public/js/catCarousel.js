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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/catCarousel.js":
/*!*************************************!*\
  !*** ./resources/js/catCarousel.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

fetch('/announcement/catjson').then(function (response) {
  return response.json();
}).then(function (data) {
  var categoryWrapper = document.querySelector('#category-wrapper');
  var catCard1 = document.createElement('a');

  if (localStorage.getItem('locale') == 'it-IT') {
    var allPro = 'Tutto';
  } else {
    var allPro = 'All categories';
  }

  catCard1.classList.add('d-flex', 'card', 'swiper-slide', 'card-category', 'align-items-center', 'pt-3', 'h-100');
  catCard1.href = "/announcement/";
  catCard1.innerHTML = "\n            <img class=\"card-img-top mx-auto\" src=\"./icons/all.svg\"></img>\n            <div class=\"card-body pb-0\">\n              <h5 class=\"card-title text-center mb-0\">".concat(allPro, "</h5>\n            </div>\n            ");
  categoryWrapper.appendChild(catCard1);
  data.forEach(function (category) {
    var categoryWrapper = document.querySelector('#category-wrapper');

    if (localStorage.getItem('locale') == 'it-IT') {
      var catName = category.name_it;
    } else {
      var catName = category.name;
    }

    var catCard = document.createElement('a');
    catCard.classList.add('d-flex', 'card', 'swiper-slide', 'card-category', 'align-items-center', 'pt-3', 'h-100');
    catCard.href = "/category/" + category.slug;
    catCard.innerHTML = "\n            <img class=\"card-img-top mx-auto\" src=\"".concat(category.icon, "\"></img>\n            <div class=\"card-body pb-0\">\n              <h5 class=\"card-title text-center mb-0\">").concat(catName, "</h5>\n            </div>\n            ");
    categoryWrapper.appendChild(catCard);
  });
  var mySwiper = new Swiper('#category-slider', {
    // Optional parameters
    loop: false,
    speed: 600,
    slidesPerView: 8,
    spaceBetween: 10,
    slidesPerGroup: 3,
    hideOnClick: true,
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 4,
        spaceBetween: 10
      },
      // when window width is >= 640px
      990: {
        slidesPerView: 6,
        spaceBetween: 20
      },
      1220: {
        slidesPerView: 8,
        hideOnClick: true
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.cat-next',
      prevEl: '.cat-prev',
      hideOnClick: true
    },
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true
    }
  });
});

/***/ }),

/***/ 6:
/*!*******************************************!*\
  !*** multi ./resources/js/catCarousel.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/d/root/dev/wa/zap_presto/resources/js/catCarousel.js */"./resources/js/catCarousel.js");


/***/ })

/******/ });