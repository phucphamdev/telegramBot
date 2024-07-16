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

/***/ "./resources/assets/core/js/custom/utilities/modals/create-project/settings.js":
/*!*************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/utilities/modals/create-project/settings.js ***!
  \*************************************************************************************/
/***/ ((module) => {

eval("\n\n// Class definition\nvar KTModalCreateProjectSettings = function () {\n  // Variables\n  var nextButton;\n  var previousButton;\n  var validator;\n  var form;\n  var stepper;\n\n  // Private functions\n  var initForm = function initForm() {\n    // Project logo\n    // For more info about Dropzone plugin visit:  https://www.dropzonejs.com/#usage\n    var myDropzone = new Dropzone(\"#kt_modal_create_project_settings_logo\", {\n      url: \"https://keenthemes.com/scripts/void.php\",\n      // Set the url for your upload script location\n      paramName: \"file\",\n      // The name that will be used to transfer the file\n      maxFiles: 10,\n      maxFilesize: 10,\n      // MB\n      addRemoveLinks: true,\n      accept: function accept(file, done) {\n        if (file.name == \"justinbieber.jpg\") {\n          done(\"Naha, you don't.\");\n        } else {\n          done();\n        }\n      }\n    });\n\n    // Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/\n    var releaseDate = $(form.querySelector('[name=\"settings_release_date\"]'));\n    releaseDate.flatpickr({\n      enableTime: true,\n      dateFormat: \"d, M Y, H:i\"\n    });\n\n    // Expiry year. For more info, plase visit the official plugin site: https://select2.org/\n    $(form.querySelector('[name=\"settings_customer\"]')).on('change', function () {\n      // Revalidate the field when an option is chosen\n      validator.revalidateField('settings_customer');\n    });\n  };\n  var initValidation = function initValidation() {\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    validator = FormValidation.formValidation(form, {\n      fields: {\n        'settings_name': {\n          validators: {\n            notEmpty: {\n              message: 'Project name is required'\n            }\n          }\n        },\n        'settings_customer': {\n          validators: {\n            notEmpty: {\n              message: 'Customer is required'\n            }\n          }\n        },\n        'settings_description': {\n          validators: {\n            notEmpty: {\n              message: 'Description is required'\n            }\n          }\n        },\n        'settings_release_date': {\n          validators: {\n            notEmpty: {\n              message: 'Release date is required'\n            }\n          }\n        },\n        'settings_notifications[]': {\n          validators: {\n            notEmpty: {\n              message: 'Notifications are required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    });\n  };\n  var handleForm = function handleForm() {\n    nextButton.addEventListener('click', function (e) {\n      // Prevent default button action\n      e.preventDefault();\n\n      // Disable button to avoid multiple click \n      nextButton.disabled = true;\n\n      // Validate form before submit\n      if (validator) {\n        validator.validate().then(function (status) {\n          console.log('validated!');\n          if (status == 'Valid') {\n            // Show loading indication\n            nextButton.setAttribute('data-kt-indicator', 'on');\n\n            // Simulate form submission\n            setTimeout(function () {\n              // Simulate form submission\n              nextButton.removeAttribute('data-kt-indicator');\n\n              // Enable button\n              nextButton.disabled = false;\n\n              // Go to next step\n              stepper.goNext();\n            }, 1500);\n          } else {\n            // Enable button\n            nextButton.disabled = false;\n\n            // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n            Swal.fire({\n              text: \"Sorry, looks like there are some errors detected, please try again.\",\n              icon: \"error\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            });\n          }\n        });\n      }\n    });\n    previousButton.addEventListener('click', function () {\n      // Go to previous step\n      stepper.goPrevious();\n    });\n  };\n  return {\n    // Public functions\n    init: function init() {\n      form = KTModalCreateProject.getForm();\n      stepper = KTModalCreateProject.getStepperObj();\n      nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element=\"settings-next\"]');\n      previousButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element=\"settings-previous\"]');\n      initForm();\n      initValidation();\n      handleForm();\n    }\n  };\n}();\n\n// Webpack support\nif ( true && typeof module.exports !== 'undefined') {\n  window.KTModalCreateProjectSettings = module.exports = KTModalCreateProjectSettings;\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL3V0aWxpdGllcy9tb2RhbHMvY3JlYXRlLXByb2plY3Qvc2V0dGluZ3MuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSw0QkFBNEIsR0FBRyxZQUFZO0VBQzlDO0VBQ0EsSUFBSUMsVUFBVTtFQUNkLElBQUlDLGNBQWM7RUFDbEIsSUFBSUMsU0FBUztFQUNiLElBQUlDLElBQUk7RUFDUixJQUFJQyxPQUFPOztFQUVYO0VBQ0EsSUFBSUMsUUFBUSxHQUFHLFNBQVhBLFFBQVFBLENBQUEsRUFBYztJQUN6QjtJQUNBO0lBQ0EsSUFBSUMsVUFBVSxHQUFHLElBQUlDLFFBQVEsQ0FBQyx3Q0FBd0MsRUFBRTtNQUN2RUMsR0FBRyxFQUFFLHlDQUF5QztNQUFFO01BQ3ZDQyxTQUFTLEVBQUUsTUFBTTtNQUFFO01BQ25CQyxRQUFRLEVBQUUsRUFBRTtNQUNaQyxXQUFXLEVBQUUsRUFBRTtNQUFFO01BQ2pCQyxjQUFjLEVBQUUsSUFBSTtNQUNwQkMsTUFBTSxFQUFFLFNBQUFBLE9BQVNDLElBQUksRUFBRUMsSUFBSSxFQUFFO1FBQ3pCLElBQUlELElBQUksQ0FBQ0UsSUFBSSxJQUFJLGtCQUFrQixFQUFFO1VBQ2pDRCxJQUFJLENBQUMsa0JBQWtCLENBQUM7UUFDNUIsQ0FBQyxNQUFNO1VBQ0hBLElBQUksQ0FBQyxDQUFDO1FBQ1Y7TUFDSjtJQUNWLENBQUMsQ0FBQzs7SUFFRjtJQUNBLElBQUlFLFdBQVcsR0FBR0MsQ0FBQyxDQUFDZixJQUFJLENBQUNnQixhQUFhLENBQUMsZ0NBQWdDLENBQUMsQ0FBQztJQUN6RUYsV0FBVyxDQUFDRyxTQUFTLENBQUM7TUFDckJDLFVBQVUsRUFBRSxJQUFJO01BQ2hCQyxVQUFVLEVBQUU7SUFDYixDQUFDLENBQUM7O0lBRUY7SUFDTUosQ0FBQyxDQUFDZixJQUFJLENBQUNnQixhQUFhLENBQUMsNEJBQTRCLENBQUMsQ0FBQyxDQUFDSSxFQUFFLENBQUMsUUFB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VSxDQUFDLENBQUM7SUFDckIsQ0FBQyxDQUFDO0VBQ0gsQ0FBQztFQUVELE9BQU87SUFDTjtJQUNBQyxJQUFJLEVBQUUsU0FBQUEsS0FBQSxFQUFZO01BQ2pCNUQsSUFBSSxHQUFHNkQsb0JBQW9CLENBQUNDLE9BQU8sQ0FBQyxDQUFDO01BQ3JDN0QsT0FBTyxHQUFHNEQsb0JBQW9CLENBQUNFLGFBQWEsQ0FBQyxDQUFDO01BQzlDbEUsVUFBVSxHQUFHZ0Usb0JBQW9CLENBQUNHLFVBQVUsQ0FBQyxDQUFDLENBQUNoRCxhQUFhLENBQUMsbUNBQW1DLENBQUM7TUFDakdsQixjQUFjLEdBQUcrRCxvQkFBb0IsQ0FBQ0csVUFBVSxDQUFDLENBQUMsQ0FBQ2hELGFBQWEsQ0FBQyx1Q0FBdUMsQ0FBQztNQUV6R2QsUUFBUSxDQUFDLENBQUM7TUFDVm9CLGNBQWMsQ0FBQyxDQUFDO01BQ2hCZSxVQUFVLENBQUMsQ0FBQztJQUNiO0VBQ0QsQ0FBQztBQUNGLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0EsSUFBSSxLQUE2QixJQUFJLE9BQU80QixNQUFNLENBQUNDLE9BQU8sS0FBSyxXQUFXLEVBQUU7RUFDM0VDLE1BQU0sQ0FBQ3ZFLDRCQUE0QixHQUFHcUUsTUFBTSxDQUFDQyxPQUFPLEdBQUd0RSw0QkFBNEI7QUFDcEYiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL3V0aWxpdGllcy9tb2RhbHMvY3JlYXRlLXByb2plY3Qvc2V0dGluZ3MuanM/ZDJiZiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgZGVmaW5pdGlvblxudmFyIEtUTW9kYWxDcmVhdGVQcm9qZWN0U2V0dGluZ3MgPSBmdW5jdGlvbiAoKSB7XG5cdC8vIFZhcmlhYmxlc1xuXHR2YXIgbmV4dEJ1dHRvbjtcblx0dmFyIHByZXZpb3VzQnV0dG9uO1xuXHR2YXIgdmFsaWRhdG9yO1xuXHR2YXIgZm9ybTtcblx0dmFyIHN0ZXBwZXI7XG5cblx0Ly8gUHJpdmF0ZSBmdW5jdGlvbnNcblx0dmFyIGluaXRGb3JtID0gZnVuY3Rpb24oKSB7XG5cdFx0Ly8gUHJvamVjdCBsb2dvXG5cdFx0Ly8gRm9yIG1vcmUgaW5mbyBhYm91dCBEcm9wem9uZSBwbHVnaW4gdmlzaXQ6ICBodHRwczovL3d3dy5kcm9wem9uZWpzLmNvbS8jdXNhZ2Vcblx0XHR2YXIgbXlEcm9wem9uZSA9IG5ldyBEcm9wem9uZShcIiNrdF9tb2RhbF9jcmVhdGVfcHJvamVjdF9zZXR0aW5nc19sb2dvXCIsIHsgXG5cdFx0XHR1cmw6IFwiaHR0cHM6Ly9rZWVudGhlbWVzLmNvbS9zY3JpcHRzL3ZvaWQucGhwXCIsIC8vIFNldCB0aGUgdXJsIGZvciB5b3VyIHVwbG9hZCBzY3JpcHQgbG9jYXRpb25cbiAgICAgICAgICAgIHBhcmFtTmFtZTogXCJmaWxlXCIsIC8vIFRoZSBuYW1lIHRoYXQgd2lsbCBiZSB1c2VkIHRvIHRyYW5zZmVyIHRoZSBmaWxlXG4gICAgICAgICAgICBtYXhGaWxlczogMTAsXG4gICAgICAgICAgICBtYXhGaWxlc2l6ZTogMTAsIC8vIE1CXG4gICAgICAgICAgICBhZGRSZW1vdmVMaW5rczogdHJ1ZSxcbiAgICAgICAgICAgIGFjY2VwdDogZnVuY3Rpb24oZmlsZSwgZG9uZSkge1xuICAgICAgICAgICAgICAgIGlmIChmaWxlLm5hbWUgPT0gXCJqdXN0aW5iaWViZXIuanBnXCIpIHtcbiAgICAgICAgICAgICAgICAgICAgZG9uZShcIk5haGEsIHlvdSBkb24ndC5cIik7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgZG9uZSgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cblx0XHR9KTsgIFxuXG5cdFx0Ly8gRHVlIGRhdGUuIEZvciBtb3JlIGluZm8sIHBsZWFzZSB2aXNpdCB0aGUgb2ZmaWNpYWwgcGx1Z2luIHNpdGU6IGh0dHBzOi8vZmxhdHBpY2tyLmpzLm9yZy9cblx0XHR2YXIgcmVsZWFzZURhdGUgPSAkKGZvcm0ucXVlcnlTZWxlY3RvcignW25hbWU9XCJzZXR0aW5nc19yZWxlYXNlX2RhdGVcIl0nKSk7XG5cdFx0cmVsZWFzZURhdGUuZmxhdHBpY2tyKHtcblx0XHRcdGVuYWJsZVRpbWU6IHRydWUsXG5cdFx0XHRkYXRlRm9ybWF0OiBcImQsIE0gWSwgSDppXCIsXG5cdFx0fSk7XG5cblx0XHQvLyBFeHBpcnkgeWVhci4gRm9yIG1vcmUgaW5mbywgcGxhc2UgdmlzaXQgdGhlIG9mZmljaWFsIHBsdWdpbiBzaXRlOiBodHRwczovL3NlbGVjdDIub3JnL1xuICAgICAgICAkKGZvcm0ucXVlcnlTZWxlY3RvcignW25hbWU9XCJzZXR0aW5nc19jdXN0b21lclwiXScpKS5vbignY2hhbmdlJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAvLyBSZXZhbGlkYXRlIHRoZSBmaWVsZCB3aGVuIGFuIG9wdGlvbiBpcyBjaG9zZW5cbiAgICAgICAgICAgIHZhbGlkYXRvci5yZXZhbGlkYXRlRmllbGQoJ3NldHRpbmdzX2N1c3RvbWVyJyk7XG4gICAgICAgIH0pO1xuXHR9XG5cblx0dmFyIGluaXRWYWxpZGF0aW9uID0gZnVuY3Rpb24oKSB7XG5cdFx0Ly8gSW5pdCBmb3JtIHZhbGlkYXRpb24gcnVsZXMuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIEZvcm1WYWxpZGF0aW9uIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246aHR0cHM6Ly9mb3JtdmFsaWRhdGlvbi5pby9cblx0XHR2YWxpZGF0b3IgPSBGb3JtVmFsaWRhdGlvbi5mb3JtVmFsaWRhdGlvbihcblx0XHRcdGZvcm0sXG5cdFx0XHR7XG5cdFx0XHRcdGZpZWxkczoge1xuXHRcdFx0XHRcdCdzZXR0aW5nc19uYW1lJzoge1xuXHRcdFx0XHRcdFx0dmFsaWRhdG9yczoge1xuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xuXHRcdFx0XHRcdFx0XHRcdG1lc3NhZ2U6ICdQcm9qZWN0IG5hbWUgaXMgcmVxdWlyZWQnXG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdCdzZXR0aW5nc19jdXN0b21lcic6IHtcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnQ3VzdG9tZXIgaXMgcmVxdWlyZWQnXG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdCdzZXR0aW5nc19kZXNjcmlwdGlvbic6IHtcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnRGVzY3JpcHRpb24gaXMgcmVxdWlyZWQnXG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHR9LFxuXHRcdFx0XHRcdCdzZXR0aW5nc19yZWxlYXNlX2RhdGUnOiB7XG5cdFx0XHRcdFx0XHR2YWxpZGF0b3JzOiB7XG5cdFx0XHRcdFx0XHRcdG5vdEVtcHR5OiB7XG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ1JlbGVhc2UgZGF0ZSBpcyByZXF1aXJlZCdcblx0XHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdH0sXG5cdFx0XHRcdFx0J3NldHRpbmdzX25vdGlmaWNhdGlvbnNbXSc6IHtcblx0XHRcdFx0XHRcdHZhbGlkYXRvcnM6IHtcblx0XHRcdFx0XHRcdFx0bm90RW1wdHk6IHtcblx0XHRcdFx0XHRcdFx0XHRtZXNzYWdlOiAnTm90aWZpY2F0aW9ucyBhcmUgcmVxdWlyZWQnXG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHR9XG5cdFx0XHRcdH0sXG5cdFx0XHRcdFxuXHRcdFx0XHRwbHVnaW5zOiB7XG5cdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxuXHRcdFx0XHRcdGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwNSh7XG5cdFx0XHRcdFx0XHRyb3dTZWxlY3RvcjogJy5mdi1yb3cnLFxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlSW52YWxpZENsYXNzOiAnJyxcbiAgICAgICAgICAgICAgICAgICAgICAgIGVsZVZhbGlkQ2xhc3M6ICcnXG5cdFx0XHRcdFx0fSlcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdCk7XG5cdH1cblxuXHR2YXIgaGFuZGxlRm9ybSA9IGZ1bmN0aW9uKCkge1xuXHRcdG5leHRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuXHRcdFx0Ly8gUHJldmVudCBkZWZhdWx0IGJ1dHRvbiBhY3Rpb25cblx0XHRcdGUucHJldmVudERlZmF1bHQoKTtcblxuXHRcdFx0Ly8gRGlzYWJsZSBidXR0b24gdG8gYXZvaWQgbXVsdGlwbGUgY2xpY2sgXG5cdFx0XHRuZXh0QnV0dG9uLmRpc2FibGVkID0gdHJ1ZTtcblxuXHRcdFx0Ly8gVmFsaWRhdGUgZm9ybSBiZWZvcmUgc3VibWl0XG5cdFx0XHRpZiAodmFsaWRhdG9yKSB7XG5cdFx0XHRcdHZhbGlkYXRvci52YWxpZGF0ZSgpLnRoZW4oZnVuY3Rpb24gKHN0YXR1cykge1xuXHRcdFx0XHRcdGNvbnNvbGUubG9nKCd2YWxpZGF0ZWQhJyk7XG5cblx0XHRcdFx0XHRpZiAoc3RhdHVzID09ICdWYWxpZCcpIHtcblx0XHRcdFx0XHRcdC8vIFNob3cgbG9hZGluZyBpbmRpY2F0aW9uXG5cdFx0XHRcdFx0XHRuZXh0QnV0dG9uLnNldEF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InLCAnb24nKTtcblxuXHRcdFx0XHRcdFx0Ly8gU2ltdWxhdGUgZm9ybSBzdWJtaXNzaW9uXG5cdFx0XHRcdFx0XHRzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xuXHRcdFx0XHRcdFx0XHQvLyBTaW11bGF0ZSBmb3JtIHN1Ym1pc3Npb25cblx0XHRcdFx0XHRcdFx0bmV4dEJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XG5cblx0XHRcdFx0XHRcdFx0Ly8gRW5hYmxlIGJ1dHRvblxuXHRcdFx0XHRcdFx0XHRuZXh0QnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XG5cdFx0XHRcdFx0XHRcdFxuXHRcdFx0XHRcdFx0XHQvLyBHbyB0byBuZXh0IHN0ZXBcblx0XHRcdFx0XHRcdFx0c3RlcHBlci5nb05leHQoKTtcblx0XHRcdFx0XHRcdH0sIDE1MDApOyAgIFx0XHRcdFx0XHRcdFxuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHQvLyBFbmFibGUgYnV0dG9uXG5cdFx0XHRcdFx0XHRuZXh0QnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XG5cblx0XHRcdFx0XHRcdC8vIFNob3cgcG9wdXAgd2FybmluZy4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjogaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vXG5cdFx0XHRcdFx0XHRTd2FsLmZpcmUoe1xuXHRcdFx0XHRcdFx0XHR0ZXh0OiBcIlNvcnJ5LCBsb29rcyBsaWtlIHRoZXJlIGFyZSBzb21lIGVycm9ycyBkZXRlY3RlZCwgcGxlYXNlIHRyeSBhZ2Fpbi5cIixcblx0XHRcdFx0XHRcdFx0aWNvbjogXCJlcnJvclwiLFxuXHRcdFx0XHRcdFx0XHRidXR0b25zU3R5bGluZzogZmFsc2UsXG5cdFx0XHRcdFx0XHRcdGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXG5cdFx0XHRcdFx0XHRcdGN1c3RvbUNsYXNzOiB7XG5cdFx0XHRcdFx0XHRcdFx0Y29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxuXHRcdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHR9KTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH0pO1xuXHRcdFx0fVx0XHRcdFxuXHRcdH0pO1xuXG5cdFx0cHJldmlvdXNCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG5cdFx0XHQvLyBHbyB0byBwcmV2aW91cyBzdGVwXG5cdFx0XHRzdGVwcGVyLmdvUHJldmlvdXMoKTtcblx0XHR9KTtcblx0fVxuXG5cdHJldHVybiB7XG5cdFx0Ly8gUHVibGljIGZ1bmN0aW9uc1xuXHRcdGluaXQ6IGZ1bmN0aW9uICgpIHtcblx0XHRcdGZvcm0gPSBLVE1vZGFsQ3JlYXRlUHJvamVjdC5nZXRGb3JtKCk7XG5cdFx0XHRzdGVwcGVyID0gS1RNb2RhbENyZWF0ZVByb2plY3QuZ2V0U3RlcHBlck9iaigpO1xuXHRcdFx0bmV4dEJ1dHRvbiA9IEtUTW9kYWxDcmVhdGVQcm9qZWN0LmdldFN0ZXBwZXIoKS5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1lbGVtZW50PVwic2V0dGluZ3MtbmV4dFwiXScpO1xuXHRcdFx0cHJldmlvdXNCdXR0b24gPSBLVE1vZGFsQ3JlYXRlUHJvamVjdC5nZXRTdGVwcGVyKCkucXVlcnlTZWxlY3RvcignW2RhdGEta3QtZWxlbWVudD1cInNldHRpbmdzLXByZXZpb3VzXCJdJyk7XG5cblx0XHRcdGluaXRGb3JtKCk7XG5cdFx0XHRpbml0VmFsaWRhdGlvbigpO1xuXHRcdFx0aGFuZGxlRm9ybSgpO1xuXHRcdH1cblx0fTtcbn0oKTtcblxuLy8gV2VicGFjayBzdXBwb3J0XG5pZiAodHlwZW9mIG1vZHVsZSAhPT0gJ3VuZGVmaW5lZCcgJiYgdHlwZW9mIG1vZHVsZS5leHBvcnRzICE9PSAndW5kZWZpbmVkJykge1xuXHR3aW5kb3cuS1RNb2RhbENyZWF0ZVByb2plY3RTZXR0aW5ncyA9IG1vZHVsZS5leHBvcnRzID0gS1RNb2RhbENyZWF0ZVByb2plY3RTZXR0aW5ncztcbn1cbiJdLCJuYW1lcyI6WyJLVE1vZGFsQ3JlYXRlUHJvamVjdFNldHRpbmdzIiwibmV4dEJ1dHRvbiIsInByZXZpb3VzQnV0dG9uIiwidmFsaWRhdG9yIiwiZm9ybSIsInN0ZXBwZXIiLCJpbml0Rm9ybSIsIm15RHJvcHpvbmUiLCJEcm9wem9uZSIsInVybCIsInBhcmFtTmFtZSIsIm1heEZpbGVzIiwibWF4RmlsZXNpemUiLCJhZGRSZW1vdmVMaW5rcyIsImFjY2VwdCIsImZpbGUiLCJkb25lIiwibmFtZSIsInJlbGVhc2VEYXRlIiwiJCIsInF1ZXJ5U2VsZWN0b3IiLCJmbGF0cGlja3IiLCJlbmFibGVUaW1lIiwiZGF0ZUZvcm1hdCIsIm9uIiwicmV2YWxpZGF0ZUZpZWxkIiwiaW5pdFZhbGlkYXRpb24iLCJGb3JtVmFsaWRhdGlvbiIsImZvcm1WYWxpZGF0aW9uIiwiZmllbGRzIiwidmFsaWRhdG9ycyIsIm5vdEVtcHR5IiwibWVzc2FnZSIsInBsdWdpbnMiLCJ0cmlnZ2VyIiwiVHJpZ2dlciIsImJvb3RzdHJhcCIsIkJvb3RzdHJhcDUiLCJyb3dTZWxlY3RvciIsImVsZUludmFsaWRDbGFzcyIsImVsZVZhbGlkQ2xhc3MiLCJoYW5kbGVGb3JtIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImRpc2FibGVkIiwidmFsaWRhdGUiLCJ0aGVuIiwic3RhdHVzIiwiY29uc29sZSIsImxvZyIsInNldEF0dHJpYnV0ZSIsInNldFRpbWVvdXQiLCJyZW1vdmVBdHRyaWJ1dGUiLCJnb05leHQiLCJTd2FsIiwiZmlyZSIsInRleHQiLCJpY29uIiwiYnV0dG9uc1N0eWxpbmciLCJjb25maXJtQnV0dG9uVGV4dCIsImN1c3RvbUNsYXNzIiwiY29uZmlybUJ1dHRvbiIsImdvUHJldmlvdXMiLCJpbml0IiwiS1RNb2RhbENyZWF0ZVByb2plY3QiLCJnZXRGb3JtIiwiZ2V0U3RlcHBlck9iaiIsImdldFN0ZXBwZXIiLCJtb2R1bGUiLCJleHBvcnRzIiwid2luZG93Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/utilities/modals/create-project/settings.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/assets/core/js/custom/utilities/modals/create-project/settings.js");
/******/ 	
/******/ })()
;