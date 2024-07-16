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

/***/ "./resources/assets/core/js/custom/apps/user-management/users/view/add-auth-app.js":
/*!*****************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/apps/user-management/users/view/add-auth-app.js ***!
  \*****************************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTUsersAddAuthApp = function () {\n  // Shared variables\n  var element = document.getElementById('kt_modal_add_auth_app');\n  var modal = new bootstrap.Modal(element);\n\n  // Init add schedule modal\n  var initAddAuthApp = function initAddAuthApp() {\n    // Close button handler\n    var closeButton = element.querySelector('[data-kt-users-modal-action=\"close\"]');\n    closeButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like to close?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, close it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          modal.hide(); // Hide modal\t\t\t\t\n        }\n      });\n    });\n  };\n\n  // QR code to text code swapper\n  var initCodeSwap = function initCodeSwap() {\n    var qrCode = element.querySelector('[ data-kt-add-auth-action=\"qr-code\"]');\n    var textCode = element.querySelector('[ data-kt-add-auth-action=\"text-code\"]');\n    var qrCodeButton = element.querySelector('[ data-kt-add-auth-action=\"qr-code-button\"]');\n    var textCodeButton = element.querySelector('[ data-kt-add-auth-action=\"text-code-button\"]');\n    var qrCodeLabel = element.querySelector('[ data-kt-add-auth-action=\"qr-code-label\"]');\n    var textCodeLabel = element.querySelector('[ data-kt-add-auth-action=\"text-code-label\"]');\n    var toggleClass = function toggleClass() {\n      qrCode.classList.toggle('d-none');\n      qrCodeButton.classList.toggle('d-none');\n      qrCodeLabel.classList.toggle('d-none');\n      textCode.classList.toggle('d-none');\n      textCodeButton.classList.toggle('d-none');\n      textCodeLabel.classList.toggle('d-none');\n    };\n\n    // Swap to text code handler\n    textCodeButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      toggleClass();\n    });\n    qrCodeButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      toggleClass();\n    });\n  };\n  return {\n    // Public functions\n    init: function init() {\n      initAddAuthApp();\n      initCodeSwap();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTUsersAddAuthApp.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvdXNlci1tYW5hZ2VtZW50L3VzZXJzL3ZpZXcvYWRkLWF1dGgtYXBwLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsaUJBQWlCLEdBQUcsWUFBWTtFQUNoQztFQUNBLElBQU1DLE9BQU8sR0FBR0MsUUFBUSxDQUFDQyxjQUFjLENBQUMsdUJBQXVCLENBQUM7RUFDaEUsSUFBTUMsS0FBSyxHQUFHLElBQUlDLFNBQVMsQ0FBQ0MsS0FBSyxDQUFDTCxPQUFPLENBQUM7O0VBRTFDO0VBQ0EsSUFBSU0sY0FBYyxHQUFHLFNBQWpCQSxjQUFjQSxDQUFBLEVBQVM7SUFFdkI7SUFDQSxJQUFNQyxXQUFXLEdBQUdQLE9BQU8sQ0FBQ1EsYUFBYSxDQUFDLHNDQUFzQyxDQUFDO0lBQ2pGRCxXQUFXLENBQUNFLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFBQyxDQUFDLEVBQUk7TUFDdkNBLENBQUMsQ0FBQ0MsY0FBYyxDQUFDLENBQUM7TUFFbEJDLElBQUksQ0FBQ0MsSUFBSSxDQUFDO1FBQ05DLElBQUksRUFBRSx1Q0FBdUM7UUFDN0NDLElBQUksRUFBRSxTQUFTO1FBQ2ZDLGdCQUFnQixFQUFFLElBQUk7UUFDdEJDLGNBQWMsRUFBRSxLQUFLO1FBQ3JCQyxpQkFBaUIsRUFBRSxnQkFBZ0I7UUFDbkNDLGdCQUFnQixFQUFFLFlBQVk7UUFDOUJDLFdBQVcsRUFBRTtVQUNUQyxhQUFhLEVBQUUsaUJBQWlCO1VBQ2hDQyxZQUFZLEVBQUU7UUFDbEI7TUFDSixDQUFDLENBQUMsQ0FBQ0MsSUFBSSxDQUFDLFVBQVVDLE1BQU0sRUFBRTtRQUN0QixJQUFJQSxNQUFNLENBQUNDLEtBQUssRUFBRTtVQUNkdEIsS0FBSyxDQUFDdUIsSUFBSSxDQUFDLENBQUMsQ0FBQyxDQUFDO1FBQ2xCO01BQ0osQ0FBQyxDQUFDO0lBQ04sQ0FBQyxDQUFDO0VBRU4sQ0FBQzs7RUFFRDtFQUNBLElBQUlDLFlBQVksR0FBRyxTQUFmQSxZQUFZQSxDQUFBLEVBQVM7SUFDckIsSUFBTUMsTUFBTSxHQUFHNUIsT0FBTyxDQUFDUSxhQUFhLENBQUMsc0NBQXNDLENBQUM7SUFDNUUsSUFBTXFCLFFBQVEsR0FBRzdCLE9BQU8sQ0FBQ1EsYUFBYSxDQUFDLHdDQUF3QyxDQUFDO0lBQ2hGLElBQU1zQixZQUFZLEdBQUc5QixPQUFPLENBQUNRLGFBQWEsQ0FBQyw2Q0FBNkMsQ0FBQztJQUN6RixJQUFNdUIsY0FBYyxHQUFHL0IsT0FBTyxDQUFDUSxhQUFhLENBQUMsK0NBQStDLENBQUM7SUFDN0YsSUFBTXdCLFdBQVcsR0FBR2hDLE9BQU8sQ0FBQ1EsYUFBYSxDQUFDLDRDQUE0QyxDQUFDO0lBQ3ZGLElBQU15QixhQUFhLEdBQUdqQyxPQUFPLENBQUNRLGFBQWEsQ0FBQyw4Q0FBOEMsQ0FBQztJQUUzRixJQUFNMEIsV0FBVyxHQUFHLFNBQWRBLFdBQVdBLENBQUEsRUFBUTtNQUNyQk4sTUFBTSxDQUFDTyxTQUFTLENBQUNDLE1BQU0sQ0FBQyxRQUFRLENBQUM7TUFDakNOLFlBQVksQ0FBQ0ssU0FBUyxDQUFDQyxNQUFNLENBQUMsUUFBUSxDQUFDO01BQ3ZDSixXQUFXLENBQUNHLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLFFBQVEsQ0FBQztNQUN0Q1AsUUFBUSxDQUFDTSxTQUFTLENBQUNDLE1BQU0sQ0FBQyxRQUFRLENBQUM7TUFDbkNMLGNBQWMsQ0FBQ0ksU0FBUyxDQUFDQyxNQUFNLENBQUMsUUFBUSxDQUFDO01BQ3pDSCxhQUFhLENBQUNFLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLFFBQVEsQ0FBQztJQUM1QyxDQUFDOztJQUVEO0lBQ0FMLGNBQWMsQ0FBQ3RCLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFBQyxDQUFDLEVBQUc7TUFDekNBLENBQUMsQ0FBQ0MsY0FBYyxDQUFDLENBQUM7TUFFbEJ1QixXQUFXLENBQUMsQ0FBQztJQUNqQixDQUFDLENBQUM7SUFFRkosWUFBWSxDQUFDckIsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQUFDLENBQUMsRUFBRztNQUN2Q0EsQ0FBQyxDQUFDQyxjQUFjLENBQUMsQ0FBQztNQUVsQnVCLFdBQVcsQ0FBQyxDQUFDO0lBQ2pCLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRCxPQUFPO0lBQ0g7SUFDQUcsSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBWTtNQUNkL0IsY0FBYyxDQUFDLENBQUM7TUFDaEJxQixZQUFZLENBQUMsQ0FBQztJQUNsQjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBVyxNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVk7RUFDbEN4QyxpQkFBaUIsQ0FBQ3NDLElBQUksQ0FBQyxDQUFDO0FBQzVCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vYXBwcy91c2VyLW1hbmFnZW1lbnQvdXNlcnMvdmlldy9hZGQtYXV0aC1hcHAuanM/MTZjYSJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgZGVmaW5pdGlvblxudmFyIEtUVXNlcnNBZGRBdXRoQXBwID0gZnVuY3Rpb24gKCkge1xuICAgIC8vIFNoYXJlZCB2YXJpYWJsZXNcbiAgICBjb25zdCBlbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X21vZGFsX2FkZF9hdXRoX2FwcCcpO1xuICAgIGNvbnN0IG1vZGFsID0gbmV3IGJvb3RzdHJhcC5Nb2RhbChlbGVtZW50KTtcblxuICAgIC8vIEluaXQgYWRkIHNjaGVkdWxlIG1vZGFsXG4gICAgdmFyIGluaXRBZGRBdXRoQXBwID0gKCkgPT4ge1xuXG4gICAgICAgIC8vIENsb3NlIGJ1dHRvbiBoYW5kbGVyXG4gICAgICAgIGNvbnN0IGNsb3NlQnV0dG9uID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC11c2Vycy1tb2RhbC1hY3Rpb249XCJjbG9zZVwiXScpO1xuICAgICAgICBjbG9zZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT4ge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgIHRleHQ6IFwiQXJlIHlvdSBzdXJlIHlvdSB3b3VsZCBsaWtlIHRvIGNsb3NlP1wiLFxuICAgICAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxuICAgICAgICAgICAgICAgIHNob3dDYW5jZWxCdXR0b246IHRydWUsXG4gICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIlllcywgY2xvc2UgaXQhXCIsXG4gICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogXCJObywgcmV0dXJuXCIsXG4gICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcbiAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcbiAgICAgICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uOiBcImJ0biBidG4tYWN0aXZlLWxpZ2h0XCJcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcbiAgICAgICAgICAgICAgICBpZiAocmVzdWx0LnZhbHVlKSB7XG4gICAgICAgICAgICAgICAgICAgIG1vZGFsLmhpZGUoKTsgLy8gSGlkZSBtb2RhbFx0XHRcdFx0XG4gICAgICAgICAgICAgICAgfSBcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgIH1cblxuICAgIC8vIFFSIGNvZGUgdG8gdGV4dCBjb2RlIHN3YXBwZXJcbiAgICB2YXIgaW5pdENvZGVTd2FwID0gKCkgPT4ge1xuICAgICAgICBjb25zdCBxckNvZGUgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1sgZGF0YS1rdC1hZGQtYXV0aC1hY3Rpb249XCJxci1jb2RlXCJdJyk7XG4gICAgICAgIGNvbnN0IHRleHRDb2RlID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbIGRhdGEta3QtYWRkLWF1dGgtYWN0aW9uPVwidGV4dC1jb2RlXCJdJyk7XG4gICAgICAgIGNvbnN0IHFyQ29kZUJ1dHRvbiA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignWyBkYXRhLWt0LWFkZC1hdXRoLWFjdGlvbj1cInFyLWNvZGUtYnV0dG9uXCJdJyk7XG4gICAgICAgIGNvbnN0IHRleHRDb2RlQnV0dG9uID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbIGRhdGEta3QtYWRkLWF1dGgtYWN0aW9uPVwidGV4dC1jb2RlLWJ1dHRvblwiXScpO1xuICAgICAgICBjb25zdCBxckNvZGVMYWJlbCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignWyBkYXRhLWt0LWFkZC1hdXRoLWFjdGlvbj1cInFyLWNvZGUtbGFiZWxcIl0nKTtcbiAgICAgICAgY29uc3QgdGV4dENvZGVMYWJlbCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignWyBkYXRhLWt0LWFkZC1hdXRoLWFjdGlvbj1cInRleHQtY29kZS1sYWJlbFwiXScpO1xuXG4gICAgICAgIGNvbnN0IHRvZ2dsZUNsYXNzID0gKCkgPT57XG4gICAgICAgICAgICBxckNvZGUuY2xhc3NMaXN0LnRvZ2dsZSgnZC1ub25lJyk7XG4gICAgICAgICAgICBxckNvZGVCdXR0b24uY2xhc3NMaXN0LnRvZ2dsZSgnZC1ub25lJyk7XG4gICAgICAgICAgICBxckNvZGVMYWJlbC5jbGFzc0xpc3QudG9nZ2xlKCdkLW5vbmUnKTtcbiAgICAgICAgICAgIHRleHRDb2RlLmNsYXNzTGlzdC50b2dnbGUoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgdGV4dENvZGVCdXR0b24uY2xhc3NMaXN0LnRvZ2dsZSgnZC1ub25lJyk7XG4gICAgICAgICAgICB0ZXh0Q29kZUxhYmVsLmNsYXNzTGlzdC50b2dnbGUoJ2Qtbm9uZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gU3dhcCB0byB0ZXh0IGNvZGUgaGFuZGxlclxuICAgICAgICB0ZXh0Q29kZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT57XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIHRvZ2dsZUNsYXNzKCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIHFyQ29kZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT57XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIHRvZ2dsZUNsYXNzKCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHJldHVybiB7XG4gICAgICAgIC8vIFB1YmxpYyBmdW5jdGlvbnNcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgaW5pdEFkZEF1dGhBcHAoKTtcbiAgICAgICAgICAgIGluaXRDb2RlU3dhcCgpO1xuICAgICAgICB9XG4gICAgfTtcbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xuICAgIEtUVXNlcnNBZGRBdXRoQXBwLmluaXQoKTtcbn0pOyJdLCJuYW1lcyI6WyJLVFVzZXJzQWRkQXV0aEFwcCIsImVsZW1lbnQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwibW9kYWwiLCJib290c3RyYXAiLCJNb2RhbCIsImluaXRBZGRBdXRoQXBwIiwiY2xvc2VCdXR0b24iLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJwcmV2ZW50RGVmYXVsdCIsIlN3YWwiLCJmaXJlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiYnV0dG9uc1N0eWxpbmciLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJjYW5jZWxCdXR0b24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJoaWRlIiwiaW5pdENvZGVTd2FwIiwicXJDb2RlIiwidGV4dENvZGUiLCJxckNvZGVCdXR0b24iLCJ0ZXh0Q29kZUJ1dHRvbiIsInFyQ29kZUxhYmVsIiwidGV4dENvZGVMYWJlbCIsInRvZ2dsZUNsYXNzIiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwiaW5pdCIsIktUVXRpbCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/apps/user-management/users/view/add-auth-app.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/apps/user-management/users/view/add-auth-app.js"]();
/******/ 	
/******/ })()
;