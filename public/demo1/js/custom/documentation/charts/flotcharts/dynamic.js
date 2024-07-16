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

/***/ "./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js":
/*!************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js ***!
  \************************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nfunction _typeof(o) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && \"function\" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? \"symbol\" : typeof o; }, _typeof(o); }\nfunction _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }\nfunction _toPropertyKey(t) { var i = _toPrimitive(t, \"string\"); return \"symbol\" == _typeof(i) ? i : i + \"\"; }\nfunction _toPrimitive(t, r) { if (\"object\" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || \"default\"); if (\"object\" != _typeof(i)) return i; throw new TypeError(\"@@toPrimitive must return a primitive value.\"); } return (\"string\" === r ? String : Number)(t); }\nvar KTFlotDemoDynamic = function () {\n  // Private functions\n  var exampleDynamic = function exampleDynamic() {\n    var data = [];\n    var totalPoints = 250;\n\n    // random data generator for plot charts\n\n    function getRandomData() {\n      if (data.length > 0) data = data.slice(1);\n      // do a random walk\n      while (data.length < totalPoints) {\n        var prev = data.length > 0 ? data[data.length - 1] : 50;\n        var y = prev + Math.random() * 10 - 5;\n        if (y < 0) y = 0;\n        if (y > 100) y = 100;\n        data.push(y);\n      }\n      // zip the generated y values with the x values\n      var res = [];\n      for (var i = 0; i < data.length; ++i) {\n        res.push([i, data[i]]);\n      }\n      return res;\n    }\n\n    //server load\n    var options = _defineProperty(_defineProperty({\n      colors: [KTUtil.getCssVariableValue('--kt-active-danger'), KTUtil.getCssVariableValue('--kt-active-primary')],\n      series: {\n        shadowSize: 1\n      },\n      lines: {\n        show: true,\n        lineWidth: 0.5,\n        fill: true,\n        fillColor: {\n          colors: [{\n            opacity: 0.1\n          }, {\n            opacity: 1\n          }]\n        }\n      },\n      yaxis: {\n        min: 0,\n        max: 100,\n        tickColor: KTUtil.getCssVariableValue('--kt-light-dark'),\n        tickFormatter: function tickFormatter(v) {\n          return v + \"%\";\n        }\n      },\n      xaxis: {\n        show: false\n      }\n    }, \"colors\", [KTUtil.getCssVariableValue('--kt-active-primary')]), \"grid\", {\n      tickColor: KTUtil.getCssVariableValue('--kt-light-dark'),\n      borderWidth: 0\n    });\n    var updateInterval = 30;\n    var plot = $.plot($(\"#kt_docs_flot_dynamic\"), [getRandomData()], options);\n    function update() {\n      plot.setData([getRandomData()]);\n      plot.draw();\n      setTimeout(update, updateInterval);\n    }\n    update();\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleDynamic();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoDynamic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvZHluYW1pYy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUFBLFNBQUFBLFFBQUFDLENBQUEsc0NBQUFELE9BQUEsd0JBQUFFLE1BQUEsdUJBQUFBLE1BQUEsQ0FBQUMsUUFBQSxhQUFBRixDQUFBLGtCQUFBQSxDQUFBLGdCQUFBQSxDQUFBLFdBQUFBLENBQUEseUJBQUFDLE1BQUEsSUFBQUQsQ0FBQSxDQUFBRyxXQUFBLEtBQUFGLE1BQUEsSUFBQUQsQ0FBQSxLQUFBQyxNQUFBLENBQUFHLFNBQUEscUJBQUFKLENBQUEsS0FBQUQsT0FBQSxDQUFBQyxDQUFBO0FBQUEsU0FBQUssZ0JBQUFDLENBQUEsRUFBQUMsQ0FBQSxFQUFBQyxDQUFBLFlBQUFELENBQUEsR0FBQUUsY0FBQSxDQUFBRixDQUFBLE1BQUFELENBQUEsR0FBQUksTUFBQSxDQUFBQyxjQUFBLENBQUFMLENBQUEsRUFBQUMsQ0FBQSxJQUFBSyxLQUFBLEVBQUFKLENBQUEsRUFBQUssVUFBQSxNQUFBQyxZQUFBLE1BQUFDLFFBQUEsVUFBQVQsQ0FBQSxDQUFBQyxDQUFBLElBQUFDLENBQUEsRUFBQUYsQ0FBQTtBQUFBLFNBQUFHLGVBQUFELENBQUEsUUFBQVEsQ0FBQSxHQUFBQyxZQUFBLENBQUFULENBQUEsZ0NBQUFULE9BQUEsQ0FBQWlCLENBQUEsSUFBQUEsQ0FBQSxHQUFBQSxDQUFBO0FBQUEsU0FBQUMsYUFBQVQsQ0FBQSxFQUFBRCxDQUFBLG9CQUFBUixPQUFBLENBQUFTLENBQUEsTUFBQUEsQ0FBQSxTQUFBQSxDQUFBLE1BQUFGLENBQUEsR0FBQUUsQ0FBQSxDQUFBUCxNQUFBLENBQUFpQixXQUFBLGtCQUFBWixDQUFBLFFBQUFVLENBQUEsR0FBQVYsQ0FBQSxDQUFBYSxJQUFBLENBQUFYLENBQUEsRUFBQUQsQ0FBQSxnQ0FBQVIsT0FBQSxDQUFBaUIsQ0FBQSxVQUFB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LE9BQU8sQ0FBQztJQUV6RSxTQUFTdUIsTUFBTUEsQ0FBQSxFQUFHO01BQ2pCRixJQUFJLENBQUNHLE9BQU8sQ0FBQyxDQUFDakMsYUFBYSxDQUFDLENBQUMsQ0FBQyxDQUFDO01BQy9COEIsSUFBSSxDQUFDSSxJQUFJLENBQUMsQ0FBQztNQUNYQyxVQUFVLENBQUNILE1BQU0sRUFBRUgsY0FBYyxDQUFDO0lBQ25DO0lBRUFHLE1BQU0sQ0FBQyxDQUFDO0VBQ04sQ0FBQztFQUVELE9BQU87SUFDSDtJQUNBSSxJQUFJLEVBQUUsU0FBQUEsS0FBQSxFQUFZO01BQ2R2QyxjQUFjLENBQUMsQ0FBQztJQUNwQjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBYyxNQUFNLENBQUMwQixrQkFBa0IsQ0FBQyxZQUFZO0VBQ2xDekMsaUJBQWlCLENBQUN3QyxJQUFJLENBQUMsQ0FBQztBQUM1QixDQUFDLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvZHluYW1pYy5qcz9lZmE3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4vLyBDbGFzcyBkZWZpbml0aW9uXG52YXIgS1RGbG90RGVtb0R5bmFtaWMgPSBmdW5jdGlvbiAoKSB7XG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcbiAgICB2YXIgZXhhbXBsZUR5bmFtaWMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBkYXRhID0gW107XG5cdFx0dmFyIHRvdGFsUG9pbnRzID0gMjUwO1xuXG5cdFx0Ly8gcmFuZG9tIGRhdGEgZ2VuZXJhdG9yIGZvciBwbG90IGNoYXJ0c1xuXG5cdFx0ZnVuY3Rpb24gZ2V0UmFuZG9tRGF0YSgpIHtcblx0XHRcdGlmIChkYXRhLmxlbmd0aCA+IDApIGRhdGEgPSBkYXRhLnNsaWNlKDEpO1xuXHRcdFx0Ly8gZG8gYSByYW5kb20gd2Fsa1xuXHRcdFx0d2hpbGUgKGRhdGEubGVuZ3RoIDwgdG90YWxQb2ludHMpIHtcblx0XHRcdFx0dmFyIHByZXYgPSBkYXRhLmxlbmd0aCA+IDAgPyBkYXRhW2RhdGEubGVuZ3RoIC0gMV0gOiA1MDtcblx0XHRcdFx0dmFyIHkgPSBwcmV2ICsgTWF0aC5yYW5kb20oKSAqIDEwIC0gNTtcblx0XHRcdFx0aWYgKHkgPCAwKSB5ID0gMDtcblx0XHRcdFx0aWYgKHkgPiAxMDApIHkgPSAxMDA7XG5cdFx0XHRcdGRhdGEucHVzaCh5KTtcblx0XHRcdH1cblx0XHRcdC8vIHppcCB0aGUgZ2VuZXJhdGVkIHkgdmFsdWVzIHdpdGggdGhlIHggdmFsdWVzXG5cdFx0XHR2YXIgcmVzID0gW107XG5cdFx0XHRmb3IgKHZhciBpID0gMDsgaSA8IGRhdGEubGVuZ3RoOyArK2kpIHtcblx0XHRcdFx0cmVzLnB1c2goW2ksIGRhdGFbaV1dKTtcblx0XHRcdH1cblxuXHRcdFx0cmV0dXJuIHJlcztcblx0XHR9XG5cblx0XHQvL3NlcnZlciBsb2FkXG5cdFx0dmFyIG9wdGlvbnMgPSB7XG5cdFx0XHRjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1hY3RpdmUtZGFuZ2VyJyksIEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWt0LWFjdGl2ZS1wcmltYXJ5JyldLFxuXHRcdFx0c2VyaWVzOiB7XG5cdFx0XHRcdHNoYWRvd1NpemU6IDFcblx0XHRcdH0sXG5cdFx0XHRsaW5lczoge1xuXHRcdFx0XHRzaG93OiB0cnVlLFxuXHRcdFx0XHRsaW5lV2lkdGg6IDAuNSxcblx0XHRcdFx0ZmlsbDogdHJ1ZSxcblx0XHRcdFx0ZmlsbENvbG9yOiB7XG5cdFx0XHRcdFx0Y29sb3JzOiBbe1xuXHRcdFx0XHRcdFx0b3BhY2l0eTogMC4xXG5cdFx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdFx0b3BhY2l0eTogMVxuXHRcdFx0XHRcdH1dXG5cdFx0XHRcdH1cblx0XHRcdH0sXG5cdFx0XHR5YXhpczoge1xuXHRcdFx0XHRtaW46IDAsXG5cdFx0XHRcdG1heDogMTAwLFxuXHRcdFx0XHR0aWNrQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWt0LWxpZ2h0LWRhcmsnKSxcblx0XHRcdFx0dGlja0Zvcm1hdHRlcjogZnVuY3Rpb24odikge1xuXHRcdFx0XHRcdHJldHVybiB2ICsgXCIlXCI7XG5cdFx0XHRcdH1cblx0XHRcdH0sXG5cdFx0XHR4YXhpczoge1xuXHRcdFx0XHRzaG93OiBmYWxzZSxcblx0XHRcdH0sXG5cdFx0XHRjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1hY3RpdmUtcHJpbWFyeScpXSxcblx0XHRcdGdyaWQ6IHtcblx0XHRcdFx0dGlja0NvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1saWdodC1kYXJrJyksXG5cdFx0XHRcdGJvcmRlcldpZHRoOiAwLFxuXHRcdFx0fVxuXHRcdH07XG5cblx0XHR2YXIgdXBkYXRlSW50ZXJ2YWwgPSAzMDtcblx0XHR2YXIgcGxvdCA9ICQucGxvdCgkKFwiI2t0X2RvY3NfZmxvdF9keW5hbWljXCIpLCBbZ2V0UmFuZG9tRGF0YSgpXSwgb3B0aW9ucyk7XG5cblx0XHRmdW5jdGlvbiB1cGRhdGUoKSB7XG5cdFx0XHRwbG90LnNldERhdGEoW2dldFJhbmRvbURhdGEoKV0pO1xuXHRcdFx0cGxvdC5kcmF3KCk7XG5cdFx0XHRzZXRUaW1lb3V0KHVwZGF0ZSwgdXBkYXRlSW50ZXJ2YWwpO1xuXHRcdH1cblxuXHRcdHVwZGF0ZSgpO1xuICAgIH1cblxuICAgIHJldHVybiB7XG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgZXhhbXBsZUR5bmFtaWMoKTtcbiAgICAgICAgfVxuICAgIH07XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcbiAgICBLVEZsb3REZW1vRHluYW1pYy5pbml0KCk7XG59KTtcbiJdLCJuYW1lcyI6WyJfdHlwZW9mIiwibyIsIlN5bWJvbCIsIml0ZXJhdG9yIiwiY29uc3RydWN0b3IiLCJwcm90b3R5cGUiLCJfZGVmaW5lUHJvcGVydHkiLCJlIiwiciIsInQiLCJfdG9Qcm9wZXJ0eUtleSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwidmFsdWUiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiVHlwZUVycm9yIiwiU3RyaW5nIiwiTnVtYmVyIiwiS1RGbG90RGVtb0R5bmFtaWMiLCJleGFtcGxlRHluYW1pYyIsImRhdGEiLCJ0b3RhbFBvaW50cyIsImdldFJhbmRvbURhdGEiLCJsZW5ndGgiLCJzbGljZSIsInByZXYiLCJ5IiwiTWF0aCIsInJhbmRvbSIsInB1c2giLCJyZXMiLCJvcHRpb25zIiwiY29sb3JzIiwiS1RVdGlsIiwiZ2V0Q3NzVmFyaWFibGVWYWx1ZSIsInNlcmllcyIsInNoYWRvd1NpemUiLCJsaW5lcyIsInNob3ciLCJsaW5lV2lkdGgiLCJmaWxsIiwiZmlsbENvbG9yIiwib3BhY2l0eSIsInlheGlzIiwibWluIiwibWF4IiwidGlja0NvbG9yIiwidGlja0Zvcm1hdHRlciIsInYiLCJ4YXhpcyIsImJvcmRlcldpZHRoIiwidXBkYXRlSW50ZXJ2YWwiLCJwbG90IiwiJCIsInVwZGF0ZSIsInNldERhdGEiLCJkcmF3Iiwic2V0VGltZW91dCIsImluaXQiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js"]();
/******/ 	
/******/ })()
;