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

/***/ "./resources/assets/core/js/custom/apps/file-manager/settings.js":
/*!***********************************************************************!*\
  !*** ./resources/assets/core/js/custom/apps/file-manager/settings.js ***!
  \***********************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTAppFileManagerSettings = function () {\n  var form;\n\n  // Private functions\n  var handleForm = function handleForm() {\n    var saveButton = form.querySelector('#kt_file_manager_settings_submit');\n    saveButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      saveButton.setAttribute(\"data-kt-indicator\", \"on\");\n\n      // Simulate process for demo only\n      setTimeout(function () {\n        toastr.options = {\n          \"closeButton\": true,\n          \"debug\": false,\n          \"newestOnTop\": false,\n          \"progressBar\": false,\n          \"positionClass\": \"toast-top-right\",\n          \"preventDuplicates\": false,\n          \"showDuration\": \"300\",\n          \"hideDuration\": \"1000\",\n          \"timeOut\": \"5000\",\n          \"extendedTimeOut\": \"1000\",\n          \"showEasing\": \"swing\",\n          \"hideEasing\": \"linear\",\n          \"showMethod\": \"fadeIn\",\n          \"hideMethod\": \"fadeOut\"\n        };\n        toastr.success('File manager settings have been saved');\n        saveButton.removeAttribute(\"data-kt-indicator\");\n      }, 1000);\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init(element) {\n      form = document.querySelector('#kt_file_manager_settings');\n      handleForm();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTAppFileManagerSettings.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvZmlsZS1tYW5hZ2VyL3NldHRpbmdzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsd0JBQXdCLEdBQUcsWUFBWTtFQUN2QyxJQUFJQyxJQUFJOztFQUVYO0VBQ0EsSUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQVVBLENBQUEsRUFBYztJQUMzQixJQUFNQyxVQUFVLEdBQUdGLElBQUksQ0FBQ0csYUFBYSxDQUFDLGtDQUFrQyxDQUFDO0lBRW5FRCxVQUFVLENBQUNFLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFBQyxDQUFDLEVBQUk7TUFDdENBLENBQUMsQ0FBQ0MsY0FBYyxDQUFDLENBQUM7TUFFbEJKLFVBQVUsQ0FBQ0ssWUFBWSxDQUFDLG1CQUFtQixFQUFFLElBQUksQ0FBQzs7TUFFbEQ7TUFDQUMsVUFBVSxDQUFDLFlBQVU7UUFDakJDLE1BQU0sQ0FBQ0MsT0FBTyxHQUFHO1VBQ2IsYUFBYSxFQUFFLElBQUk7VUFDbkIsT0FBTyxFQUFFLEtBQUs7VUFDZCxhQUFhLEVBQUUsS0FBSztVQUNwQixhQUFhLEVBQUUsS0FBSztVQUNwQixlQUFlLEVBQUUsaUJBQWlCO1VBQ2xDLG1CQUFtQixFQUFFLEtBQUs7VUFDMUIsY0FBYyxFQUFFLEtBQUs7VUFDckIsY0FBYyxFQUFFLE1BQU07VUFDdEIsU0FBUyxFQUFFLE1BQU07VUFDakIsaUJBQWlCLEVBQUUsTUFBTTtVQUN6QixZQUFZLEVBQUUsT0FBTztVQUNyQixZQUFZLEVBQUUsUUFBUTtVQUN0QixZQUFZLEVBQUUsUUFBUTtVQUN0QixZQUFZLEVBQUU7UUFDbEIsQ0FBQztRQUVERCxNQUFNLENBQUNFLE9BQU8sQ0FBQyx1Q0FBdUMsQ0FBQztRQUV2RFQsVUFBVSxDQUFDVSxlQUFlLENBQUMsbUJBQW1CLENBQUM7TUFDbkQsQ0FBQyxFQUFFLElBQUksQ0FBQztJQUNaLENBQUMsQ0FBQztFQUNULENBQUM7O0VBRUQ7RUFDQSxPQUFPO0lBQ05DLElBQUksRUFBRSxTQUFBQSxLQUFTQyxPQUFPLEVBQUU7TUFDZGQsSUFBSSxHQUFHZSxRQUFRLENBQUNaLGFBQWEsQ0FBQywyQkFBMkIsQ0FBQztNQUVuRUYsVUFBVSxDQUFDLENBQUM7SUFDUDtFQUNQLENBQUM7QUFDRixDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBZSxNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVk7RUFDbENsQix3QkFBd0IsQ0FBQ2MsSUFBSSxDQUFDLENBQUM7QUFDbkMsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9hcHBzL2ZpbGUtbWFuYWdlci9zZXR0aW5ncy5qcz9hOWY0Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4vLyBDbGFzcyBkZWZpbml0aW9uXG52YXIgS1RBcHBGaWxlTWFuYWdlclNldHRpbmdzID0gZnVuY3Rpb24gKCkge1xuICAgIHZhciBmb3JtO1xuXG5cdC8vIFByaXZhdGUgZnVuY3Rpb25zXG5cdHZhciBoYW5kbGVGb3JtID0gZnVuY3Rpb24oKSB7XG5cdFx0Y29uc3Qgc2F2ZUJ1dHRvbiA9IGZvcm0ucXVlcnlTZWxlY3RvcignI2t0X2ZpbGVfbWFuYWdlcl9zZXR0aW5nc19zdWJtaXQnKTtcblxuICAgICAgICBzYXZlQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZSA9PiB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIHNhdmVCdXR0b24uc2V0QXR0cmlidXRlKFwiZGF0YS1rdC1pbmRpY2F0b3JcIiwgXCJvblwiKTtcblxuICAgICAgICAgICAgLy8gU2ltdWxhdGUgcHJvY2VzcyBmb3IgZGVtbyBvbmx5XG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMgPSB7XG4gICAgICAgICAgICAgICAgICAgIFwiY2xvc2VCdXR0b25cIjogdHJ1ZSxcbiAgICAgICAgICAgICAgICAgICAgXCJkZWJ1Z1wiOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgXCJuZXdlc3RPblRvcFwiOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgXCJwcm9ncmVzc0JhclwiOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgXCJwb3NpdGlvbkNsYXNzXCI6IFwidG9hc3QtdG9wLXJpZ2h0XCIsXG4gICAgICAgICAgICAgICAgICAgIFwicHJldmVudER1cGxpY2F0ZXNcIjogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgIFwic2hvd0R1cmF0aW9uXCI6IFwiMzAwXCIsXG4gICAgICAgICAgICAgICAgICAgIFwiaGlkZUR1cmF0aW9uXCI6IFwiMTAwMFwiLFxuICAgICAgICAgICAgICAgICAgICBcInRpbWVPdXRcIjogXCI1MDAwXCIsXG4gICAgICAgICAgICAgICAgICAgIFwiZXh0ZW5kZWRUaW1lT3V0XCI6IFwiMTAwMFwiLFxuICAgICAgICAgICAgICAgICAgICBcInNob3dFYXNpbmdcIjogXCJzd2luZ1wiLFxuICAgICAgICAgICAgICAgICAgICBcImhpZGVFYXNpbmdcIjogXCJsaW5lYXJcIixcbiAgICAgICAgICAgICAgICAgICAgXCJzaG93TWV0aG9kXCI6IFwiZmFkZUluXCIsXG4gICAgICAgICAgICAgICAgICAgIFwiaGlkZU1ldGhvZFwiOiBcImZhZGVPdXRcIlxuICAgICAgICAgICAgICAgIH07XG5cbiAgICAgICAgICAgICAgICB0b2FzdHIuc3VjY2VzcygnRmlsZSBtYW5hZ2VyIHNldHRpbmdzIGhhdmUgYmVlbiBzYXZlZCcpO1xuXG4gICAgICAgICAgICAgICAgc2F2ZUJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoXCJkYXRhLWt0LWluZGljYXRvclwiKTtcbiAgICAgICAgICAgIH0sIDEwMDApO1xuICAgICAgICB9KTtcblx0fVxuXG5cdC8vIFB1YmxpYyBtZXRob2RzXG5cdHJldHVybiB7XG5cdFx0aW5pdDogZnVuY3Rpb24oZWxlbWVudCkge1xuICAgICAgICAgICAgZm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9maWxlX21hbmFnZXJfc2V0dGluZ3MnKTtcblxuXHRcdFx0aGFuZGxlRm9ybSgpO1xuICAgICAgICB9XG5cdH07XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcbiAgICBLVEFwcEZpbGVNYW5hZ2VyU2V0dGluZ3MuaW5pdCgpO1xufSk7XG4iXSwibmFtZXMiOlsiS1RBcHBGaWxlTWFuYWdlclNldHRpbmdzIiwiZm9ybSIsImhhbmRsZUZvcm0iLCJzYXZlQnV0dG9uIiwicXVlcnlTZWxlY3RvciIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwicHJldmVudERlZmF1bHQiLCJzZXRBdHRyaWJ1dGUiLCJzZXRUaW1lb3V0IiwidG9hc3RyIiwib3B0aW9ucyIsInN1Y2Nlc3MiLCJyZW1vdmVBdHRyaWJ1dGUiLCJpbml0IiwiZWxlbWVudCIsImRvY3VtZW50IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/apps/file-manager/settings.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/apps/file-manager/settings.js"]();
/******/ 	
/******/ })()
;