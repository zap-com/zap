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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/cardCarousel.js":
/*!**************************************!*\
  !*** ./resources/js/cardCarousel.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function truncateString(str, num) {
  // If the length of str is less than or equal to num
  // just return str--don't truncate it.
  if (str.length <= num) {
    return str;
  } // Return str truncated with '...' concatenated to the end of str.


  return str.slice(0, num) + '...';
}

fetch('/announcement/json').then(function (response) {
  return response.json();
}).then(function (data) {
  data.forEach(function (product) {
    var trendingWrapper = document.querySelector('#trending-wrapper');
    var prodTitle = truncateString(product.title, 24);
    var prodDescription = truncateString(product.description, 120);
    var trendCard = document.createElement('a');
    trendCard.href = "/announcement/" + product.slug;

    if (product.images.length > 0) {
      var prodEl = product.images[0].file;
      var prodArr = prodEl.split("/");
      var prodImage = "/storage/" + prodArr[0] + "/" + prodArr[1] + "/crop200x150_" + prodArr[2];
    } else {
      var prodImage = 'https://placehold.it/200x150/999/CCC';
    }

    if (product.price <= 0) {
      var prodPrice = "Gratis";
    } else {
      var prodPrice = product.price + " €";
    }

    ;
    trendCard.classList.add('d-flex', 'card', 'product-card', 'swiper-slide', 'mb-0', 'h-100');
    trendCard.innerHTML = "\n                <img src=\"".concat(prodImage, "\" class=\"card-img-top px-1 pt-1 pb-0\" alt=\"").concat(prodTitle, "\">\n        <div class=\"card-body pt-1 px-2\">\n          <h5 class=\"p font-weight-bold card-title slide-title pt-1 pb-0 mb-0\">").concat(prodTitle, "</h5>\n          <button type=\"button\"\n                    onClick=\"location.href='/category/").concat(product.category.slug, "'; event.preventDefault(); event.stopPropagation()\"\n                    class=\"nobtn\">").concat(product.category.name, "</button>\n          <!--<div class=\"d-flex d-row align-items-center py-0 location-row mb-2\">\n            <i class=\"icon-location-pin pr-1\"></i>\n            <p class=\"my-0 location-text\">{product.location}</p>\n          </div>-->\n          <p class=\"card-text text-muted pt-0 slide-description\">").concat(prodDescription, "\n          </p >\n        </div >\n            <p class=\"product-price align-self-end text-right mb-0 p-2\">").concat(prodPrice, "</p>\n        ");
    trendingWrapper.appendChild(trendCard);
  });
  var trendingSwiper = new Swiper('#trending-slider', {
    // Optional parameters
    loop: false,
    speed: 600,
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 2,
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 10
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 2,
        slidesPerGroup: 2
      },
      1000: {
        slidesPerView: 4,
        slidesPerGroup: 2,
        spaceBetween: 20
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.trend-next',
      prevEl: '.trend-prev'
    }
  });
});

/***/ }),

/***/ 4:
/*!********************************************!*\
  !*** multi ./resources/js/cardCarousel.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/d/root/dev/wa/zap_presto/resources/js/cardCarousel.js */"./resources/js/cardCarousel.js");


/***/ })

/******/ });