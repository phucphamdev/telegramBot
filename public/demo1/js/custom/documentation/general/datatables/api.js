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

/***/ "./resources/assets/core/js/custom/documentation/general/datatables/api.js":
/*!*********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/datatables/api.js ***!
  \*********************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTDatatablesApi = function () {\n  // Private functions\n\n  var _initExample1 = function _initExample1() {\n    var t = $(\"#kt_datatable_example_1\").DataTable();\n    var counter = 1;\n    $(\"#kt_datatable_example_1_addrow\").on(\"click\", function () {\n      t.row.add([counter + \".1\", counter + \".2\", counter + \".3\", counter + \".4\", counter + \".5\"]).draw(false);\n      counter++;\n    });\n\n    // Automatically add a first row of data\n    $(\"#kt_datatable_example_1_addrow\").click();\n  };\n  var _initExample2 = function _initExample2() {\n    var table = $(\"#kt_datatable_example_2\").DataTable({\n      columnDefs: [{\n        orderable: false,\n        targets: [1, 2, 3]\n      }]\n    });\n    $(\"#kt_datatable_example_2_submit\").click(function () {\n      var data = table.$(\"input, select\").serialize();\n      alert(\"The following data would have been submitted to the server: \\n\\n\" + data.substr(0, 120) + \"...\");\n      return false;\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      _initExample1();\n      _initExample2();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTDatatablesApi.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9kYXRhdGFibGVzL2FwaS5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLGVBQWUsR0FBRyxZQUFZO0VBQzlCOztFQUVBLElBQUlDLGFBQWEsR0FBRyxTQUFoQkEsYUFBYUEsQ0FBQSxFQUFjO0lBQzNCLElBQUlDLENBQUMsR0FBR0MsQ0FBQyxDQUFDLHlCQUF5QixDQUFDLENBQUNDLFNBQVMsQ0FBQyxDQUFDO0lBQ2hELElBQUlDLE9BQU8sR0FBRyxDQUFDO0lBRWZGLENBQUMsQ0FBQyxnQ0FBZ0MsQ0FBQyxDQUFDRyxFQUFFLENBQUUsT0FBTyxFQUFFLFlBQVk7TUFDekRKLENBQUMsQ0FBQ0ssR0FBRyxDQUFDQyxHQUFHLENBQUUsQ0FDUEgsT0FBTyxHQUFFLElBQUksRUFDYkEsT0FBTyxHQUFFLElBQUksRUFDYkEsT0FBTyxHQUFFLElBQUksRUFDYkEsT0FBTyxHQUFFLElBQUksRUFDYkEsT0FBTyxHQUFFLElBQUksQ0FDZixDQUFDLENBQUNJLElBQUksQ0FBRSxLQUFNLENBQUM7TUFFakJKLE9BQU8sRUFBRTtJQUNiLENBQUUsQ0FBQzs7SUFFSDtJQUNBRixDQUFDLENBQUMsZ0NBQWdDLENBQUMsQ0FBQ08sS0FBSyxDQUFDLENBQUM7RUFDL0MsQ0FBQztFQUVELElBQUlDLGFBQWEsR0FBRyxTQUFoQkEsYUFBYUEsQ0FBQSxFQUFjO0lBQzNCLElBQUlDLEtBQUssR0FBR1QsQ0FBQyxDQUFDLHlCQUF5QixDQUFDLENBQUNDLFNBQVMsQ0FBQztNQUMvQ1MsVUFBVSxFQUFFLENBQUM7UUFDVEMsU0FBUyxFQUFFLEtBQUs7UUFDaEJDLE9BQU8sRUFBRSxDQUFDLENBQUMsRUFBQyxDQUFDLEVBQUMsQ0FBQztNQUNuQixDQUFDO0lBQ0wsQ0FBQyxDQUFDO0lBRUZaLENBQUMsQ0FBQyxnQ0FBZ0MsQ0FBQyxDQUFDTyxLQUFLLENBQUUsWUFBVztNQUNsRCxJQUFJTSxJQUFJLEdBQUdKLEtBQUssQ0FBQ1QsQ0FBQyxDQUFDLGVBQWUsQ0FBQyxDQUFDYyxTQUFTLENBQUMsQ0FBQztNQUMvQ0MsS0FBSyxDQUNELGtFQUFrRSxHQUNsRUYsSUFBSSxDQUFDRyxNQUFNLENBQUUsQ0FBQyxFQUFFLEdBQUksQ0FBQyxHQUFDLEtBQzFCLENBQUM7TUFDRCxPQUFPLEtBQUs7SUFDaEIsQ0FBQyxDQUFDO0VBQ04sQ0FBQzs7RUFFRDtFQUNBLE9BQU87SUFDSEMsSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBWTtNQUNkbkIsYUFBYSxDQUFDLENBQUM7TUFDZlUsYUFBYSxDQUFDLENBQUM7SUFDbkI7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQVUsTUFBTSxDQUFDQyxrQkFBa0IsQ0FBQyxZQUFXO0VBQ2pDdEIsZUFBZSxDQUFDb0IsSUFBSSxDQUFDLENBQUM7QUFDMUIsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvZGF0YXRhYmxlcy9hcGkuanM/MzlmMiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgZGVmaW5pdGlvblxudmFyIEtURGF0YXRhYmxlc0FwaSA9IGZ1bmN0aW9uICgpIHtcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xuXG4gICAgdmFyIF9pbml0RXhhbXBsZTEgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIHQgPSAkKFwiI2t0X2RhdGF0YWJsZV9leGFtcGxlXzFcIikuRGF0YVRhYmxlKCk7XG4gICAgICAgIHZhciBjb3VudGVyID0gMTtcbiAgICBcbiAgICAgICAgJChcIiNrdF9kYXRhdGFibGVfZXhhbXBsZV8xX2FkZHJvd1wiKS5vbiggXCJjbGlja1wiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB0LnJvdy5hZGQoIFtcbiAgICAgICAgICAgICAgICBjb3VudGVyICtcIi4xXCIsXG4gICAgICAgICAgICAgICAgY291bnRlciArXCIuMlwiLFxuICAgICAgICAgICAgICAgIGNvdW50ZXIgK1wiLjNcIixcbiAgICAgICAgICAgICAgICBjb3VudGVyICtcIi40XCIsXG4gICAgICAgICAgICAgICAgY291bnRlciArXCIuNVwiLFxuICAgICAgICAgICAgXSApLmRyYXcoIGZhbHNlICk7XG4gICAgXG4gICAgICAgICAgICBjb3VudGVyKys7XG4gICAgICAgIH0gKTtcbiAgICBcbiAgICAgICAgLy8gQXV0b21hdGljYWxseSBhZGQgYSBmaXJzdCByb3cgb2YgZGF0YVxuICAgICAgICAkKFwiI2t0X2RhdGF0YWJsZV9leGFtcGxlXzFfYWRkcm93XCIpLmNsaWNrKCk7XG4gICAgfVxuXG4gICAgdmFyIF9pbml0RXhhbXBsZTIgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIHRhYmxlID0gJChcIiNrdF9kYXRhdGFibGVfZXhhbXBsZV8yXCIpLkRhdGFUYWJsZSh7XG4gICAgICAgICAgICBjb2x1bW5EZWZzOiBbe1xuICAgICAgICAgICAgICAgIG9yZGVyYWJsZTogZmFsc2UsXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogWzEsMiwzXVxuICAgICAgICAgICAgfV1cbiAgICAgICAgfSk7XG4gICAgIFxuICAgICAgICAkKFwiI2t0X2RhdGF0YWJsZV9leGFtcGxlXzJfc3VibWl0XCIpLmNsaWNrKCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIHZhciBkYXRhID0gdGFibGUuJChcImlucHV0LCBzZWxlY3RcIikuc2VyaWFsaXplKCk7XG4gICAgICAgICAgICBhbGVydChcbiAgICAgICAgICAgICAgICBcIlRoZSBmb2xsb3dpbmcgZGF0YSB3b3VsZCBoYXZlIGJlZW4gc3VibWl0dGVkIHRvIHRoZSBzZXJ2ZXI6IFxcblxcblwiK1xuICAgICAgICAgICAgICAgIGRhdGEuc3Vic3RyKCAwLCAxMjAgKStcIi4uLlwiXG4gICAgICAgICAgICApO1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvLyBQdWJsaWMgbWV0aG9kc1xuICAgIHJldHVybiB7XG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF9pbml0RXhhbXBsZTEoKTtcbiAgICAgICAgICAgIF9pbml0RXhhbXBsZTIoKTtcbiAgICAgICAgfVxuICAgIH1cbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XG4gICAgS1REYXRhdGFibGVzQXBpLmluaXQoKTtcbn0pO1xuIl0sIm5hbWVzIjpbIktURGF0YXRhYmxlc0FwaSIsIl9pbml0RXhhbXBsZTEiLCJ0IiwiJCIsIkRhdGFUYWJsZSIsImNvdW50ZXIiLCJvbiIsInJvdyIsImFkZCIsImRyYXciLCJjbGljayIsIl9pbml0RXhhbXBsZTIiLCJ0YWJsZSIsImNvbHVtbkRlZnMiLCJvcmRlcmFibGUiLCJ0YXJnZXRzIiwiZGF0YSIsInNlcmlhbGl6ZSIsImFsZXJ0Iiwic3Vic3RyIiwiaW5pdCIsIktUVXRpbCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/datatables/api.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/datatables/api.js"]();
/******/ 	
/******/ })()
;