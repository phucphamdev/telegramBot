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

/***/ "./resources/assets/core/js/custom/documentation/base/modal.js":
/*!*********************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/base/modal.js ***!
  \*********************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTDocsModal = function () {\n  // Shared variables\n  var element;\n\n  // Private functions\n  var initDraggableModal = function initDraggableModal() {\n    // Make the DIV element draggable:\n    dragElement(element);\n    function dragElement(elmnt) {\n      var pos1 = 0,\n        pos2 = 0,\n        pos3 = 0,\n        pos4 = 0;\n      if (elmnt.querySelector('.modal-content')) {\n        // if present, the modal container is where you move the DIV from:\n        elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;\n      } else {\n        // otherwise, move the DIV from anywhere inside the DIV:\n        elmnt.onmousedown = dragMouseDown;\n      }\n      function dragMouseDown(e) {\n        e = e || window.event;\n        e.preventDefault();\n        // get the mouse cursor position at startup:\n        pos3 = e.clientX;\n        pos4 = e.clientY;\n        document.onmouseup = closeDragElement;\n        // call a function whenever the cursor moves:\n        document.onmousemove = elementDrag;\n      }\n      function elementDrag(e) {\n        e = e || window.event;\n        e.preventDefault();\n        // calculate the new cursor position:\n        pos1 = pos3 - e.clientX;\n        pos2 = pos4 - e.clientY;\n        pos3 = e.clientX;\n        pos4 = e.clientY;\n        // set the element's new position:\n        elmnt.style.top = elmnt.offsetTop - pos2 + \"px\";\n        elmnt.style.left = elmnt.offsetLeft - pos1 + \"px\";\n      }\n      function closeDragElement() {\n        // stop moving when mouse button is released:\n        document.onmouseup = null;\n        document.onmousemove = null;\n      }\n    }\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      // Elements\n      element = document.querySelector('#kt_modal_3');\n      if (!element) {\n        return;\n      }\n      initDraggableModal();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTDocsModal.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vYmFzZS9tb2RhbC5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLFdBQVcsR0FBRyxZQUFZO0VBQzFCO0VBQ0EsSUFBSUMsT0FBTzs7RUFFWDtFQUNBLElBQU1DLGtCQUFrQixHQUFHLFNBQXJCQSxrQkFBa0JBLENBQUEsRUFBUztJQUM3QjtJQUNBQyxXQUFXLENBQUNGLE9BQU8sQ0FBQztJQUVwQixTQUFTRSxXQUFXQSxDQUFDQyxLQUFLLEVBQUU7TUFDeEIsSUFBSUMsSUFBSSxHQUFHLENBQUM7UUFBRUMsSUFBSSxHQUFHLENBQUM7UUFBRUMsSUFBSSxHQUFHLENBQUM7UUFBRUMsSUFBSSxHQUFHLENBQUM7TUFDMUMsSUFBSUosS0FBSyxDQUFDSyxhQUFhLENBQUMsZ0JBQWdCLENBQUMsRUFBRTtRQUN2QztRQUNBTCxLQUFLLENBQUNLLGFBQWEsQ0FBQyxnQkFBZ0IsQ0FBQyxDQUFDQyxXQUFXLEdBQUdDLGFBQWE7TUFDckUsQ0FBQyxNQUFNO1FBQ0g7UUFDQVAsS0FBSyxDQUFDTSxXQUFXLEdBQUdDLGFBQWE7TUFDckM7TUFFQSxTQUFTQSxhQUFhQSxDQUFDQyxDQUFDLEVBQUU7UUFDdEJBLENBQUMsR0FBR0EsQ0FBQyxJQUFJQyxNQUFNLENBQUNDLEtBQUs7UUFDckJGLENBQUMsQ0FBQ0csY0FBYyxDQUFDLENBQUM7UUFDbEI7UUFDQVIsSUFBSSxHQUFHSyxDQUFDLENBQUNJLE9BQU87UUFDaEJSLElBQUksR0FBR0ksQ0FBQyxDQUFDSyxPQUFPO1FBQ2hCQyxRQUFRLENBQUNDLFNBQVMsR0FBR0MsZ0JBQWdCO1FBQ3JDO1FBQ0FGLFFBQVEsQ0FBQ0csV0FBVyxHQUFHQyxXQUFXO01BQ3RDO01BRUEsU0FBU0EsV0FBV0EsQ0FBQ1YsQ0FBQyxFQUFFO1FBQ3BCQSxDQUFDLEdBQUdBLENBQUMsSUFBSUMsTUFBTSxDQUFDQyxLQUFLO1FBQ3JCRixDQUFDLENBQUNHLGNBQWMsQ0FBQyxDQUFDO1FBQ2xCO1FBQ0FWLElBQUksR0FBR0UsSUFBSSxHQUFHSyxDQUFDLENBQUNJLE9BQU87UUFDdkJWLElBQUksR0FBR0UsSUFBSSxHQUFHSSxDQUFDLENBQUNLLE9BQU87UUFDdkJWLElBQUksR0FBR0ssQ0FBQyxDQUFDSSxPQUFPO1FBQ2hCUixJQUFJLEdBQUdJLENBQUMsQ0FBQ0ssT0FBTztRQUNoQjtRQUNBYixLQUFLLENBQUNtQixLQUFLLENBQUNDLEdBQUcsR0FBSXBCLEtBQUssQ0FBQ3FCLFNBQVMsR0FBR25CLElBQUksR0FBSSxJQUFJO1FBQ2pERixLQUFLLENBQUNtQixLQUFLLENBQUNHLElBQUksR0FBSXRCLEtBQUssQ0FBQ3VCLFVBQVUsR0FBR3RCLElBQUksR0FBSSxJQUFJO01BQ3ZEO01BRUEsU0FBU2UsZ0JBQWdCQSxDQUFBLEVBQUc7UUFDeEI7UUFDQUYsUUFBUSxDQUFDQyxTQUFTLEdBQUcsSUFBSTtRQUN6QkQsUUFBUSxDQUFDRyxXQUFXLEdBQUcsSUFBSTtNQUMvQjtJQUNKO0VBQ0osQ0FBQzs7RUFFRDtFQUNBLE9BQU87SUFDSE8sSUFBSSxFQUFFLFNBQUFBLEtBQUEsRUFBWTtNQUNkO01BQ0EzQixPQUFPLEdBQUdpQixRQUFRLENBQUNULGFBQWEsQ0FBQyxhQUFhLENBQUM7TUFFL0MsSUFBSSxDQUFDUixPQUFPLEVBQUU7UUFDVjtNQUNKO01BRUFDLGtCQUFrQixDQUFDLENBQUM7SUFDeEI7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQTJCLE1BQU0sQ0FBQ0Msa0JBQWtCLENBQUMsWUFBWTtFQUNsQzlCLFdBQVcsQ0FBQzRCLElBQUksQ0FBQyxDQUFDO0FBQ3RCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9iYXNlL21vZGFsLmpzPzllMzYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbi8vIENsYXNzIGRlZmluaXRpb25cbnZhciBLVERvY3NNb2RhbCA9IGZ1bmN0aW9uICgpIHtcbiAgICAvLyBTaGFyZWQgdmFyaWFibGVzXG4gICAgdmFyIGVsZW1lbnQ7XG5cbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xuICAgIGNvbnN0IGluaXREcmFnZ2FibGVNb2RhbCA9ICgpID0+IHtcbiAgICAgICAgLy8gTWFrZSB0aGUgRElWIGVsZW1lbnQgZHJhZ2dhYmxlOlxuICAgICAgICBkcmFnRWxlbWVudChlbGVtZW50KTtcblxuICAgICAgICBmdW5jdGlvbiBkcmFnRWxlbWVudChlbG1udCkge1xuICAgICAgICAgICAgdmFyIHBvczEgPSAwLCBwb3MyID0gMCwgcG9zMyA9IDAsIHBvczQgPSAwO1xuICAgICAgICAgICAgaWYgKGVsbW50LnF1ZXJ5U2VsZWN0b3IoJy5tb2RhbC1jb250ZW50JykpIHtcbiAgICAgICAgICAgICAgICAvLyBpZiBwcmVzZW50LCB0aGUgbW9kYWwgY29udGFpbmVyIGlzIHdoZXJlIHlvdSBtb3ZlIHRoZSBESVYgZnJvbTpcbiAgICAgICAgICAgICAgICBlbG1udC5xdWVyeVNlbGVjdG9yKCcubW9kYWwtY29udGVudCcpLm9ubW91c2Vkb3duID0gZHJhZ01vdXNlRG93bjtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgLy8gb3RoZXJ3aXNlLCBtb3ZlIHRoZSBESVYgZnJvbSBhbnl3aGVyZSBpbnNpZGUgdGhlIERJVjpcbiAgICAgICAgICAgICAgICBlbG1udC5vbm1vdXNlZG93biA9IGRyYWdNb3VzZURvd247XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGZ1bmN0aW9uIGRyYWdNb3VzZURvd24oZSkge1xuICAgICAgICAgICAgICAgIGUgPSBlIHx8IHdpbmRvdy5ldmVudDtcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgLy8gZ2V0IHRoZSBtb3VzZSBjdXJzb3IgcG9zaXRpb24gYXQgc3RhcnR1cDpcbiAgICAgICAgICAgICAgICBwb3MzID0gZS5jbGllbnRYO1xuICAgICAgICAgICAgICAgIHBvczQgPSBlLmNsaWVudFk7XG4gICAgICAgICAgICAgICAgZG9jdW1lbnQub25tb3VzZXVwID0gY2xvc2VEcmFnRWxlbWVudDtcbiAgICAgICAgICAgICAgICAvLyBjYWxsIGEgZnVuY3Rpb24gd2hlbmV2ZXIgdGhlIGN1cnNvciBtb3ZlczpcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5vbm1vdXNlbW92ZSA9IGVsZW1lbnREcmFnO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBmdW5jdGlvbiBlbGVtZW50RHJhZyhlKSB7XG4gICAgICAgICAgICAgICAgZSA9IGUgfHwgd2luZG93LmV2ZW50O1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgICAgICAvLyBjYWxjdWxhdGUgdGhlIG5ldyBjdXJzb3IgcG9zaXRpb246XG4gICAgICAgICAgICAgICAgcG9zMSA9IHBvczMgLSBlLmNsaWVudFg7XG4gICAgICAgICAgICAgICAgcG9zMiA9IHBvczQgLSBlLmNsaWVudFk7XG4gICAgICAgICAgICAgICAgcG9zMyA9IGUuY2xpZW50WDtcbiAgICAgICAgICAgICAgICBwb3M0ID0gZS5jbGllbnRZO1xuICAgICAgICAgICAgICAgIC8vIHNldCB0aGUgZWxlbWVudCdzIG5ldyBwb3NpdGlvbjpcbiAgICAgICAgICAgICAgICBlbG1udC5zdHlsZS50b3AgPSAoZWxtbnQub2Zmc2V0VG9wIC0gcG9zMikgKyBcInB4XCI7XG4gICAgICAgICAgICAgICAgZWxtbnQuc3R5bGUubGVmdCA9IChlbG1udC5vZmZzZXRMZWZ0IC0gcG9zMSkgKyBcInB4XCI7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGZ1bmN0aW9uIGNsb3NlRHJhZ0VsZW1lbnQoKSB7XG4gICAgICAgICAgICAgICAgLy8gc3RvcCBtb3Zpbmcgd2hlbiBtb3VzZSBidXR0b24gaXMgcmVsZWFzZWQ6XG4gICAgICAgICAgICAgICAgZG9jdW1lbnQub25tb3VzZXVwID0gbnVsbDtcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5vbm1vdXNlbW92ZSA9IG51bGw7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvLyBQdWJsaWMgbWV0aG9kc1xuICAgIHJldHVybiB7XG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIC8vIEVsZW1lbnRzXG4gICAgICAgICAgICBlbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X21vZGFsXzMnKTtcblxuICAgICAgICAgICAgaWYgKCFlbGVtZW50KSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBpbml0RHJhZ2dhYmxlTW9kYWwoKTtcbiAgICAgICAgfVxuICAgIH07XG59KCk7XG5cbi8vIE9uIGRvY3VtZW50IHJlYWR5XG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcbiAgICBLVERvY3NNb2RhbC5pbml0KCk7XG59KTtcbiJdLCJuYW1lcyI6WyJLVERvY3NNb2RhbCIsImVsZW1lbnQiLCJpbml0RHJhZ2dhYmxlTW9kYWwiLCJkcmFnRWxlbWVudCIsImVsbW50IiwicG9zMSIsInBvczIiLCJwb3MzIiwicG9zNCIsInF1ZXJ5U2VsZWN0b3IiLCJvbm1vdXNlZG93biIsImRyYWdNb3VzZURvd24iLCJlIiwid2luZG93IiwiZXZlbnQiLCJwcmV2ZW50RGVmYXVsdCIsImNsaWVudFgiLCJjbGllbnRZIiwiZG9jdW1lbnQiLCJvbm1vdXNldXAiLCJjbG9zZURyYWdFbGVtZW50Iiwib25tb3VzZW1vdmUiLCJlbGVtZW50RHJhZyIsInN0eWxlIiwidG9wIiwib2Zmc2V0VG9wIiwibGVmdCIsIm9mZnNldExlZnQiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/base/modal.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/base/modal.js"]();
/******/ 	
/******/ })()
;