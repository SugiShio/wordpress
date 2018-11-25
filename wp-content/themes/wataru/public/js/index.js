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
/******/ 	return __webpack_require__(__webpack_require__.s = "./wataru/assets/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./wataru/assets/app.js":
/*!******************************!*\
  !*** ./wataru/assets/app.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./sass/style.scss */ \"./wataru/assets/sass/style.scss\");\n__webpack_require__(/*! ./js/script.js */ \"./wataru/assets/js/script.js\");\n\n//# sourceURL=webpack:///./wataru/assets/app.js?");

/***/ }),

/***/ "./wataru/assets/js/hamburger.js":
/*!***************************************!*\
  !*** ./wataru/assets/js/hamburger.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar CONTENT_ID = 'js-hamburger_content';\nvar TRIGGER_ID = 'js-hamburger_trigger';\nvar BG_ID = 'js-hamburger_bg';\nvar SHOW_CLASS = 'is-shown';\n\nvar Hamburger = function Hamburger() {\n  var _this = this;\n\n  _classCallCheck(this, Hamburger);\n\n  this.$content = $('#' + CONTENT_ID);\n  this.$trigger = $('#' + TRIGGER_ID);\n  this.$bg = $('#' + BG_ID);\n  this.isShown = false;\n\n  this.$trigger.on('click', function () {\n    if (_this.isShown) {\n      _this.isShown = false;\n      _this.$content.removeClass(SHOW_CLASS);\n      _this.$trigger.removeClass(SHOW_CLASS);\n      _this.$bg.removeClass(SHOW_CLASS);\n    } else {\n      _this.isShown = true;\n      _this.$content.addClass(SHOW_CLASS);\n      _this.$trigger.addClass(SHOW_CLASS);\n      _this.$bg.addClass(SHOW_CLASS);\n    }\n  });\n};\n\n$(function () {\n  if (!$('#' + CONTENT_ID)[0] || !$('#' + TRIGGER_ID)[0]) return;\n  new Hamburger();\n});\n\n//# sourceURL=webpack:///./wataru/assets/js/hamburger.js?");

/***/ }),

/***/ "./wataru/assets/js/header.js":
/*!************************************!*\
  !*** ./wataru/assets/js/header.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar HEADER_CLASS = 'js-header';\nvar MAIN_CLASS = 'js-main';\nvar FIXED_CLASS = 'is-fixed';\n\nvar Header = function Header() {\n  var _this = this;\n\n  _classCallCheck(this, Header);\n\n  this.$header = $('.' + HEADER_CLASS);\n  this.headerHeight = this.$header.innerHeight();\n  this.breakpoint = $('.' + MAIN_CLASS).offset().top;\n\n  $(window).on('scroll', function () {\n    if ($(window).scrollTop() > _this.breakpoint) {\n      // todo アニメーション\n      _this.$header.addClass(FIXED_CLASS);\n    } else {\n      _this.$header.removeClass(FIXED_CLASS);\n    }\n  });\n};\n\n$(function () {\n  if (!$('.' + HEADER_CLASS)[0] || !$('.' + MAIN_CLASS)[0]) return;\n  new Header();\n});\n\n//# sourceURL=webpack:///./wataru/assets/js/header.js?");

/***/ }),

/***/ "./wataru/assets/js/script.js":
/*!************************************!*\
  !*** ./wataru/assets/js/script.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./header.js */ \"./wataru/assets/js/header.js\");\n__webpack_require__(/*! ./hamburger.js */ \"./wataru/assets/js/hamburger.js\");\n\n//# sourceURL=webpack:///./wataru/assets/js/script.js?");

/***/ }),

/***/ "./wataru/assets/sass/style.scss":
/*!***************************************!*\
  !*** ./wataru/assets/sass/style.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin\n\n//# sourceURL=webpack:///./wataru/assets/sass/style.scss?");

/***/ })

/******/ });