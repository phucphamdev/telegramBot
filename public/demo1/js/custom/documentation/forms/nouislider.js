/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/forms/nouislider.js":
/*!***************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/forms/nouislider.js ***!
  \***************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTFormsNouisliderDemos = function () {\n  // Private functions\n  var _exampleBasic = function _exampleBasic() {\n    var slider = document.querySelector(\"#kt_slider_basic\");\n    var valueMin = document.querySelector(\"#kt_slider_basic_min\");\n    var valueMax = document.querySelector(\"#kt_slider_basic_max\");\n    noUiSlider.create(slider, {\n      start: [20, 80],\n      connect: true,\n      range: {\n        \"min\": 0,\n        \"max\": 100\n      }\n    });\n    slider.noUiSlider.on(\"update\", function (values, handle) {\n      if (handle) {\n        valueMax.innerHTML = values[handle];\n      } else {\n        valueMin.innerHTML = values[handle];\n      }\n    });\n  };\n  var _exampleSizes = function _exampleSizes() {\n    var slider1 = document.querySelector(\"#kt_slider_sizes_sm\");\n    var slider2 = document.querySelector(\"#kt_slider_sizes_default\");\n    var slider3 = document.querySelector(\"#kt_slider_sizes_lg\");\n    noUiSlider.create(slider1, {\n      start: [20, 80],\n      connect: true,\n      range: {\n        \"min\": 0,\n        \"max\": 100\n      }\n    });\n    noUiSlider.create(slider2, {\n      start: [20, 80],\n      connect: true,\n      range: {\n        \"min\": 0,\n        \"max\": 100\n      }\n    });\n    noUiSlider.create(slider3, {\n      start: [20, 80],\n      connect: true,\n      range: {\n        \"min\": 0,\n        \"max\": 100\n      }\n    });\n  };\n  var _exampleVertical = function _exampleVertical() {\n    var slider = document.querySelector(\"#kt_slider_vertical\");\n    noUiSlider.create(slider, {\n      start: [60, 160],\n      connect: true,\n      orientation: \"vertical\",\n      range: {\n        \"min\": 0,\n        \"max\": 200\n      }\n    });\n  };\n  var _exampleTooltip = function _exampleTooltip() {\n    var slider = document.querySelector(\"#kt_slider_tooltip\");\n    noUiSlider.create(slider, {\n      start: [20, 80, 120],\n      tooltips: [false, wNumb({\n        decimals: 1\n      }), true],\n      range: {\n        \"min\": 0,\n        \"max\": 200\n      }\n    });\n  };\n  var _exampleSoftLimits = function _exampleSoftLimits() {\n    var slider = document.querySelector(\"#kt_slider_soft_limits\");\n    noUiSlider.create(slider, {\n      start: 50,\n      range: {\n        min: 0,\n        max: 100\n      },\n      pips: {\n        mode: \"values\",\n        values: [20, 80],\n        density: 4\n      }\n    });\n  };\n  return {\n    // Public Functions\n    init: function init(element) {\n      _exampleBasic();\n      _exampleSizes();\n      _exampleVertical();\n      _exampleTooltip();\n      _exampleSoftLimits();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsNouisliderDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvbm91aXNsaWRlci5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLHNCQUFzQixHQUFHLFlBQVc7RUFDcEM7RUFDQSxJQUFJQyxhQUFhLEdBQUcsU0FBaEJBLGFBQWFBLENBQUEsRUFBYztJQUMzQixJQUFJQyxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLGtCQUFrQixDQUFDO0lBQ3ZELElBQUlDLFFBQVEsR0FBR0YsUUFBUSxDQUFDQyxhQUFhLENBQUMsc0JBQXNCLENBQUM7SUFDN0QsSUFBSUUsUUFBUSxHQUFHSCxRQUFRLENBQUNDLGFBQWEsQ0FBQyxzQkFBc0IsQ0FBQztJQUU3REcsVUFBVSxDQUFDQyxNQUFNLENBQUNOLE1BQU0sRUFBRTtNQUN0Qk8sS0FBSyxFQUFFLENBQUMsRUFBRSxFQUFFLEVBQUUsQ0FBQztNQUNmQyxPQUFPLEVBQUUsSUFBSTtNQUNiQyxLQUFLLEVBQUU7UUFDSCxLQUFLLEVBQUUsQ0FBQztRQUNSLEtBQUssRUFBRTtNQUNYO0lBQ0osQ0FBQyxDQUFDO0lBRUZULE1BQU0sQ0FBQ0ssVUFBVSxDQUFDSyxFQUFFLENBQUMsUUFBUSxFQUFFLFVBQVVDLE1BQU0sRUFBRUMsTUFBTSxFQUFFO01BQ3JELElBQUlBLE1BQU0sRUFBRTtRQUNSUixRQUFRLENBQUNTLFNBQVMsR0FBR0YsTUFBTSxDQUFDQyxNQUFNLENBQUM7TUFDdkMsQ0FBQyxNQUFNO1FBQ0hULFFBQVEsQ0FBQ1UsU0FBUyxHQUFHRixNQUFNLENBQUNDLE1BQU0sQ0FBQztNQUN2QztJQUNKLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRCxJQUFJRSxhQUFhLEdBQUcsU0FBaEJBLGFBQWFBLENBQUEsRUFBYztJQUMzQixJQUFJQyxPQUFPLEdBQUdkLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLHFCQUFxQixDQUFDO0lBQzNELElBQUljLE9BQU8sR0FBR2YsUUFB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LENBQUMsQ0FBQztJQUN4QjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBUSxNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVc7RUFDakNuQyxzQkFBc0IsQ0FBQ2dDLElBQUksQ0FBQyxDQUFDO0FBQ2pDLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9mb3Jtcy9ub3Vpc2xpZGVyLmpzPzU5NDQiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbi8vIENsYXNzIGRlZmluaXRpb25cbnZhciBLVEZvcm1zTm91aXNsaWRlckRlbW9zID0gZnVuY3Rpb24oKSB7XG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcbiAgICB2YXIgX2V4YW1wbGVCYXNpYyA9IGZ1bmN0aW9uKCkge1xuICAgICAgICB2YXIgc2xpZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zbGlkZXJfYmFzaWNcIik7XG4gICAgICAgIHZhciB2YWx1ZU1pbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3Rfc2xpZGVyX2Jhc2ljX21pblwiKTtcbiAgICAgICAgdmFyIHZhbHVlTWF4ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zbGlkZXJfYmFzaWNfbWF4XCIpO1xuXG4gICAgICAgIG5vVWlTbGlkZXIuY3JlYXRlKHNsaWRlciwge1xuICAgICAgICAgICAgc3RhcnQ6IFsyMCwgODBdLFxuICAgICAgICAgICAgY29ubmVjdDogdHJ1ZSxcbiAgICAgICAgICAgIHJhbmdlOiB7XG4gICAgICAgICAgICAgICAgXCJtaW5cIjogMCxcbiAgICAgICAgICAgICAgICBcIm1heFwiOiAxMDBcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgc2xpZGVyLm5vVWlTbGlkZXIub24oXCJ1cGRhdGVcIiwgZnVuY3Rpb24gKHZhbHVlcywgaGFuZGxlKSB7XG4gICAgICAgICAgICBpZiAoaGFuZGxlKSB7XG4gICAgICAgICAgICAgICAgdmFsdWVNYXguaW5uZXJIVE1MID0gdmFsdWVzW2hhbmRsZV07XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHZhbHVlTWluLmlubmVySFRNTCA9IHZhbHVlc1toYW5kbGVdO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICB2YXIgX2V4YW1wbGVTaXplcyA9IGZ1bmN0aW9uKCkge1xuICAgICAgICB2YXIgc2xpZGVyMSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3Rfc2xpZGVyX3NpemVzX3NtXCIpO1xuICAgICAgICB2YXIgc2xpZGVyMiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3Rfc2xpZGVyX3NpemVzX2RlZmF1bHRcIik7XG4gICAgICAgIHZhciBzbGlkZXIzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zbGlkZXJfc2l6ZXNfbGdcIik7XG5cbiAgICAgICAgbm9VaVNsaWRlci5jcmVhdGUoc2xpZGVyMSwge1xuICAgICAgICAgICAgc3RhcnQ6IFsyMCwgODBdLFxuICAgICAgICAgICAgY29ubmVjdDogdHJ1ZSxcbiAgICAgICAgICAgIHJhbmdlOiB7XG4gICAgICAgICAgICAgICAgXCJtaW5cIjogMCxcbiAgICAgICAgICAgICAgICBcIm1heFwiOiAxMDBcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgbm9VaVNsaWRlci5jcmVhdGUoc2xpZGVyMiwge1xuICAgICAgICAgICAgc3RhcnQ6IFsyMCwgODBdLFxuICAgICAgICAgICAgY29ubmVjdDogdHJ1ZSxcbiAgICAgICAgICAgIHJhbmdlOiB7XG4gICAgICAgICAgICAgICAgXCJtaW5cIjogMCxcbiAgICAgICAgICAgICAgICBcIm1heFwiOiAxMDBcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgbm9VaVNsaWRlci5jcmVhdGUoc2xpZGVyMywge1xuICAgICAgICAgICAgc3RhcnQ6IFsyMCwgODBdLFxuICAgICAgICAgICAgY29ubmVjdDogdHJ1ZSxcbiAgICAgICAgICAgIHJhbmdlOiB7XG4gICAgICAgICAgICAgICAgXCJtaW5cIjogMCxcbiAgICAgICAgICAgICAgICBcIm1heFwiOiAxMDBcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfSAgIFxuXG4gICAgdmFyIF9leGFtcGxlVmVydGljYWwgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIHNsaWRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3Rfc2xpZGVyX3ZlcnRpY2FsXCIpO1xuXG4gICAgICAgIG5vVWlTbGlkZXIuY3JlYXRlKHNsaWRlciwge1xuICAgICAgICAgICAgc3RhcnQ6IFs2MCwgMTYwXSxcbiAgICAgICAgICAgIGNvbm5lY3Q6IHRydWUsXG4gICAgICAgICAgICBvcmllbnRhdGlvbjogXCJ2ZXJ0aWNhbFwiLFxuICAgICAgICAgICAgcmFuZ2U6IHtcbiAgICAgICAgICAgICAgICBcIm1pblwiOiAwLFxuICAgICAgICAgICAgICAgIFwibWF4XCI6IDIwMFxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICB2YXIgX2V4YW1wbGVUb29sdGlwID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBzbGlkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI2t0X3NsaWRlcl90b29sdGlwXCIpO1xuXG4gICAgICAgIG5vVWlTbGlkZXIuY3JlYXRlKHNsaWRlciwge1xuICAgICAgICAgICAgc3RhcnQ6IFsyMCwgODAsIDEyMF0sXG4gICAgICAgICAgICB0b29sdGlwczogW2ZhbHNlLCB3TnVtYih7ZGVjaW1hbHM6IDF9KSwgdHJ1ZV0sXG4gICAgICAgICAgICByYW5nZToge1xuICAgICAgICAgICAgICAgIFwibWluXCI6IDAsXG4gICAgICAgICAgICAgICAgXCJtYXhcIjogMjAwXG4gICAgICAgICAgICB9XG4gICAgICAgIH0pOyAgICAgICAgXG4gICAgfVxuXG4gICAgdmFyIF9leGFtcGxlU29mdExpbWl0cyA9IGZ1bmN0aW9uKCkge1xuICAgICAgICB2YXIgc2xpZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zbGlkZXJfc29mdF9saW1pdHNcIik7XG5cbiAgICAgICAgbm9VaVNsaWRlci5jcmVhdGUoc2xpZGVyLCB7XG4gICAgICAgICAgICBzdGFydDogNTAsXG4gICAgICAgICAgICByYW5nZToge1xuICAgICAgICAgICAgICAgIG1pbjogMCxcbiAgICAgICAgICAgICAgICBtYXg6IDEwMFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHBpcHM6IHtcbiAgICAgICAgICAgICAgICBtb2RlOiBcInZhbHVlc1wiLFxuICAgICAgICAgICAgICAgIHZhbHVlczogWzIwLCA4MF0sXG4gICAgICAgICAgICAgICAgZGVuc2l0eTogNFxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9IFxuXG4gICAgcmV0dXJuIHtcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xuICAgICAgICBpbml0OiBmdW5jdGlvbihlbGVtZW50KSB7XG4gICAgICAgICAgICBfZXhhbXBsZUJhc2ljKCk7XG4gICAgICAgICAgICBfZXhhbXBsZVNpemVzKCk7XG4gICAgICAgICAgICBfZXhhbXBsZVZlcnRpY2FsKCk7XG4gICAgICAgICAgICBfZXhhbXBsZVRvb2x0aXAoKTtcbiAgICAgICAgICAgIF9leGFtcGxlU29mdExpbWl0cygpO1xuICAgICAgICB9XG4gICAgfTtcbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XG4gICAgS1RGb3Jtc05vdWlzbGlkZXJEZW1vcy5pbml0KCk7XG59KTsiXSwibmFtZXMiOlsiS1RGb3Jtc05vdWlzbGlkZXJEZW1vcyIsIl9leGFtcGxlQmFzaWMiLCJzbGlkZXIiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJ2YWx1ZU1pbiIsInZhbHVlTWF4Iiwibm9VaVNsaWRlciIsImNyZWF0ZSIsInN0YXJ0IiwiY29ubmVjdCIsInJhbmdlIiwib24iLCJ2YWx1ZXMiLCJoYW5kbGUiLCJpbm5lckhUTUwiLCJfZXhhbXBsZVNpemVzIiwic2xpZGVyMSIsInNsaWRlcjIiLCJzbGlkZXIzIiwiX2V4YW1wbGVWZXJ0aWNhbCIsIm9yaWVudGF0aW9uIiwiX2V4YW1wbGVUb29sdGlwIiwidG9vbHRpcHMiLCJ3TnVtYiIsImRlY2ltYWxzIiwiX2V4YW1wbGVTb2Z0TGltaXRzIiwibWluIiwibWF4IiwicGlwcyIsIm1vZGUiLCJkZW5zaXR5IiwiaW5pdCIsImVsZW1lbnQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/forms/nouislider.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/forms/nouislider.js"]();
/******/ 	
/******/ })()
;