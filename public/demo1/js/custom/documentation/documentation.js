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

/***/ "./resources/assets/core/js/custom/documentation/documentation.js":
/*!************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/documentation.js ***!
  \************************************************************************/
/***/ (() => {

eval("\n\nvar KTLayoutDocumentation = function () {\n  var menuWrapper;\n  var initInstance = function initInstance(element) {\n    var elements = element;\n    if (typeof elements === 'undefined') {\n      elements = document.querySelectorAll('.highlight');\n    }\n    if (elements && elements.length > 0) {\n      for (var i = 0; i < elements.length; ++i) {\n        var highlight = elements[i];\n        var copy = highlight.querySelector('.highlight-copy');\n        if (copy) {\n          var clipboard = new ClipboardJS(copy, {\n            target: function target(trigger) {\n              var highlight = trigger.closest('.highlight');\n              var el = highlight.querySelector('.tab-pane.active');\n              if (el == null) {\n                el = highlight.querySelector('.highlight-code');\n              }\n              return el;\n            }\n          });\n          clipboard.on('success', function (e) {\n            var caption = e.trigger.innerHTML;\n            e.trigger.innerHTML = 'copied';\n            e.clearSelection();\n            setTimeout(function () {\n              e.trigger.innerHTML = caption;\n            }, 2000);\n          });\n        }\n      }\n    }\n  };\n  var handleMenuScroll = function handleMenuScroll() {\n    var menuActiveItem = menuWrapper.querySelector(\".menu-link.active\");\n    if (!menuActiveItem) {\n      return;\n    }\n    if (KTUtil.isVisibleInContainer(menuActiveItem, menuWrapper) === true) {\n      return;\n    }\n    menuWrapper.scroll({\n      top: KTUtil.getRelativeTopPosition(menuActiveItem, menuWrapper),\n      behavior: 'smooth'\n    });\n  };\n  return {\n    init: function init(element) {\n      menuWrapper = document.querySelector('#kt_docs_aside_menu_wrapper');\n      initInstance(element);\n      if (menuWrapper) {\n        handleMenuScroll();\n      }\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTLayoutDocumentation.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZG9jdW1lbnRhdGlvbi5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYixJQUFJQSxxQkFBcUIsR0FBRyxZQUFXO0VBQ25DLElBQUlDLFdBQVc7RUFFZixJQUFJQyxZQUFZLEdBQUcsU0FBZkEsWUFBWUEsQ0FBWUMsT0FBTyxFQUFFO0lBQ2pDLElBQUlDLFFBQVEsR0FBR0QsT0FBTztJQUV0QixJQUFLLE9BQU9DLFFBQVEsS0FBSyxXQUFXLEVBQUc7TUFDbkNBLFFBQVEsR0FBR0MsUUFBUSxDQUFDQyxnQkFBZ0IsQ0FBQyxZQUFZLENBQUM7SUFDdEQ7SUFFQSxJQUFLRixRQUFRLElBQUlBLFFBQVEsQ0FBQ0csTUFBTSxHQUFHLENBQUMsRUFBRztNQUNuQyxLQUFNLElBQUlDLENBQUMsR0FBRyxDQUFDLEVBQUVBLENBQUMsR0FBR0osUUFBUSxDQUFDRyxNQUFNLEVBQUUsRUFBRUMsQ0FBQyxFQUFHO1FBQ3hDLElBQUlDLFNBQVMsR0FBR0wsUUFBUSxDQUFDSSxDQUFDLENBQUM7UUFDM0IsSUFBSUUsSUFBSSxHQUFHRCxTQUFTLENBQUNFLGFBQWEsQ0FBQyxpQkFBaUIsQ0FBQztRQUVyRCxJQUFLRCxJQUFJLEVBQUc7VUFDUixJQUFJRSxTQUFTLEdBQUcsSUFBSUMsV0FBVyxDQUFDSCxJQUFJLEVBQUU7WUFDbENJLE1BQU0sRUFBRSxTQUFBQSxPQUFTQyxPQUFPLEVBQUU7Y0FDdEIsSUFBSU4sU0FBUyxHQUFHTSxPQUFPLENBQUNDLE9BQU8sQ0FBQyxZQUFZLENBQUM7Y0FDN0MsSUFBSUMsRUFBRSxHQUFHUixTQUFTLENBQUNFLGFBQWEsQ0FBQyxrQkFBa0IsQ0FBQztjQUVwRCxJQUFLTSxFQUFFLElBQUksSUFBSSxFQUFHO2dCQUNkQSxFQUFFLEdBQUdSLFNBQVMsQ0FBQ0UsYUFBYSxDQUFDLGlCQUFpQixDQUFDO2NBQ25EO2NBRUEsT0FBT00sRUFBRTtZQUNiO1VBQ0osQ0FBQyxDQUFDO1VBRUZMLFNBQVMsQ0FBQ00sRUFBRSxDQUFDLFNBQVMsRUFBRSxVQUFTQyxDQUFDLEVBQUU7WUFDaEMsSUFBSUMsT0FBTyxHQUFHRCxDQUFDLENBQUNKLE9BQU8sQ0FBQ00sU0FBUztZQUVqQ0YsQ0FBQyxDQUFDSixPQUFPLENBQUNNLFNBQVMsR0FBRyxRQUFRO1lBQzlCRixDQUFDLENBQUNHLGNBQWMsQ0FBQyxDQUFDO1lBRWxCQyxVQUFVLENBQUMsWUFBVztjQUNsQkosQ0FBQyxDQUFDSixPQUFPLENBQUNNLFNBQVMsR0FBR0QsT0FBTztZQUNqQyxDQUFDLEVBQUUsSUFBSSxDQUFDO1VBQ1osQ0FBQyxDQUFDO1FBQ047TUFDSjtJQUNKO0VBQ0osQ0FBQztFQUVELElBQUlJLGdCQUFnQixHQUFHLFNBQW5CQSxnQkFBZ0JBLENBQUEsRUFBYztJQUM5QixJQUFJQyxjQUFjLEdBQUd4QixXQUFXLENBQUNVLGFBQWEsQ0FBQyxtQkFBbUIsQ0FBQztJQUVuRSxJQUFLLENBQUNjLGNBQWMsRUFBRztNQUNuQjtJQUNKO0lBRUEsSUFBS0MsTUFBTSxDQUFDQyxvQkFBb0IsQ0FBQ0YsY0FBYyxFQUFFeEIsV0FBVyxDQUFDLEtBQUssSUFBSSxFQUFFO01BQ3BFO0lBQ0o7SUFFQUEsV0FBVyxDQUFDMkIsTUFBTSxDQUFDO01BQ2ZDLEdBQUcsRUFBRUgsTUFBTSxDQUFDSSxzQkFBc0IsQ0FBQ0wsY0FBYyxFQUFFeEIsV0FBVyxDQUFDO01BQy9EOEIsUUFBUSxFQUFFO0lBQ2QsQ0FBQyxDQUFDO0VBQ04sQ0FBQztFQUVELE9BQU87SUFDSEMsSUFBSSxFQUFFLFNBQUFBLEtBQVM3QixPQUFPLEVBQUU7TUFDcEJGLFdBQVcsR0FBR0ksUUFBUSxDQUFDTSxhQUFhLENBQUMsNkJBQTZCLENBQUM7TUFFbkVULFlBQVksQ0FBQ0MsT0FBTyxDQUFDO01BRXJCLElBQUlGLFdBQVcsRUFBRTtRQUNidUIsZ0JBQWdCLENBQUMsQ0FBQztNQUN0QjtJQUNKO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0FFLE1BQU0sQ0FBQ08sa0JBQWtCLENBQUMsWUFBVztFQUNqQ2pDLHFCQUFxQixDQUFDZ0MsSUFBSSxDQUFDLENBQUM7QUFDaEMsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2RvY3VtZW50YXRpb24uanM/N2U4MiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxudmFyIEtUTGF5b3V0RG9jdW1lbnRhdGlvbiA9IGZ1bmN0aW9uKCkge1xuICAgIHZhciBtZW51V3JhcHBlcjtcblxuICAgIHZhciBpbml0SW5zdGFuY2UgPSBmdW5jdGlvbihlbGVtZW50KSB7XG4gICAgICAgIHZhciBlbGVtZW50cyA9IGVsZW1lbnQ7XG5cbiAgICAgICAgaWYgKCB0eXBlb2YgZWxlbWVudHMgPT09ICd1bmRlZmluZWQnICkge1xuICAgICAgICAgICAgZWxlbWVudHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuaGlnaGxpZ2h0Jyk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoIGVsZW1lbnRzICYmIGVsZW1lbnRzLmxlbmd0aCA+IDAgKSB7XG4gICAgICAgICAgICBmb3IgKCB2YXIgaSA9IDA7IGkgPCBlbGVtZW50cy5sZW5ndGg7ICsraSApIHtcbiAgICAgICAgICAgICAgICB2YXIgaGlnaGxpZ2h0ID0gZWxlbWVudHNbaV07XG4gICAgICAgICAgICAgICAgdmFyIGNvcHkgPSBoaWdobGlnaHQucXVlcnlTZWxlY3RvcignLmhpZ2hsaWdodC1jb3B5Jyk7XG5cbiAgICAgICAgICAgICAgICBpZiAoIGNvcHkgKSB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBjbGlwYm9hcmQgPSBuZXcgQ2xpcGJvYXJkSlMoY29weSwge1xuICAgICAgICAgICAgICAgICAgICAgICAgdGFyZ2V0OiBmdW5jdGlvbih0cmlnZ2VyKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGhpZ2hsaWdodCA9IHRyaWdnZXIuY2xvc2VzdCgnLmhpZ2hsaWdodCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhciBlbCA9IGhpZ2hsaWdodC5xdWVyeVNlbGVjdG9yKCcudGFiLXBhbmUuYWN0aXZlJyk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoIGVsID09IG51bGwgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVsID0gaGlnaGxpZ2h0LnF1ZXJ5U2VsZWN0b3IoJy5oaWdobGlnaHQtY29kZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiBlbDtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgY2xpcGJvYXJkLm9uKCdzdWNjZXNzJywgZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGNhcHRpb24gPSBlLnRyaWdnZXIuaW5uZXJIVE1MO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICBlLnRyaWdnZXIuaW5uZXJIVE1MID0gJ2NvcGllZCc7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLmNsZWFyU2VsZWN0aW9uKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZS50cmlnZ2VyLmlubmVySFRNTCA9IGNhcHRpb247XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCAyMDAwKTtcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfVxuXG4gICAgdmFyIGhhbmRsZU1lbnVTY3JvbGwgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIG1lbnVBY3RpdmVJdGVtID0gbWVudVdyYXBwZXIucXVlcnlTZWxlY3RvcihcIi5tZW51LWxpbmsuYWN0aXZlXCIpO1xuXG4gICAgICAgIGlmICggIW1lbnVBY3RpdmVJdGVtICkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9IFxuXG4gICAgICAgIGlmICggS1RVdGlsLmlzVmlzaWJsZUluQ29udGFpbmVyKG1lbnVBY3RpdmVJdGVtLCBtZW51V3JhcHBlcikgPT09IHRydWUpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIG1lbnVXcmFwcGVyLnNjcm9sbCh7XG4gICAgICAgICAgICB0b3A6IEtUVXRpbC5nZXRSZWxhdGl2ZVRvcFBvc2l0aW9uKG1lbnVBY3RpdmVJdGVtLCBtZW51V3JhcHBlciksXG4gICAgICAgICAgICBiZWhhdmlvcjogJ3Ntb290aCdcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHtcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oZWxlbWVudCkge1xuICAgICAgICAgICAgbWVudVdyYXBwZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfZG9jc19hc2lkZV9tZW51X3dyYXBwZXInKTtcblxuICAgICAgICAgICAgaW5pdEluc3RhbmNlKGVsZW1lbnQpO1xuXG4gICAgICAgICAgICBpZiAobWVudVdyYXBwZXIpIHtcbiAgICAgICAgICAgICAgICBoYW5kbGVNZW51U2Nyb2xsKCk7XG4gICAgICAgICAgICB9ICAgICAgICAgICAgXG4gICAgICAgIH1cbiAgICB9O1xufSgpO1xuXG4vLyBPbiBkb2N1bWVudCByZWFkeVxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcbiAgICBLVExheW91dERvY3VtZW50YXRpb24uaW5pdCgpO1xufSk7Il0sIm5hbWVzIjpbIktUTGF5b3V0RG9jdW1lbnRhdGlvbiIsIm1lbnVXcmFwcGVyIiwiaW5pdEluc3RhbmNlIiwiZWxlbWVudCIsImVsZW1lbnRzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwibGVuZ3RoIiwiaSIsImhpZ2hsaWdodCIsImNvcHkiLCJxdWVyeVNlbGVjdG9yIiwiY2xpcGJvYXJkIiwiQ2xpcGJvYXJkSlMiLCJ0YXJnZXQiLCJ0cmlnZ2VyIiwiY2xvc2VzdCIsImVsIiwib24iLCJlIiwiY2FwdGlvbiIsImlubmVySFRNTCIsImNsZWFyU2VsZWN0aW9uIiwic2V0VGltZW91dCIsImhhbmRsZU1lbnVTY3JvbGwiLCJtZW51QWN0aXZlSXRlbSIsIktUVXRpbCIsImlzVmlzaWJsZUluQ29udGFpbmVyIiwic2Nyb2xsIiwidG9wIiwiZ2V0UmVsYXRpdmVUb3BQb3NpdGlvbiIsImJlaGF2aW9yIiwiaW5pdCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/documentation.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/documentation.js"]();
/******/ 	
/******/ })()
;