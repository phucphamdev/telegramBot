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

/***/ "./resources/assets/core/js/custom/pages/user-profile/followers.js":
/*!*************************************************************************!*\
  !*** ./resources/assets/core/js/custom/pages/user-profile/followers.js ***!
  \*************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTProfileFollowers = function () {\n  // init variables\n  var showMoreButton;\n  var showMoreCards;\n  var followBtn;\n\n  // Private functions\n  var handleShowMore = function handleShowMore() {\n    if (!showMoreButton) {\n      return;\n    }\n\n    // Show more click\n    showMoreButton.addEventListener('click', function (e) {\n      showMoreButton.setAttribute('data-kt-indicator', 'on');\n\n      // Disable button to avoid multiple click \n      showMoreButton.disabled = true;\n      setTimeout(function () {\n        // Hide loading indication\n        showMoreButton.removeAttribute('data-kt-indicator');\n\n        // Enable button\n        showMoreButton.disabled = false;\n\n        // Hide button\n        showMoreButton.classList.add('d-none');\n\n        // Show card\n        showMoreCards.classList.remove('d-none');\n\n        // Scroll to card\n        KTUtil.scrollTo(showMoreCards, 200);\n      }, 2000);\n    });\n  };\n\n  // Follow button\n  var handleUFollow = function handleUFollow() {\n    if (!followBtn) {\n      return;\n    }\n    followBtn.addEventListener('click', function (e) {\n      // Prevent default action \n      e.preventDefault();\n\n      // Show indicator\n      followBtn.setAttribute('data-kt-indicator', 'on');\n\n      // Disable button to avoid multiple click \n      followBtn.disabled = true;\n\n      // Check button state\n      if (followBtn.classList.contains(\"btn-success\")) {\n        setTimeout(function () {\n          followBtn.removeAttribute('data-kt-indicator');\n          followBtn.classList.remove(\"btn-success\");\n          followBtn.classList.add(\"btn-light\");\n          followBtn.querySelector(\".svg-icon\").classList.add(\"d-none\");\n          followBtn.querySelector(\".indicator-label\").innerHTML = 'Follow';\n          followBtn.disabled = false;\n        }, 1500);\n      } else {\n        setTimeout(function () {\n          followBtn.removeAttribute('data-kt-indicator');\n          followBtn.classList.add(\"btn-success\");\n          followBtn.classList.remove(\"btn-light\");\n          followBtn.querySelector(\".svg-icon\").classList.remove(\"d-none\");\n          followBtn.querySelector(\".indicator-label\").innerHTML = 'Following';\n          followBtn.disabled = false;\n        }, 1000);\n      }\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      showMoreButton = document.querySelector('#kt_followers_show_more_button');\n      showMoreCards = document.querySelector('#kt_followers_show_more_cards');\n      followBtn = document.querySelector('#kt_user_follow_button');\n      handleShowMore();\n      handleUFollow();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTProfileFollowers.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL3BhZ2VzL3VzZXItcHJvZmlsZS9mb2xsb3dlcnMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxrQkFBa0IsR0FBRyxZQUFZO0VBQ2pDO0VBQ0EsSUFBSUMsY0FBYztFQUNsQixJQUFJQyxhQUFhO0VBQ2pCLElBQUlDLFNBQVM7O0VBRWI7RUFDQSxJQUFJQyxjQUFjLEdBQUcsU0FBakJBLGNBQWNBLENBQUEsRUFBZTtJQUM3QixJQUFJLENBQUNILGNBQWMsRUFBRTtNQUNqQjtJQUNKOztJQUVBO0lBQ0FBLGNBQWMsQ0FBQ0ksZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVVDLENBQUMsRUFBRTtNQUNsREwsY0FBYyxDQUFDTSxZQUFZLENBQUMsbUJBQW1CLEVBQUUsSUFBSSxDQUFDOztNQUV0RDtNQUNBTixjQUFjLENBQUNPLFFBQVEsR0FBRyxJQUFJO01BRTlCQyxVQUFVLENBQUMsWUFBVztRQUNsQjtRQUNBUixjQUFjLENBQUNTLGVBQWUsQ0FBQyxtQkFBbUIsQ0FBQzs7UUFFbkQ7UUFDWlQsY0FBYyxDQUFDTyxRQUFRLEdBQUcsS0FBSzs7UUFFbkI7UUFDQVAsY0FBYyxDQUFDVSxTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7O1FBRXRDO1FBQ0FWLGFBQWEsQ0FBQ1MsU0FBUyxDQUFDRSxNQUFNLENBQUMsUUFBUSxDQUFDOztRQUV4QztRQUNBQyxNQUFNLENBQUNDLFFBQVEsQ0FBQ2IsYUFBYSxFQUFFLEdBQUcsQ0FBQztNQUN2QyxDQUFDLEVBQUUsSUFBSSxDQUFDO0lBQ1osQ0FBQyxDQUFDO0VBQ04sQ0FBQzs7RUFFRDtFQUNBLElBQUljLGFBQWEsR0FBRyxTQUFoQkEsYUFBYUEsQ0FBQSxFQUFjO0lBQzNCLElBQUksQ0FBQ2IsU0FBUyxFQUFFO01BQ1o7SUFDSjtJQUVBQSxTQUFTLENBQUNFLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFTQyxDQUFDLEVBQUM7TUFDM0M7TUFDQUEsQ0FBQyxDQUFDVyxjQUFjLENBQUMsQ0FBQzs7TUFFbEI7TUFDQWQsU0FBUyxDQUFDSSxZQUFZLENBQUMsbUJBQW1CLEVBQUUsSUFBSSxDQUFDOztNQUVqRDtNQUNBSixTQUFTLENBQUNLLFFBQVEsR0FBRyxJQUFJOztNQUV6QjtNQUNBLElBQUlMLFNBQVMsQ0FBQ1EsU0FBUyxDQUFDTyxRQUFRLENBQUMsYUFBYSxDQUFDLEVBQUU7UUFDekNULFVBQVUsQ0FBQyxZQUFXO1VBQ3RCTixTQUFTLENBQUNPLGVBQWUsQ0FBQyxtQkFBbUIsQ0FBQztVQUM5Q1AsU0FBUyxDQUFDUSxTQUFTLENBQUNFLE1BQU0sQ0FBQyxhQUFhLENBQUM7VUFDekNWLFNBQVMsQ0FBQ1EsU0FBUyxDQUFDQyxHQUFHLENBQUMsV0FBVyxDQUFDO1VBQ3BDVCxTQUFTLENBQUNnQixhQUFhLENBQUMsV0FBVyxDQUFDLENBQUNSLFNBQVMsQ0FBQ0MsR0FBRyxDQUFDLFFBQVEsQ0FBQztVQUM1RFQsU0FBUyxDQUFDZ0IsYUFBYSxDQUFDLGtCQUFrQixDQUFDLENBQUNDLFNBQVMsR0FBRyxRQUFRO1VBQ2hFakIsU0FBUyxDQUFDSyxRQUFRLEdBQUcsS0FBSztRQUM5QixDQUFDLEVBQUUsSUFBSSxDQUFDO01BQ1osQ0FBQyxNQUFNO1FBQ0NDLFVBQVUsQ0FBQyxZQUFXO1VBQ3RCTixTQUFTLENBQUNPLGVBQWUsQ0FBQyxtQkFBbUIsQ0FBQztVQUM5Q1AsU0FBUyxDQUFDUSxTQUFTLENBQUNDLEdBQUcsQ0FBQyxhQUFhLENBQUM7VUFDdENULFNBQVMsQ0FBQ1EsU0FBUyxDQUFDRSxNQUFNLENBQUMsV0FBVyxDQUFDO1VBQ3ZDVixTQUFTLENBQUNnQixhQUFhLENBQUMsV0FBVyxDQUFDLENBQUNSLFNBQVMsQ0FBQ0UsTUFBTSxDQUFDLFFBQVEsQ0FBQztVQUMvRFYsU0FBUyxDQUFDZ0IsYUFBYSxDQUFDLGtCQUFrQixDQUFDLENBQUNDLFNBQVMsR0FBRyxXQUFXO1VBQ25FakIsU0FBUyxDQUFDSyxRQUFRLEdBQUcsS0FBSztRQUM5QixDQUFDLEVBQUUsSUFBSSxDQUFDO01BQ1o7SUFDSixDQUFDLENBQUM7RUFDTixDQUFDOztFQUVEO0VBQ0EsT0FBTztJQUNIYSxJQUFJLEVBQUUsU0FBQUEsS0FBQSxFQUFZO01BQ2RwQixjQUFjLEdBQUdxQixRQUFRLENBQUNILGFBQWEsQ0FBQyxnQ0FBZ0MsQ0FBQztNQUN6RWpCLGFBQWEsR0FBR29CLFFBQVEsQ0FBQ0gsYUFBYSxDQUFDLCtCQUErQixDQUFDO01BQ3ZFaEIsU0FBUyxHQUFHbUIsUUFBUSxDQUFDSCxhQUFhLENBQUMsd0JBQXdCLENBQUM7TUFFNURmLGNBQWMsQ0FBQyxDQUFDO01BQ2hCWSxhQUFhLENBQUMsQ0FBQztJQUNuQjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBRixNQUFNLENBQUNTLGtCQUFrQixDQUFDLFlBQVc7RUFDakN2QixrQkFBa0IsQ0FBQ3FCLElBQUksQ0FBQyxDQUFDO0FBQzdCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vcGFnZXMvdXNlci1wcm9maWxlL2ZvbGxvd2Vycy5qcz9hNzIyIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4vLyBDbGFzcyBkZWZpbml0aW9uXG52YXIgS1RQcm9maWxlRm9sbG93ZXJzID0gZnVuY3Rpb24gKCkge1xuICAgIC8vIGluaXQgdmFyaWFibGVzXG4gICAgdmFyIHNob3dNb3JlQnV0dG9uO1xuICAgIHZhciBzaG93TW9yZUNhcmRzO1xuICAgIHZhciBmb2xsb3dCdG47XG5cbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xuICAgIHZhciBoYW5kbGVTaG93TW9yZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCFzaG93TW9yZUJ1dHRvbikge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gU2hvdyBtb3JlIGNsaWNrXG4gICAgICAgIHNob3dNb3JlQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgICAgIHNob3dNb3JlQnV0dG9uLnNldEF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InLCAnb24nKTtcblxuICAgICAgICAgICAgLy8gRGlzYWJsZSBidXR0b24gdG8gYXZvaWQgbXVsdGlwbGUgY2xpY2sgXG4gICAgICAgICAgICBzaG93TW9yZUJ1dHRvbi5kaXNhYmxlZCA9IHRydWU7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgLy8gSGlkZSBsb2FkaW5nIGluZGljYXRpb25cbiAgICAgICAgICAgICAgICBzaG93TW9yZUJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XG5cbiAgICAgICAgICAgICAgICAvLyBFbmFibGUgYnV0dG9uXG5cdFx0XHRcdHNob3dNb3JlQnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XG5cbiAgICAgICAgICAgICAgICAvLyBIaWRlIGJ1dHRvblxuICAgICAgICAgICAgICAgIHNob3dNb3JlQnV0dG9uLmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xuXG4gICAgICAgICAgICAgICAgLy8gU2hvdyBjYXJkXG4gICAgICAgICAgICAgICAgc2hvd01vcmVDYXJkcy5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcblxuICAgICAgICAgICAgICAgIC8vIFNjcm9sbCB0byBjYXJkXG4gICAgICAgICAgICAgICAgS1RVdGlsLnNjcm9sbFRvKHNob3dNb3JlQ2FyZHMsIDIwMCk7XG4gICAgICAgICAgICB9LCAyMDAwKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLy8gRm9sbG93IGJ1dHRvblxuICAgIHZhciBoYW5kbGVVRm9sbG93ID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIGlmICghZm9sbG93QnRuKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBmb2xsb3dCdG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKXtcbiAgICAgICAgICAgIC8vIFByZXZlbnQgZGVmYXVsdCBhY3Rpb24gXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIC8vIFNob3cgaW5kaWNhdG9yXG4gICAgICAgICAgICBmb2xsb3dCdG4uc2V0QXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicsICdvbicpO1xuICAgICAgICAgICAgXG4gICAgICAgICAgICAvLyBEaXNhYmxlIGJ1dHRvbiB0byBhdm9pZCBtdWx0aXBsZSBjbGljayBcbiAgICAgICAgICAgIGZvbGxvd0J0bi5kaXNhYmxlZCA9IHRydWU7XG5cbiAgICAgICAgICAgIC8vIENoZWNrIGJ1dHRvbiBzdGF0ZVxuICAgICAgICAgICAgaWYgKGZvbGxvd0J0bi5jbGFzc0xpc3QuY29udGFpbnMoXCJidG4tc3VjY2Vzc1wiKSkge1xuICAgICAgICAgICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4ucmVtb3ZlQXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicpO1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4uY2xhc3NMaXN0LnJlbW92ZShcImJ0bi1zdWNjZXNzXCIpO1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4uY2xhc3NMaXN0LmFkZChcImJ0bi1saWdodFwiKTtcbiAgICAgICAgICAgICAgICAgICAgZm9sbG93QnRuLnF1ZXJ5U2VsZWN0b3IoXCIuc3ZnLWljb25cIikuY2xhc3NMaXN0LmFkZChcImQtbm9uZVwiKTtcbiAgICAgICAgICAgICAgICAgICAgZm9sbG93QnRuLnF1ZXJ5U2VsZWN0b3IoXCIuaW5kaWNhdG9yLWxhYmVsXCIpLmlubmVySFRNTCA9ICdGb2xsb3cnO1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4uZGlzYWJsZWQgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICB9LCAxNTAwKTsgICBcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgIGZvbGxvd0J0bi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XG4gICAgICAgICAgICAgICAgICAgIGZvbGxvd0J0bi5jbGFzc0xpc3QuYWRkKFwiYnRuLXN1Y2Nlc3NcIik7XG4gICAgICAgICAgICAgICAgICAgIGZvbGxvd0J0bi5jbGFzc0xpc3QucmVtb3ZlKFwiYnRuLWxpZ2h0XCIpO1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4ucXVlcnlTZWxlY3RvcihcIi5zdmctaWNvblwiKS5jbGFzc0xpc3QucmVtb3ZlKFwiZC1ub25lXCIpO1xuICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdG4ucXVlcnlTZWxlY3RvcihcIi5pbmRpY2F0b3ItbGFiZWxcIikuaW5uZXJIVE1MID0gJ0ZvbGxvd2luZyc7XG4gICAgICAgICAgICAgICAgICAgIGZvbGxvd0J0bi5kaXNhYmxlZCA9IGZhbHNlO1xuICAgICAgICAgICAgICAgIH0sIDEwMDApOyAgIFxuICAgICAgICAgICAgfSAgICAgICAgXG4gICAgICAgIH0pOyAgICAgICAgXG4gICAgfVxuXG4gICAgLy8gUHVibGljIG1ldGhvZHNcbiAgICByZXR1cm4ge1xuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBzaG93TW9yZUJ1dHRvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9mb2xsb3dlcnNfc2hvd19tb3JlX2J1dHRvbicpO1xuICAgICAgICAgICAgc2hvd01vcmVDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9mb2xsb3dlcnNfc2hvd19tb3JlX2NhcmRzJyk7XG4gICAgICAgICAgICBmb2xsb3dCdG4gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfdXNlcl9mb2xsb3dfYnV0dG9uJyk7XG5cbiAgICAgICAgICAgIGhhbmRsZVNob3dNb3JlKCk7XG4gICAgICAgICAgICBoYW5kbGVVRm9sbG93KCk7XG4gICAgICAgIH1cbiAgICB9XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xuICAgIEtUUHJvZmlsZUZvbGxvd2Vycy5pbml0KCk7XG59KTsiXSwibmFtZXMiOlsiS1RQcm9maWxlRm9sbG93ZXJzIiwic2hvd01vcmVCdXR0b24iLCJzaG93TW9yZUNhcmRzIiwiZm9sbG93QnRuIiwiaGFuZGxlU2hvd01vcmUiLCJhZGRFdmVudExpc3RlbmVyIiwiZSIsInNldEF0dHJpYnV0ZSIsImRpc2FibGVkIiwic2V0VGltZW91dCIsInJlbW92ZUF0dHJpYnV0ZSIsImNsYXNzTGlzdCIsImFkZCIsInJlbW92ZSIsIktUVXRpbCIsInNjcm9sbFRvIiwiaGFuZGxlVUZvbGxvdyIsInByZXZlbnREZWZhdWx0IiwiY29udGFpbnMiLCJxdWVyeVNlbGVjdG9yIiwiaW5uZXJIVE1MIiwiaW5pdCIsImRvY3VtZW50Iiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/pages/user-profile/followers.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/pages/user-profile/followers.js"]();
/******/ 	
/******/ })()
;