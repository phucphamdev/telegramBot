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

/***/ "./resources/assets/core/js/custom/documentation/charts/google-charts/column.js":
/*!**************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/google-charts/column.js ***!
  \**************************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTGoogleChartColumnDemo = function () {\n  // Private functions\n  var exampleColumn = function exampleColumn() {\n    // GOOGLE CHARTS INIT\n    google.load('visualization', '1', {\n      packages: ['corechart', 'bar', 'line']\n    });\n    google.setOnLoadCallback(function () {\n      // COLUMN CHART\n      var data = new google.visualization.DataTable();\n      data.addColumn('timeofday', 'Time of Day');\n      data.addColumn('number', 'Motivation Level');\n      data.addColumn('number', 'Energy Level');\n      data.addRows([[{\n        v: [8, 0, 0],\n        f: '8 am'\n      }, 1, .25], [{\n        v: [9, 0, 0],\n        f: '9 am'\n      }, 2, .5], [{\n        v: [10, 0, 0],\n        f: '10 am'\n      }, 3, 1], [{\n        v: [11, 0, 0],\n        f: '11 am'\n      }, 4, 2.25], [{\n        v: [12, 0, 0],\n        f: '12 pm'\n      }, 5, 2.25], [{\n        v: [13, 0, 0],\n        f: '1 pm'\n      }, 6, 3], [{\n        v: [14, 0, 0],\n        f: '2 pm'\n      }, 7, 4], [{\n        v: [15, 0, 0],\n        f: '3 pm'\n      }, 8, 5.25], [{\n        v: [16, 0, 0],\n        f: '4 pm'\n      }, 9, 7.5], [{\n        v: [17, 0, 0],\n        f: '5 pm'\n      }, 10, 10]]);\n      var options = {\n        title: 'Motivation and Energy Level Throughout the Day',\n        focusTarget: 'category',\n        hAxis: {\n          title: 'Time of Day',\n          format: 'h:mm a',\n          viewWindow: {\n            min: [7, 30, 0],\n            max: [17, 30, 0]\n          }\n        },\n        vAxis: {\n          title: 'Rating (scale of 1-10)'\n        },\n        colors: ['#6e4ff5', '#fe3995']\n      };\n      var chart = new google.visualization.ColumnChart(document.getElementById('kt_docs_google_chart_column'));\n      chart.draw(data, options);\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleColumn();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTGoogleChartColumnDemo.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2dvb2dsZS1jaGFydHMvY29sdW1uLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsdUJBQXVCLEdBQUcsWUFBWTtFQUN0QztFQUNBLElBQUlDLGFBQWEsR0FBRyxTQUFoQkEsYUFBYUEsQ0FBQSxFQUFlO0lBQzVCO0lBQ0FDLE1BQU0sQ0FBQ0MsSUFBSSxDQUFDLGVBQWUsRUFBRSxHQUFHLEVBQUU7TUFDOUJDLFFBQVEsRUFBRSxDQUFDLFdBQVcsRUFBRSxLQUFLLEVBQUUsTUFBTTtJQUN6QyxDQUFDLENBQUM7SUFFRkYsTUFBTSxDQUFDRyxpQkFBaUIsQ0FBQyxZQUFZO01BQ2pDO01BQ0EsSUFBSUMsSUFBSSxHQUFHLElBQUlKLE1BQU0sQ0FBQ0ssYUFBYSxDQUFDQyxTQUFTLENBQUMsQ0FBQztNQUMvQ0YsSUFBSSxDQUFDRyxTQUFTLENBQUMsV0FBVyxFQUFFLGFBQWEsQ0FBQztNQUMxQ0gsSUFBSSxDQUFDRyxTQUFTLENBQUMsUUFBUSxFQUFFLGtCQUFrQixDQUFDO01BQzVDSCxJQUFJLENBQUNHLFNBQVMsQ0FBQyxRQUFRLEVBQUUsY0FBYyxDQUFDO01BRXhDSCxJQUFJLENBQUNJLE9BQU8sQ0FBQyxDQUNULENBQUM7UUFDR0MsQ0FBQyxFQUFFLENBQUMsQ0FBQyxFQUFFLENBQUMsRUFBRSxDQUFDLENBQUM7UUFDWkMsQ0FBQyxFQUFFO01BQ1AsQ0FBQyxFQUFFLENBQUMsRUFBRSxHQUFHLENBQUMsRUFDVixDQUFDO1FBQ0dELENBQUMsRUFBRSxDQUFDLENBQUMsRUFBRSxDQUFDLEVBQUUsQ0FBQyxDQUFDO1FBQ1pDLENBQUMsRUFBRTtNQUNQLENBQUMsRUFBRSxDQUFDLEVBQUUsRUFBRSxDQUFDLEVBQ1QsQ0FBQztRQUNHRCxDQUFDLEVBQUUsQ0FBQyxFQUFFLEVBQUUsQ0FBQyxFQUFFLENBQUMsQ0FBQztRQUNiQyxDQUFDLEVBQUU7TUFDUCxDQUFDLEVBQUUsQ0FBQyxFQUFFLENBQUMsQ0FBQyxFQUNSLENBQUM7UUFDR0QsQ0FBQyxFQUFFLENBQUMsRUFBRSxFQUFFLENBQUMsRUFBRSxDQUFDLENBQUM7UUFDYkMsQ0FBQyxFQUFFO01BQ1AsQ0FBQyxFQUFFLENBQUMsRUFBRSxJQUFJLENBQUMsRUFDWCxDQUFDO1FBQ0dELENBQUMsRUFBRSxDQUFDLEVBQUUsRUFBRSxDQUFDLEVBQUUsQ0FBQyxDQUFDO1FBQ2JDLENBQUMsRUFBRTtNQUNQLENBQUMsRUFBRSxDQUFDLEVBQUUsSUFBSSxDQUFDLEVBQ1gsQ0FBQztRQUNHRCxDQUFDLEVBQUUsQ0FBQyxFQUFFLEVBQUUsQ0FBQyxFQUFFLENBQUMsQ0FBQztRQUNiQyxDQUFDLEVBQUU7TUFDUCxDQUFDLEVBQUUsQ0FBQyxFQUFFLENBQUMsQ0FBQyxFQUNSLENBQUM7UUFDR0QsQ0FBQyxFQUFFLENBQUMsRUFBRSxFQUFFLENBQUMsRUFBRSxDQUFDLENBQUM7UUFDYkMsQ0FBQyxFQUFFO01BQ1AsQ0FBQyxFQUFFLENBQUMsRUFBRSxDQUFDLENBQUMsRUFDUixDQUFDO1FBQ0dELENBQUMsRUFBRSxDQUFDLEVBQUUsRUFBRSxDQUFDLEVBQUUsQ0FBQyxDQUFDO1FBQ2JDLENBQUMsRUFBRTtNQUNQLENBQUMsRUFBRSxDQUFDLEVBQUUsSUFBSSxDQUFDLEVBQ1gsQ0FBQztRQUNHRCxDQUFDLEVBQUUsQ0FBQyxFQUFFLEVBQUUsQ0FBQyxFQUFFLENBQUMsQ0FBQztRQUNiQyxDQUFDLEVBQUU7TUFDUCxDQUFDLEVBQUUsQ0FBQyxFQUFFLEdBQUcsQ0FBQyxFQUNWLENBQUM7UUFDR0QsQ0FBQyxFQUFFLENBQUMsRUFBRSxFQUFFLENBQUMsRUFBRSxDQUFDLENBQUM7UUFDYkMsQ0FBQyxFQUFFO01BQ1AsQ0FBQyxFQUFFLEVBQUUsRUFBRSxFQUFFLENBQUMsQ0FDYixDQUFDO01BRUYsSUFBSUMsT0FBTyxHQUFHO1FBQ1ZDLEtBQUssRUFBRSxnREFBZ0Q7UUFDdkRDLFdBQVcsRUFBRSxVQUFVO1FBQ3ZCQyxLQUFLLEVBQUU7VUFDSEYsS0FBSyxFQUFFLGFBQWE7VUFDcEJHLE1BQU0sRUFBRSxRQUFRO1VBQ2hCQyxVQUFVLEVBQUU7WUFDUkMsR0FBRyxFQUFFLENBQUMsQ0FBQyxFQUFFLEVBQUUsRUFBRSxDQUFDLENBQUM7WUFDZkMsR0FBRyxFQUFFLENBQUMsRUFBRSxFQUFFLEVBQUUsRUFBRSxDQUFDO1VBQ25CO1FBQ0osQ0FBQztRQUNEQyxLQUFLLEVBQUU7VUFDSFAsS0FBSyxFQUFFO1FBQ1gsQ0FBQztRQUNEUSxNQUFNLEVBQUUsQ0FBQyxTQUFTLEVBQUUsU0FBUztNQUNqQyxDQUFDO01BRUQsSUFBSUMsS0FBSyxHQUFHLElBQUlyQixNQUFNLENBQUNLLGFBQWEsQ0FBQ2lCLFdBQVcsQ0FBQ0MsUUFBUSxDQUFDQyxjQUFjLENBQUMsNkJBQTZCLENBQUMsQ0FBQztNQUN4R0gsS0FBSyxDQUFDSSxJQUFJLENBQUNyQixJQUFJLEVBQUVPLE9BQU8sQ0FBQztJQUM3QixDQUFDLENBQUM7RUFDTixDQUFDO0VBRUQsT0FBTztJQUNIO0lBQ0FlLElBQUksRUFBRSxTQUFBQSxLQUFBLEVBQVk7TUFDZDNCLGFBQWEsQ0FBQyxDQUFDO0lBQ25CO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0E0QixNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVk7RUFDbEM5Qix1QkFBdUIsQ0FBQzRCLElBQUksQ0FBQyxDQUFDO0FBQ2xDLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9jaGFydHMvZ29vZ2xlLWNoYXJ0cy9jb2x1bW4uanM/MGQxYyJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcblxuLy8gQ2xhc3MgZGVmaW5pdGlvblxudmFyIEtUR29vZ2xlQ2hhcnRDb2x1bW5EZW1vID0gZnVuY3Rpb24gKCkge1xuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXG4gICAgdmFyIGV4YW1wbGVDb2x1bW4gPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIC8vIEdPT0dMRSBDSEFSVFMgSU5JVFxuICAgICAgICBnb29nbGUubG9hZCgndmlzdWFsaXphdGlvbicsICcxJywge1xuICAgICAgICAgICAgcGFja2FnZXM6IFsnY29yZWNoYXJ0JywgJ2JhcicsICdsaW5lJ11cbiAgICAgICAgfSk7XG5cbiAgICAgICAgZ29vZ2xlLnNldE9uTG9hZENhbGxiYWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIC8vIENPTFVNTiBDSEFSVFxuICAgICAgICAgICAgdmFyIGRhdGEgPSBuZXcgZ29vZ2xlLnZpc3VhbGl6YXRpb24uRGF0YVRhYmxlKCk7XG4gICAgICAgICAgICBkYXRhLmFkZENvbHVtbigndGltZW9mZGF5JywgJ1RpbWUgb2YgRGF5Jyk7XG4gICAgICAgICAgICBkYXRhLmFkZENvbHVtbignbnVtYmVyJywgJ01vdGl2YXRpb24gTGV2ZWwnKTtcbiAgICAgICAgICAgIGRhdGEuYWRkQ29sdW1uKCdudW1iZXInLCAnRW5lcmd5IExldmVsJyk7XG5cbiAgICAgICAgICAgIGRhdGEuYWRkUm93cyhbXG4gICAgICAgICAgICAgICAgW3tcbiAgICAgICAgICAgICAgICAgICAgdjogWzgsIDAsIDBdLFxuICAgICAgICAgICAgICAgICAgICBmOiAnOCBhbSdcbiAgICAgICAgICAgICAgICB9LCAxLCAuMjVdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFs5LCAwLCAwXSxcbiAgICAgICAgICAgICAgICAgICAgZjogJzkgYW0nXG4gICAgICAgICAgICAgICAgfSwgMiwgLjVdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFsxMCwgMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgIGY6ICcxMCBhbSdcbiAgICAgICAgICAgICAgICB9LCAzLCAxXSxcbiAgICAgICAgICAgICAgICBbe1xuICAgICAgICAgICAgICAgICAgICB2OiBbMTEsIDAsIDBdLFxuICAgICAgICAgICAgICAgICAgICBmOiAnMTEgYW0nXG4gICAgICAgICAgICAgICAgfSwgNCwgMi4yNV0sXG4gICAgICAgICAgICAgICAgW3tcbiAgICAgICAgICAgICAgICAgICAgdjogWzEyLCAwLCAwXSxcbiAgICAgICAgICAgICAgICAgICAgZjogJzEyIHBtJ1xuICAgICAgICAgICAgICAgIH0sIDUsIDIuMjVdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFsxMywgMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgIGY6ICcxIHBtJ1xuICAgICAgICAgICAgICAgIH0sIDYsIDNdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFsxNCwgMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgIGY6ICcyIHBtJ1xuICAgICAgICAgICAgICAgIH0sIDcsIDRdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFsxNSwgMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgIGY6ICczIHBtJ1xuICAgICAgICAgICAgICAgIH0sIDgsIDUuMjVdLFxuICAgICAgICAgICAgICAgIFt7XG4gICAgICAgICAgICAgICAgICAgIHY6IFsxNiwgMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgIGY6ICc0IHBtJ1xuICAgICAgICAgICAgICAgIH0sIDksIDcuNV0sXG4gICAgICAgICAgICAgICAgW3tcbiAgICAgICAgICAgICAgICAgICAgdjogWzE3LCAwLCAwXSxcbiAgICAgICAgICAgICAgICAgICAgZjogJzUgcG0nXG4gICAgICAgICAgICAgICAgfSwgMTAsIDEwXSxcbiAgICAgICAgICAgIF0pO1xuXG4gICAgICAgICAgICB2YXIgb3B0aW9ucyA9IHtcbiAgICAgICAgICAgICAgICB0aXRsZTogJ01vdGl2YXRpb24gYW5kIEVuZXJneSBMZXZlbCBUaHJvdWdob3V0IHRoZSBEYXknLFxuICAgICAgICAgICAgICAgIGZvY3VzVGFyZ2V0OiAnY2F0ZWdvcnknLFxuICAgICAgICAgICAgICAgIGhBeGlzOiB7XG4gICAgICAgICAgICAgICAgICAgIHRpdGxlOiAnVGltZSBvZiBEYXknLFxuICAgICAgICAgICAgICAgICAgICBmb3JtYXQ6ICdoOm1tIGEnLFxuICAgICAgICAgICAgICAgICAgICB2aWV3V2luZG93OiB7XG4gICAgICAgICAgICAgICAgICAgICAgICBtaW46IFs3LCAzMCwgMF0sXG4gICAgICAgICAgICAgICAgICAgICAgICBtYXg6IFsxNywgMzAsIDBdXG4gICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICB2QXhpczoge1xuICAgICAgICAgICAgICAgICAgICB0aXRsZTogJ1JhdGluZyAoc2NhbGUgb2YgMS0xMCknXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBjb2xvcnM6IFsnIzZlNGZmNScsICcjZmUzOTk1J11cbiAgICAgICAgICAgIH07XG5cbiAgICAgICAgICAgIHZhciBjaGFydCA9IG5ldyBnb29nbGUudmlzdWFsaXphdGlvbi5Db2x1bW5DaGFydChkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3RfZG9jc19nb29nbGVfY2hhcnRfY29sdW1uJykpO1xuICAgICAgICAgICAgY2hhcnQuZHJhdyhkYXRhLCBvcHRpb25zKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHtcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBleGFtcGxlQ29sdW1uKCk7XG4gICAgICAgIH1cbiAgICB9O1xufSgpO1xuXG4vLyBPbiBkb2N1bWVudCByZWFkeVxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbiAoKSB7XG4gICAgS1RHb29nbGVDaGFydENvbHVtbkRlbW8uaW5pdCgpO1xufSk7XG4iXSwibmFtZXMiOlsiS1RHb29nbGVDaGFydENvbHVtbkRlbW8iLCJleGFtcGxlQ29sdW1uIiwiZ29vZ2xlIiwibG9hZCIsInBhY2thZ2VzIiwic2V0T25Mb2FkQ2FsbGJhY2siLCJkYXRhIiwidmlzdWFsaXphdGlvbiIsIkRhdGFUYWJsZSIsImFkZENvbHVtbiIsImFkZFJvd3MiLCJ2IiwiZiIsIm9wdGlvbnMiLCJ0aXRsZSIsImZvY3VzVGFyZ2V0IiwiaEF4aXMiLCJmb3JtYXQiLCJ2aWV3V2luZG93IiwibWluIiwibWF4IiwidkF4aXMiLCJjb2xvcnMiLCJjaGFydCIsIkNvbHVtbkNoYXJ0IiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImRyYXciLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/google-charts/column.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/google-charts/column.js"]();
/******/ 	
/******/ })()
;