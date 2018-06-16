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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 169);
/******/ })
/************************************************************************/
/******/ ({

/***/ 169:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(170);


/***/ }),

/***/ 170:
/***/ (function(module, __webpack_exports__) {

"use strict";
throw new Error("Module build failed: SyntaxError: C:/laragon/www/SmartStay/resources/assets/js/app.js: Unexpected token, expected , (424:31)\n\n\u001b[0m \u001b[90m 422 | \u001b[39m                    food\u001b[33m:\u001b[39m\u001b[36mthis\u001b[39m\u001b[33m.\u001b[39mpetFood\u001b[33m,\u001b[39m\n \u001b[90m 423 | \u001b[39m                    water\u001b[33m:\u001b[39m\u001b[36mthis\u001b[39m\u001b[33m.\u001b[39mpetWater\u001b[33m,\u001b[39m\n\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 424 | \u001b[39m                    snacks\u001b[33m:\u001b[39m\u001b[36mthis\u001b[39m\u001b[33m:\u001b[39mpetSnacks\n \u001b[90m     | \u001b[39m                               \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\n \u001b[90m 425 | \u001b[39m                })\u001b[33m.\u001b[39mthen(response\u001b[33m=>\u001b[39m{\n \u001b[90m 426 | \u001b[39m                    \u001b[36mthis\u001b[39m\u001b[33m.\u001b[39mshowResult \u001b[33m=\u001b[39m \u001b[36mtrue\u001b[39m\u001b[33m;\u001b[39m\n \u001b[90m 427 | \u001b[39m                toastr\u001b[33m.\u001b[39msuccess(\u001b[32m\"adios\"\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n");

/***/ })

/******/ });