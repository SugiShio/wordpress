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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./ludens/assets/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./ludens/assets/app.js":
/*!******************************!*\
  !*** ./ludens/assets/app.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./sass/app.scss */ \"./ludens/assets/sass/app.scss\");\n__webpack_require__(/*! ./js/app.js */ \"./ludens/assets/js/app.js\");\n\n//# sourceURL=webpack:///./ludens/assets/app.js?");

/***/ }),

/***/ "./ludens/assets/js/app.js":
/*!*********************************!*\
  !*** ./ludens/assets/js/app.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("var SmoothScroll = __webpack_require__(/*! ./smoothScroll */ \"./ludens/assets/js/smoothScroll.js\");\nvar Hamburger = __webpack_require__(/*! ./hamburger */ \"./ludens/assets/js/hamburger.js\");\nvar SlickSettings = __webpack_require__(/*! ./slickSettings */ \"./ludens/assets/js/slickSettings.js\");\n$(function () {\n  $(window).on('load', function () {\n    new SmoothScroll();\n    new Hamburger();\n    new SlickSettings();\n  });\n});\n\n//# sourceURL=webpack:///./ludens/assets/js/app.js?");

/***/ }),

/***/ "./ludens/assets/js/hamburger.js":
/*!***************************************!*\
  !*** ./ludens/assets/js/hamburger.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nmodule.exports = function Hamburger() {\n  var _this = this;\n\n  _classCallCheck(this, Hamburger);\n\n  this.$triggerOpen = $('.js-hamburger_trigger-open');\n  this.$triggerClose = $('.js-hamburger_trigger-close');\n  this.$content = $('.js-hamburger_content');\n  this.isOpen = false;\n\n  this.$triggerOpen.on('click', function () {\n    _this.isOpen = true;\n    _this.$content.slideDown();\n  });\n  this.$triggerClose.on('click', function () {\n    _this.isOpen = false;\n    _this.$content.slideUp();\n  });\n};\n\n//# sourceURL=webpack:///./ludens/assets/js/hamburger.js?");

/***/ }),

/***/ "./ludens/assets/js/slickSettings.js":
/*!*******************************************!*\
  !*** ./ludens/assets/js/slickSettings.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nmodule.exports = function slickSettings() {\n  _classCallCheck(this, slickSettings);\n\n  $(function () {\n    $('.js-slick').slick({\n      autoplay: true,\n      autoplaySpeed: 5000,\n      arrows: false,\n      dots: true,\n      infinite: true,\n      speed: 500,\n      fade: true,\n      cssEase: 'linear'\n    });\n  });\n};\n\n//# sourceURL=webpack:///./ludens/assets/js/slickSettings.js?");

/***/ }),

/***/ "./ludens/assets/js/smoothScroll.js":
/*!******************************************!*\
  !*** ./ludens/assets/js/smoothScroll.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nmodule.exports = function SmoothScroll() {\n   _classCallCheck(this, SmoothScroll);\n\n   $(function () {\n      $('a[href^=#]').click(function () {\n         var speed = 400;\n         var href = $(this).attr(\"href\");\n         var target = $(href == \"#\" || href == \"\" ? 'html' : href);\n         var position = target.offset().top;\n         $('body,html').animate({ scrollTop: position }, speed, 'swing');\n         return false;\n      });\n   });\n};\n\n//# sourceURL=webpack:///./ludens/assets/js/smoothScroll.js?");

/***/ }),

/***/ "./ludens/assets/sass/app.scss":
/*!*************************************!*\
  !*** ./ludens/assets/sass/app.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin\n\n//# sourceURL=webpack:///./ludens/assets/sass/app.scss?");

/***/ })

/******/ });