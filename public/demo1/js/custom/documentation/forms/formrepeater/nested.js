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

/***/ "./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js":
/*!************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js ***!
  \************************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTFormRepeaterNested = function () {\n  // Private functions\n  var example1 = function example1() {\n    $('#kt_docs_repeater_nested').repeater({\n      // (Required if there is a nested repeater)\n      // Specify the configuration of the nested repeaters.\n      // Nested configuration follows the same format as the base configuration,\n      // supporting options \"defaultValues\", \"show\", \"hide\", etc.\n      // Nested repeaters additionally require a \"selector\" field.\n      repeaters: [{\n        // (Required)\n        // Specify the jQuery selector for this nested repeater\n        selector: '.inner-repeater',\n        show: function show() {\n          $(this).slideDown();\n        },\n        hide: function hide(deleteElement) {\n          $(this).slideUp(deleteElement);\n        }\n      }],\n      show: function show() {\n        $(this).slideDown();\n      },\n      hide: function hide(deleteElement) {\n        $(this).slideUp(deleteElement);\n      }\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      example1();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTFormRepeaterNested.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvZm9ybXJlcGVhdGVyL25lc3RlZC5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLG9CQUFvQixHQUFHLFlBQVc7RUFDbEM7RUFDQSxJQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBUUEsQ0FBQSxFQUFjO0lBQ3RCQyxDQUFDLENBQUMsMEJBQTBCLENBQUMsQ0FBQ0MsUUFBUSxDQUFDO01BQ25DO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQUMsU0FBUyxFQUFFLENBQUM7UUFDUjtRQUNBO1FBQ0FDLFFBQVEsRUFBRSxpQkFBaUI7UUFDM0JDLElBQUksRUFBRSxTQUFBQSxLQUFBLEVBQVk7VUFDZEosQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDSyxTQUFTLENBQUMsQ0FBQztRQUN2QixDQUFDO1FBRURDLElBQUksRUFBRSxTQUFBQSxLQUFVQyxhQUFhLEVBQUU7VUFDM0JQLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQ1EsT0FBTyxDQUFDRCxhQUFhLENBQUM7UUFDbEM7TUFDSixDQUFDLENBQUM7TUFFRkgsSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBWTtRQUNkSixDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNLLFNBQVMsQ0FBQyxDQUFDO01BQ3ZCLENBQUM7TUFFREMsSUFBSSxFQUFFLFNBQUFBLEtBQVVDLGFBQWEsRUFBRTtRQUMzQlAsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDUSxPQUFPLENBQUNELGFBQWEsQ0FBQztNQUNsQztJQUNKLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRCxPQUFPO0lBQ0g7SUFDQUUsSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBVztNQUNiVixRQUFRLENBQUMsQ0FBQztJQUNkO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0FXLE1BQU0sQ0FBQ0Msa0JBQWtCLENBQUMsWUFBVztFQUNqQ2Isb0JBQW9CLENBQUNXLElBQUksQ0FBQyxDQUFDO0FBQy9CLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9mb3Jtcy9mb3JtcmVwZWF0ZXIvbmVzdGVkLmpzPzY5OWYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbi8vIENsYXNzIGRlZmluaXRpb25cbnZhciBLVEZvcm1SZXBlYXRlck5lc3RlZCA9IGZ1bmN0aW9uKCkge1xuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXG4gICAgdmFyIGV4YW1wbGUxID0gZnVuY3Rpb24oKSB7XG4gICAgICAgICQoJyNrdF9kb2NzX3JlcGVhdGVyX25lc3RlZCcpLnJlcGVhdGVyKHtcbiAgICAgICAgICAgIC8vIChSZXF1aXJlZCBpZiB0aGVyZSBpcyBhIG5lc3RlZCByZXBlYXRlcilcbiAgICAgICAgICAgIC8vIFNwZWNpZnkgdGhlIGNvbmZpZ3VyYXRpb24gb2YgdGhlIG5lc3RlZCByZXBlYXRlcnMuXG4gICAgICAgICAgICAvLyBOZXN0ZWQgY29uZmlndXJhdGlvbiBmb2xsb3dzIHRoZSBzYW1lIGZvcm1hdCBhcyB0aGUgYmFzZSBjb25maWd1cmF0aW9uLFxuICAgICAgICAgICAgLy8gc3VwcG9ydGluZyBvcHRpb25zIFwiZGVmYXVsdFZhbHVlc1wiLCBcInNob3dcIiwgXCJoaWRlXCIsIGV0Yy5cbiAgICAgICAgICAgIC8vIE5lc3RlZCByZXBlYXRlcnMgYWRkaXRpb25hbGx5IHJlcXVpcmUgYSBcInNlbGVjdG9yXCIgZmllbGQuXG4gICAgICAgICAgICByZXBlYXRlcnM6IFt7XG4gICAgICAgICAgICAgICAgLy8gKFJlcXVpcmVkKVxuICAgICAgICAgICAgICAgIC8vIFNwZWNpZnkgdGhlIGpRdWVyeSBzZWxlY3RvciBmb3IgdGhpcyBuZXN0ZWQgcmVwZWF0ZXJcbiAgICAgICAgICAgICAgICBzZWxlY3RvcjogJy5pbm5lci1yZXBlYXRlcicsXG4gICAgICAgICAgICAgICAgc2hvdzogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnNsaWRlRG93bigpO1xuICAgICAgICAgICAgICAgIH0sXG4gICAgXG4gICAgICAgICAgICAgICAgaGlkZTogZnVuY3Rpb24gKGRlbGV0ZUVsZW1lbnQpIHtcbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5zbGlkZVVwKGRlbGV0ZUVsZW1lbnQpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1dLFxuXG4gICAgICAgICAgICBzaG93OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgJCh0aGlzKS5zbGlkZURvd24oKTtcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIGhpZGU6IGZ1bmN0aW9uIChkZWxldGVFbGVtZW50KSB7XG4gICAgICAgICAgICAgICAgJCh0aGlzKS5zbGlkZVVwKGRlbGV0ZUVsZW1lbnQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICByZXR1cm4ge1xuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgZXhhbXBsZTEoKTtcbiAgICAgICAgfVxuICAgIH07XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xuICAgIEtURm9ybVJlcGVhdGVyTmVzdGVkLmluaXQoKTtcbn0pO1xuIl0sIm5hbWVzIjpbIktURm9ybVJlcGVhdGVyTmVzdGVkIiwiZXhhbXBsZTEiLCIkIiwicmVwZWF0ZXIiLCJyZXBlYXRlcnMiLCJzZWxlY3RvciIsInNob3ciLCJzbGlkZURvd24iLCJoaWRlIiwiZGVsZXRlRWxlbWVudCIsInNsaWRlVXAiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js"]();
/******/ 	
/******/ })()
;