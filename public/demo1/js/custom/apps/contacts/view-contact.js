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

/***/ "./resources/assets/core/js/custom/apps/contacts/view-contact.js":
/*!***********************************************************************!*\
  !*** ./resources/assets/core/js/custom/apps/contacts/view-contact.js ***!
  \***********************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTAppContactView = function () {\n  // Private functions\n  var handleDeleteButton = function handleDeleteButton() {\n    // Select form\n    var deleteButton = document.getElementById('kt_contact_delete');\n    if (!deleteButton) {\n      return;\n    }\n    deleteButton.addEventListener('click', function (e) {\n      // Prevent default button action\n      e.preventDefault();\n\n      // Show popup confirmation \n      Swal.fire({\n        text: \"Delete contact confirmation\",\n        icon: \"warning\",\n        buttonsStyling: false,\n        showCancelButton: true,\n        confirmButtonText: \"Yes, delete it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-danger\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          Swal.fire({\n            text: \"Contact has been deleted!\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          }).then(function (result) {\n            if (result.value) {\n              // Redirect to customers list page\n              window.location = deleteButton.getAttribute(\"data-kt-redirect\");\n            }\n          });\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Contact has not been deleted!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      handleDeleteButton();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTAppContactView.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvY29udGFjdHMvdmlldy1jb250YWN0LmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsZ0JBQWdCLEdBQUcsWUFBWTtFQUMvQjtFQUNBLElBQU1DLGtCQUFrQixHQUFHLFNBQXJCQSxrQkFBa0JBLENBQUEsRUFBUztJQUM3QjtJQUNBLElBQU1DLFlBQVksR0FBR0MsUUFBUSxDQUFDQyxjQUFjLENBQUMsbUJBQW1CLENBQUM7SUFFakUsSUFBSSxDQUFDRixZQUFZLEVBQUU7TUFDZjtJQUNKO0lBRUFBLFlBQVksQ0FBQ0csZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQUFDLENBQUMsRUFBSTtNQUN4QztNQUNBQSxDQUFDLENBQUNDLGNBQWMsQ0FBQyxDQUFDOztNQUVsQjtNQUNBQyxJQUFJLENBQUNDLElBQUksQ0FBQztRQUNOQyxJQUFJLEVBQUUsNkJBQTZCO1FBQ25DQyxJQUFJLEVBQUUsU0FBUztRQUNmQyxjQUFjLEVBQUUsS0FBSztRQUNyQkMsZ0JBQWdCLEVBQUUsSUFBSTtRQUN0QkMsaUJBQWlCLEVBQUUsaUJBQWlCO1FBQ3BDQyxnQkFBZ0IsRUFBRSxZQUFZO1FBQzlCQyxXQUFXLEVBQUU7VUFDVEMsYUFBYSxFQUFFLGdCQUFnQjtVQUMvQkMsWUFBWSxFQUFFO1FBQ2xCO01BQ0osQ0FBQyxDQUFDLENBQUNDLElBQUksQ0FBQyxVQUFVQyxNQUFNLEVBQUU7UUFDdEIsSUFBSUEsTUFBTSxDQUFDQyxLQUFLLEVBQUU7VUFDZGIsSUFBSSxDQUFDQyxJQUFJLENBQUM7WUFDTkMsSUFBSSxFQUFFLDJCQUEyQjtZQUNqQ0MsSUFBSSxFQUFFLFNBQVM7WUFDZkMsY0FBYyxFQUFFLEtBQUs7WUFDckJFLGlCQUFpQixFQUFFLGFBQWE7WUFDaENFLFdBQVcsRUFBRTtjQUNUQyxhQUFhLEVBQUU7WUFDbkI7VUFDSixDQUFDLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLFVBQVVDLE1BQU0sRUFBRTtZQUN0QixJQUFJQSxNQUFNLENBQUNDLEtBQUssRUFBRTtjQUNkO2NBQ0FDLE1BQU0sQ0FBQ0MsUUFBUSxHQUFHckIsWUFBWSxDQUFDc0IsWUFBWSxDQUFDLGtCQUFrQixDQUFDO1lBQ25FO1VBQ0osQ0FBQyxDQUFDO1FBQ04sQ0FBQyxNQUFNLElBQUlKLE1BQU0sQ0FBQ0ssT0FBTyxLQUFLLFFBQVEsRUFBRTtVQUNwQ2pCLElBQUksQ0FBQ0MsSUFBSSxDQUFDO1lBQ05DLElBQUksRUFBRSxnQ0FBZ0M7WUFDdENDLElBQUksRUFBRSxPQUFPO1lBQ2JDLGNBQWMsRUFBRSxLQUFLO1lBQ3JCRSxpQkFBaUIsRUFBRSxhQUFhO1lBQ2hDRSxXQUFXLEVBQUU7Y0FDVEMsYUFBYSxFQUFFO1lBQ25CO1VBQ0osQ0FBQyxDQUFDO1FBQ047TUFDSixDQUFDLENBQUM7SUFDTixDQUFDLENBQUM7RUFDTixDQUFDOztFQUVEO0VBQ0EsT0FBTztJQUNIUyxJQUFJLEVBQUUsU0FBQUEsS0FBQSxFQUFZO01BRWR6QixrQkFBa0IsQ0FBQyxDQUFDO0lBRXhCO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0EwQixNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVk7RUFDbEM1QixnQkFBZ0IsQ0FBQzBCLElBQUksQ0FBQyxDQUFDO0FBQzNCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vYXBwcy9jb250YWN0cy92aWV3LWNvbnRhY3QuanM/NDBlMiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgZGVmaW5pdGlvblxudmFyIEtUQXBwQ29udGFjdFZpZXcgPSBmdW5jdGlvbiAoKSB7XG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcbiAgICBjb25zdCBoYW5kbGVEZWxldGVCdXR0b24gPSAoKSA9PiB7XG4gICAgICAgIC8vIFNlbGVjdCBmb3JtXG4gICAgICAgIGNvbnN0IGRlbGV0ZUJ1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrdF9jb250YWN0X2RlbGV0ZScpO1xuXG4gICAgICAgIGlmICghZGVsZXRlQnV0dG9uKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBkZWxldGVCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcbiAgICAgICAgICAgIC8vIFByZXZlbnQgZGVmYXVsdCBidXR0b24gYWN0aW9uXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIC8vIFNob3cgcG9wdXAgY29uZmlybWF0aW9uIFxuICAgICAgICAgICAgU3dhbC5maXJlKHtcbiAgICAgICAgICAgICAgICB0ZXh0OiBcIkRlbGV0ZSBjb250YWN0IGNvbmZpcm1hdGlvblwiLFxuICAgICAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxuICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcbiAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIlllcywgZGVsZXRlIGl0IVwiLFxuICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6IFwiTm8sIHJldHVyblwiLFxuICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1kYW5nZXJcIixcbiAgICAgICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uOiBcImJ0biBidG4tYWN0aXZlLWxpZ2h0XCJcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcbiAgICAgICAgICAgICAgICBpZiAocmVzdWx0LnZhbHVlKSB7XG4gICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBcIkNvbnRhY3QgaGFzIGJlZW4gZGVsZXRlZCFcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXN1bHQudmFsdWUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBSZWRpcmVjdCB0byBjdXN0b21lcnMgbGlzdCBwYWdlXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uID0gZGVsZXRlQnV0dG9uLmdldEF0dHJpYnV0ZShcImRhdGEta3QtcmVkaXJlY3RcIik7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAocmVzdWx0LmRpc21pc3MgPT09ICdjYW5jZWwnKSB7XG4gICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBcIkNvbnRhY3QgaGFzIG5vdCBiZWVuIGRlbGV0ZWQhLlwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8vIFB1YmxpYyBtZXRob2RzXG4gICAgcmV0dXJuIHtcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xuXG4gICAgICAgICAgICBoYW5kbGVEZWxldGVCdXR0b24oKTtcblxuICAgICAgICB9XG4gICAgfTtcbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xuICAgIEtUQXBwQ29udGFjdFZpZXcuaW5pdCgpO1xufSk7XG4iXSwibmFtZXMiOlsiS1RBcHBDb250YWN0VmlldyIsImhhbmRsZURlbGV0ZUJ1dHRvbiIsImRlbGV0ZUJ1dHRvbiIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJhZGRFdmVudExpc3RlbmVyIiwiZSIsInByZXZlbnREZWZhdWx0IiwiU3dhbCIsImZpcmUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnNTdHlsaW5nIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImN1c3RvbUNsYXNzIiwiY29uZmlybUJ1dHRvbiIsImNhbmNlbEJ1dHRvbiIsInRoZW4iLCJyZXN1bHQiLCJ2YWx1ZSIsIndpbmRvdyIsImxvY2F0aW9uIiwiZ2V0QXR0cmlidXRlIiwiZGlzbWlzcyIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/apps/contacts/view-contact.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/apps/contacts/view-contact.js"]();
/******/ 	
/******/ })()
;