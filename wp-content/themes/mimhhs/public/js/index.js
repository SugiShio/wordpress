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
/******/ 	return __webpack_require__(__webpack_require__.s = "./mimhhs/assets/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./mimhhs/assets/app.js":
/*!******************************!*\
  !*** ./mimhhs/assets/app.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./sass/style.scss */ \"./mimhhs/assets/sass/style.scss\");\n__webpack_require__(/*! ./js/script.js */ \"./mimhhs/assets/js/script.js\");\n\n//# sourceURL=webpack:///./mimhhs/assets/app.js?");

/***/ }),

/***/ "./mimhhs/assets/js/script.js":
/*!************************************!*\
  !*** ./mimhhs/assets/js/script.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("!function () {\n    'use strict';\n\n    function Nav(el) {\n        this.$el = $(el);\n        this.$btn = this.$el.find('#nav_btn');\n        this.isOpen = false;\n        this.init();\n    }\n\n    Nav.prototype = {\n        init: function init() {\n            var self = this;\n\n            self.$el.removeClass('is-open');\n            self.$btn.removeClass('is-open');\n\n            self.$btn.on('click', function (e) {\n                e.stopPropagation();\n                if (self.isOpen) {\n                    $(this).removeClass('is-open');\n                    self.$el.removeClass('is-open');\n                    self.isOpen = false;\n                } else {\n                    $(this).addClass('is-open');\n                    self.$el.addClass('is-open');\n                    self.isOpen = true;\n                }\n            });\n\n            self.$el.on('click', function (e) {\n                e.stopPropagation();\n            });\n\n            $('body').on('click', function () {\n                if (self.isOpen) {\n                    self.$btn.removeClass('is-open');\n                    self.$el.removeClass('is-open');\n                    self.isOpen = false;\n                }\n            });\n        }\n    };\n\n    $(function () {\n        var nav = new Nav('#nav');\n    });\n}();\n\n//# sourceURL=webpack:///./mimhhs/assets/js/script.js?");

/***/ }),

/***/ "./mimhhs/assets/sass/style.scss":
/*!***************************************!*\
  !*** ./mimhhs/assets/sass/style.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin\n\n//# sourceURL=webpack:///./mimhhs/assets/sass/style.scss?");

/***/ })

/******/ });