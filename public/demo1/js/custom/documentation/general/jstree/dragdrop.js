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

/***/ "./resources/assets/core/js/custom/documentation/general/jstree/dragdrop.js":
/*!**********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/jstree/dragdrop.js ***!
  \**********************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTJSTreeDragDrop = function () {\n  // Private functions\n  var exampleDragDrop = function exampleDragDrop() {\n    $(\"#kt_docs_jstree_dragdrop\").jstree({\n      \"core\": {\n        \"themes\": {\n          \"responsive\": false\n        },\n        // so that create works\n        \"check_callback\": true,\n        'data': [{\n          \"text\": \"Parent Node\",\n          \"children\": [{\n            \"text\": \"Initially selected\",\n            \"state\": {\n              \"selected\": true\n            }\n          }, {\n            \"text\": \"Custom Icon\",\n            \"icon\": \"fonticon-bookmark text-danger fs-5\"\n          }, {\n            \"text\": \"Initially open\",\n            \"icon\": \"fa fa-folder text-success\",\n            \"state\": {\n              \"opened\": true\n            },\n            \"children\": [{\n              \"text\": \"Another node\",\n              \"icon\": \"fa fa-file text-waring\"\n            }]\n          }, {\n            \"text\": \"Another Custom Icon\",\n            \"icon\": \"fonticon-attachments text-warning fs-6\"\n          }, {\n            \"text\": \"Disabled Node\",\n            \"icon\": \"fa fa-check text-success\",\n            \"state\": {\n              \"disabled\": true\n            }\n          }, {\n            \"text\": \"Sub Nodes\",\n            \"icon\": \"fa fa-folder text-danger\",\n            \"children\": [{\n              \"text\": \"Item 1\",\n              \"icon\": \"fa fa-file text-waring\"\n            }, {\n              \"text\": \"Item 2\",\n              \"icon\": \"fa fa-file text-success\"\n            }, {\n              \"text\": \"Item 3\",\n              \"icon\": \"fa fa-file text-default\"\n            }, {\n              \"text\": \"Item 4\",\n              \"icon\": \"fa fa-file text-danger\"\n            }, {\n              \"text\": \"Item 5\",\n              \"icon\": \"fa fa-file text-info\"\n            }]\n          }]\n        }, \"Another Node\"]\n      },\n      \"types\": {\n        \"default\": {\n          \"icon\": \"fa fa-folder text-success\"\n        },\n        \"file\": {\n          \"icon\": \"fa fa-file  text-success\"\n        }\n      },\n      \"state\": {\n        \"key\": \"demo2\"\n      },\n      \"plugins\": [\"dnd\", \"state\", \"types\"]\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleDragDrop();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTJSTreeDragDrop.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9qc3RyZWUvZHJhZ2Ryb3AuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxnQkFBZ0IsR0FBRyxZQUFXO0VBQzlCO0VBQ0EsSUFBSUMsZUFBZSxHQUFHLFNBQWxCQSxlQUFlQSxDQUFBLEVBQWM7SUFDN0JDLENBQUMsQ0FBQywwQkFBMEIsQ0FBQyxDQUFDQyxNQUFNLENBQUM7TUFDakMsTUFBTSxFQUFHO1FBQ0wsUUFBUSxFQUFHO1VBQ1AsWUFBWSxFQUFFO1FBQ2xCLENBQUM7UUFDRDtRQUNBLGdCQUFnQixFQUFHLElBQUk7UUFDdkIsTUFBTSxFQUFFLENBQUM7VUFDRCxNQUFNLEVBQUUsYUFBYTtVQUNyQixVQUFVLEVBQUUsQ0FBQztZQUNULE1BQU0sRUFBRSxvQkFBb0I7WUFDNUIsT0FBTyxFQUFFO2NBQ0wsVUFBVSxFQUFFO1lBQ2hCO1VBQ0osQ0FBQyxFQUFFO1lBQ0MsTUFBTSxFQUFFLGFBQWE7WUFDckIsTUFBTSxFQUFFO1VBQ1osQ0FBQyxFQUFFO1lBQ0MsTUFBTSxFQUFFLGdCQUFnQjtZQUN4QixNQUFNLEVBQUcsMkJBQTJCO1lBQ3BDLE9BQU8sRUFBRTtjQUNMLFFBQVEsRUFBRTtZQUNkLENBQUM7WUFDRCxVQUFVLEVBQUUsQ0FDUjtjQUFDLE1BQU0sRUFBRSxjQUFjO2NBQUUsTUFBTSxFQUFHO1lBQXdCLENBQUM7VUFFbkUsQ0FBQyxFQUFFO1lBQ0MsTUFBTSxFQUFFLHFCQUFxQjtZQUM3QixNQUFNLEVBQUU7VUFDWixDQUFDLEVBQUU7WUFDQyxNQUFNLEVBQUUsZUFBZTtZQUN2QixNQUFNLEVBQUUsMEJBQTBCO1lBQ2xDLE9BQU8sRUFBRTtjQUNMLFVBQVUsRUFBRTtZQUNoQjtVQUNKLENBQUMsRUFBRTtZQUNDLE1BQU0sRUFBRSxXQUFXO1lBQ25CLE1BQU0sRUFBRSwwQkFBMEI7WUFDbEMsVUFBVSxFQUFFLENBQ1I7Y0FBQyxNQUFNLEVBQUUsUUFBUTtjQUFFLE1BQU0sRUFBRztZQUF3QixDQUFDLEVBQ3JEO2NBQUMsTUFBTSxFQUFFLFFBQVE7Y0FBRSxNQUFNLEVBQUc7WUFBeUIsQ0FBQyxFQUN0RDtjQUFDLE1BQU0sRUFBRSxRQUFRO2NBQUUsTUFBTSxFQUFHO1lBQXlCLENBQUMsRUFDdEQ7Y0FBQyxNQUFNLEVBQUUsUUFBUTtjQUFFLE1BQU0sRUFBRztZQUF3QixDQUFDLEVBQ3JEO2NBQUMsTUFBTSxFQUFFLFFBQVE7Y0FBRSxNQUFNLEVBQUc7WUFBc0IsQ0FBQztVQUUzRCxDQUFDO1FBQ0wsQ0FBQyxFQUNELGNBQWM7TUFFdEIsQ0FBQztNQUNELE9BQU8sRUFBRztRQUNOLFNBQVMsRUFBRztVQUNSLE1BQU0sRUFBRztRQUNiLENBQUM7UUFDRCxNQUFNLEVBQUc7VUFDTCxNQUFNLEVBQUc7UUFDYjtNQUNKLENBQUM7TUFDRCxPQUFPLEVBQUc7UUFBRSxLQUFLLEVBQUc7TUFBUSxDQUFDO01BQzdCLFNBQVMsRUFBRyxDQUFFLEtBQUssRUFBRSxPQUFPLEVBQUUsT0FBTztJQUN6QyxDQUFDLENBQUM7RUFDTixDQUFDO0VBRUQsT0FBTztJQUNIO0lBQ0FDLElBQUksRUFBRSxTQUFBQSxLQUFBLEVBQVc7TUFDYkgsZUFBZSxDQUFDLENBQUM7SUFDckI7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQUksTUFBTSxDQUFDQyxrQkFBa0IsQ0FBQyxZQUFXO0VBQ2pDTixnQkFBZ0IsQ0FBQ0ksSUFBSSxDQUFDLENBQUM7QUFDM0IsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvanN0cmVlL2RyYWdkcm9wLmpzP2E5MzUiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbi8vIENsYXNzIGRlZmluaXRpb25cbnZhciBLVEpTVHJlZURyYWdEcm9wID0gZnVuY3Rpb24oKSB7XG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcbiAgICB2YXIgZXhhbXBsZURyYWdEcm9wID0gZnVuY3Rpb24oKSB7XG4gICAgICAgICQoXCIja3RfZG9jc19qc3RyZWVfZHJhZ2Ryb3BcIikuanN0cmVlKHtcbiAgICAgICAgICAgIFwiY29yZVwiIDoge1xuICAgICAgICAgICAgICAgIFwidGhlbWVzXCIgOiB7XG4gICAgICAgICAgICAgICAgICAgIFwicmVzcG9uc2l2ZVwiOiBmYWxzZVxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgLy8gc28gdGhhdCBjcmVhdGUgd29ya3NcbiAgICAgICAgICAgICAgICBcImNoZWNrX2NhbGxiYWNrXCIgOiB0cnVlLFxuICAgICAgICAgICAgICAgICdkYXRhJzogW3tcbiAgICAgICAgICAgICAgICAgICAgICAgIFwidGV4dFwiOiBcIlBhcmVudCBOb2RlXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICBcImNoaWxkcmVuXCI6IFt7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiSW5pdGlhbGx5IHNlbGVjdGVkXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJzdGF0ZVwiOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwic2VsZWN0ZWRcIjogdHJ1ZVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInRleHRcIjogXCJDdXN0b20gSWNvblwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiaWNvblwiOiBcImZvbnRpY29uLWJvb2ttYXJrIHRleHQtZGFuZ2VyIGZzLTVcIlxuICAgICAgICAgICAgICAgICAgICAgICAgfSwge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwidGV4dFwiOiBcIkluaXRpYWxseSBvcGVuXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJpY29uXCIgOiBcImZhIGZhLWZvbGRlciB0ZXh0LXN1Y2Nlc3NcIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInN0YXRlXCI6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJvcGVuZWRcIjogdHJ1ZVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJjaGlsZHJlblwiOiBbXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtcInRleHRcIjogXCJBbm90aGVyIG5vZGVcIiwgXCJpY29uXCIgOiBcImZhIGZhLWZpbGUgdGV4dC13YXJpbmdcIn1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICAgICAgICAgICAgICB9LCB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiQW5vdGhlciBDdXN0b20gSWNvblwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiaWNvblwiOiBcImZvbnRpY29uLWF0dGFjaG1lbnRzIHRleHQtd2FybmluZyBmcy02XCJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInRleHRcIjogXCJEaXNhYmxlZCBOb2RlXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJpY29uXCI6IFwiZmEgZmEtY2hlY2sgdGV4dC1zdWNjZXNzXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJzdGF0ZVwiOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiZGlzYWJsZWRcIjogdHJ1ZVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInRleHRcIjogXCJTdWIgTm9kZXNcIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcImljb25cIjogXCJmYSBmYS1mb2xkZXIgdGV4dC1kYW5nZXJcIixcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcImNoaWxkcmVuXCI6IFtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge1widGV4dFwiOiBcIkl0ZW0gMVwiLCBcImljb25cIiA6IFwiZmEgZmEtZmlsZSB0ZXh0LXdhcmluZ1wifSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge1widGV4dFwiOiBcIkl0ZW0gMlwiLCBcImljb25cIiA6IFwiZmEgZmEtZmlsZSB0ZXh0LXN1Y2Nlc3NcIn0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtcInRleHRcIjogXCJJdGVtIDNcIiwgXCJpY29uXCIgOiBcImZhIGZhLWZpbGUgdGV4dC1kZWZhdWx0XCJ9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7XCJ0ZXh0XCI6IFwiSXRlbSA0XCIsIFwiaWNvblwiIDogXCJmYSBmYS1maWxlIHRleHQtZGFuZ2VyXCJ9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7XCJ0ZXh0XCI6IFwiSXRlbSA1XCIsIFwiaWNvblwiIDogXCJmYSBmYS1maWxlIHRleHQtaW5mb1wifVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF1cbiAgICAgICAgICAgICAgICAgICAgICAgIH1dXG4gICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgIFwiQW5vdGhlciBOb2RlXCJcbiAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgXCJ0eXBlc1wiIDoge1xuICAgICAgICAgICAgICAgIFwiZGVmYXVsdFwiIDoge1xuICAgICAgICAgICAgICAgICAgICBcImljb25cIiA6IFwiZmEgZmEtZm9sZGVyIHRleHQtc3VjY2Vzc1wiXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBcImZpbGVcIiA6IHtcbiAgICAgICAgICAgICAgICAgICAgXCJpY29uXCIgOiBcImZhIGZhLWZpbGUgIHRleHQtc3VjY2Vzc1wiXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIFwic3RhdGVcIiA6IHsgXCJrZXlcIiA6IFwiZGVtbzJcIiB9LFxuICAgICAgICAgICAgXCJwbHVnaW5zXCIgOiBbIFwiZG5kXCIsIFwic3RhdGVcIiwgXCJ0eXBlc1wiIF1cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHtcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGV4YW1wbGVEcmFnRHJvcCgpO1xuICAgICAgICB9XG4gICAgfTtcbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XG4gICAgS1RKU1RyZWVEcmFnRHJvcC5pbml0KCk7XG59KTtcbiJdLCJuYW1lcyI6WyJLVEpTVHJlZURyYWdEcm9wIiwiZXhhbXBsZURyYWdEcm9wIiwiJCIsImpzdHJlZSIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/jstree/dragdrop.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/jstree/dragdrop.js"]();
/******/ 	
/******/ })()
;