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

/***/ "./resources/assets/core/js/custom/documentation/charts/flotcharts/axis.js":
/*!*********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/flotcharts/axis.js ***!
  \*********************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTFlotDemoAxis = function () {\n  // Private functions\n  var exampleAxis = function exampleAxis() {\n    function randValue() {\n      return Math.floor(Math.random() * (1 + 40 - 20)) + 20;\n    }\n    var pageviews = [[1, randValue()], [2, randValue()], [3, 2 + randValue()], [4, 3 + randValue()], [5, 5 + randValue()], [6, 10 + randValue()], [7, 15 + randValue()], [8, 20 + randValue()], [9, 25 + randValue()], [10, 30 + randValue()], [11, 35 + randValue()], [12, 25 + randValue()], [13, 15 + randValue()], [14, 20 + randValue()], [15, 45 + randValue()], [16, 50 + randValue()], [17, 65 + randValue()], [18, 70 + randValue()], [19, 85 + randValue()], [20, 80 + randValue()], [21, 75 + randValue()], [22, 80 + randValue()], [23, 75 + randValue()], [24, 70 + randValue()], [25, 65 + randValue()], [26, 75 + randValue()], [27, 80 + randValue()], [28, 85 + randValue()], [29, 90 + randValue()], [30, 95 + randValue()]];\n    var visitors = [[1, randValue() - 5], [2, randValue() - 5], [3, randValue() - 5], [4, 6 + randValue()], [5, 5 + randValue()], [6, 20 + randValue()], [7, 25 + randValue()], [8, 36 + randValue()], [9, 26 + randValue()], [10, 38 + randValue()], [11, 39 + randValue()], [12, 50 + randValue()], [13, 51 + randValue()], [14, 12 + randValue()], [15, 13 + randValue()], [16, 14 + randValue()], [17, 15 + randValue()], [18, 15 + randValue()], [19, 16 + randValue()], [20, 17 + randValue()], [21, 18 + randValue()], [22, 19 + randValue()], [23, 20 + randValue()], [24, 21 + randValue()], [25, 14 + randValue()], [26, 24 + randValue()], [27, 25 + randValue()], [28, 26 + randValue()], [29, 27 + randValue()], [30, 31 + randValue()]];\n    var plot = $.plot($(\"#kt_docs_flot_axis\"), [{\n      data: pageviews,\n      label: \"Unique Visits\",\n      lines: {\n        lineWidth: 1\n      },\n      shadowSize: 0\n    }, {\n      data: visitors,\n      label: \"Page Views\",\n      lines: {\n        lineWidth: 1\n      },\n      shadowSize: 0\n    }], {\n      series: {\n        lines: {\n          show: true,\n          lineWidth: 2,\n          fill: true,\n          fillColor: {\n            colors: [{\n              opacity: 0.05\n            }, {\n              opacity: 0.01\n            }]\n          }\n        },\n        points: {\n          show: true,\n          radius: 3,\n          lineWidth: 1\n        },\n        shadowSize: 2\n      },\n      grid: {\n        hoverable: true,\n        clickable: true,\n        tickColor: KTUtil.getCssVariableValue('--kt-light-dark'),\n        borderColor: KTUtil.getCssVariableValue('--kt-light-dark'),\n        borderWidth: 1\n      },\n      colors: [KTUtil.getCssVariableValue('--kt-active-primary'), KTUtil.getCssVariableValue('--kt-active-danger')],\n      xaxis: {\n        ticks: 11,\n        tickDecimals: 0,\n        tickColor: KTUtil.getCssVariableValue('--kt-active-dark')\n      },\n      yaxis: {\n        ticks: 11,\n        tickDecimals: 0,\n        tickColor: KTUtil.getCssVariableValue('--kt-active-dark')\n      }\n    });\n    function showTooltip(x, y, contents) {\n      $('<div id=\"tooltip\">' + contents + '</div>').css({\n        position: 'absolute',\n        display: 'none',\n        top: y + 5,\n        left: x + 15,\n        border: '1px solid ' + KTUtil.getCssVariableValue('--kt-light-dark'),\n        padding: '4px',\n        color: +KTUtil.getCssVariableValue('--kt-active-dark'),\n        'border-radius': '3px',\n        'background-color': +KTUtil.getCssVariableValue('--kt-light-dark'),\n        opacity: 0.80\n      }).appendTo(\"body\").fadeIn(200);\n    }\n    var previousPoint = null;\n    $(\"#chart_2\").bind(\"plothover\", function (event, pos, item) {\n      $(\"#x\").text(pos.x.toFixed(2));\n      $(\"#y\").text(pos.y.toFixed(2));\n      if (item) {\n        if (previousPoint != item.dataIndex) {\n          previousPoint = item.dataIndex;\n          $(\"#tooltip\").remove();\n          var x = item.datapoint[0].toFixed(2),\n            y = item.datapoint[1].toFixed(2);\n          showTooltip(item.pageX, item.pageY, item.series.label + \" of \" + x + \" = \" + y);\n        }\n      } else {\n        $(\"#tooltip\").remove();\n        previousPoint = null;\n      }\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleAxis();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoAxis.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvYXhpcy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLGNBQWMsR0FBRyxZQUFZO0VBQzdCO0VBQ0EsSUFBSUMsV0FBVyxHQUFHLFNBQWRBLFdBQVdBLENBQUEsRUFBZTtJQUMxQixTQUFTQyxTQUFTQSxDQUFBLEVBQUc7TUFDMUIsT0FBUUMsSUFBSSxDQUFDQyxLQUFLLENBQUNELElBQUksQ0FBQ0UsTUFBTSxDQUFDLENBQUMsSUFBSSxDQUFDLEdBQUcsRUFBRSxHQUFHLEVBQUUsQ0FBQyxDQUFDLEdBQUksRUFBRTtJQUN4RDtJQUNBLElBQUlDLFNBQVMsR0FBRyxDQUNmLENBQUMsQ0FBQyxFQUFFSixTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ2hCLENBQUMsQ0FBQyxFQUFFQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ2hCLENBQUMsQ0FBQyxFQUFFLENBQUMsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUNwQixDQUFDLENBQUMsRUFBRSxDQUFDLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDcEIsQ0FBQyxDQUFDLEVBQUUsQ0FBQyxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3BCLENBQUMsQ0FBQyxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUNyQixDQUFDLENBQUMsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDckIsQ0FBQyxDQUFDLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3JCLENBQUMsQ0FBQyxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUNyQixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxDQUN0QjtJQUNELElBQUlLLFFBQVEsR0FBRyxDQUNkLENBQUMsQ0FBQyxFQUFFTCxTQUFTLENBQUMsQ0FBQyxHQUFHLENBQUMsQ0FBQyxFQUNwQixDQUFDLENBQUMsRUFBRUEsU0FBUyxDQUFDLENBQUMsR0FBRyxDQUFDLENBQUMsRUFDcEIsQ0FBQyxDQUFDLEVBQUVBLFNBQVMsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxDQUFDLEVBQ3BCLENBQUMsQ0FBQyxFQUFFLENBQUMsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUNwQixDQUFDLENBQUMsRUFBRSxDQUFDLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDcEIsQ0FBQyxDQUFDLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3JCLENBQUMsQ0FBQyxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUNyQixDQUFDLENBQUMsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDckIsQ0FBQyxDQUFDLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3JCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLEVBQ3RCLENBQUMsRUFBRSxFQUFFLEVBQUUsR0FBR0EsU0FBUyxDQUFDLENBQUMsQ0FBQyxFQUN0QixDQUFDLEVBQUUsRUFBRSxFQUFFLEdBQUdBLFNBQVMsQ0FBQyxDQUFDLENBQUMsRUFDdEIsQ0FBQyxFQUFFLEVBQUUsRUFBRSxHQUFHQSxTQUFTLENBQUMsQ0FBQyxDQUFDLENBQ3RCO0lBRUQsSUFBSU0sSUFBSSxHQUFHQyxDQUFDLENBQUNELElBQUksQ0FBQ0MsQ0FBQyxDQUFDLG9CQUFvQixDQUFDLEVBQUUsQ0FBQztNQUMzQ0MsSUFBSSxFQUFFSixTQUFTO01BQ2ZLLEtBQUss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Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvYXhpcy5qcz83NWY4Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4vLyBDbGFzcyBkZWZpbml0aW9uXG52YXIgS1RGbG90RGVtb0F4aXMgPSBmdW5jdGlvbiAoKSB7XG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcbiAgICB2YXIgZXhhbXBsZUF4aXMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGZ1bmN0aW9uIHJhbmRWYWx1ZSgpIHtcblx0XHRcdHJldHVybiAoTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogKDEgKyA0MCAtIDIwKSkpICsgMjA7XG5cdFx0fVxuXHRcdHZhciBwYWdldmlld3MgPSBbXG5cdFx0XHRbMSwgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzIsIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFszLCAyICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzQsIDMgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbNSwgNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs2LCAxMCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs3LCAxNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs4LCAyMCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs5LCAyNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxMCwgMzAgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTEsIDM1ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzEyLCAyNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxMywgMTUgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTQsIDIwICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzE1LCA0NSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxNiwgNTAgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTcsIDY1ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzE4LCA3MCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxOSwgODUgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjAsIDgwICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzIxLCA3NSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyMiwgODAgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjMsIDc1ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzI0LCA3MCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyNSwgNjUgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjYsIDc1ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzI3LCA4MCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyOCwgODUgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjksIDkwICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzMwLCA5NSArIHJhbmRWYWx1ZSgpXVxuXHRcdF07XG5cdFx0dmFyIHZpc2l0b3JzID0gW1xuXHRcdFx0WzEsIHJhbmRWYWx1ZSgpIC0gNV0sXG5cdFx0XHRbMiwgcmFuZFZhbHVlKCkgLSA1XSxcblx0XHRcdFszLCByYW5kVmFsdWUoKSAtIDVdLFxuXHRcdFx0WzQsIDYgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbNSwgNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs2LCAyMCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs3LCAyNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs4LCAzNiArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFs5LCAyNiArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxMCwgMzggKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTEsIDM5ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzEyLCA1MCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxMywgNTEgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTQsIDEyICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzE1LCAxMyArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxNiwgMTQgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMTcsIDE1ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzE4LCAxNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsxOSwgMTYgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjAsIDE3ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzIxLCAxOCArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyMiwgMTkgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjMsIDIwICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzI0LCAyMSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyNSwgMTQgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjYsIDI0ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzI3LCAyNSArIHJhbmRWYWx1ZSgpXSxcblx0XHRcdFsyOCwgMjYgKyByYW5kVmFsdWUoKV0sXG5cdFx0XHRbMjksIDI3ICsgcmFuZFZhbHVlKCldLFxuXHRcdFx0WzMwLCAzMSArIHJhbmRWYWx1ZSgpXVxuXHRcdF07XG5cblx0XHR2YXIgcGxvdCA9ICQucGxvdCgkKFwiI2t0X2RvY3NfZmxvdF9heGlzXCIpLCBbe1xuXHRcdFx0ZGF0YTogcGFnZXZpZXdzLFxuXHRcdFx0bGFiZWw6IFwiVW5pcXVlIFZpc2l0c1wiLFxuXHRcdFx0bGluZXM6IHtcblx0XHRcdFx0bGluZVdpZHRoOiAxLFxuXHRcdFx0fSxcblx0XHRcdHNoYWRvd1NpemU6IDBcblxuXHRcdH0sIHtcblx0XHRcdGRhdGE6IHZpc2l0b3JzLFxuXHRcdFx0bGFiZWw6IFwiUGFnZSBWaWV3c1wiLFxuXHRcdFx0bGluZXM6IHtcblx0XHRcdFx0bGluZVdpZHRoOiAxLFxuXHRcdFx0fSxcblx0XHRcdHNoYWRvd1NpemU6IDBcblx0XHR9XSwge1xuXHRcdFx0c2VyaWVzOiB7XG5cdFx0XHRcdGxpbmVzOiB7XG5cdFx0XHRcdFx0c2hvdzogdHJ1ZSxcblx0XHRcdFx0XHRsaW5lV2lkdGg6IDIsXG5cdFx0XHRcdFx0ZmlsbDogdHJ1ZSxcblx0XHRcdFx0XHRmaWxsQ29sb3I6IHtcblx0XHRcdFx0XHRcdGNvbG9yczogW3tcblx0XHRcdFx0XHRcdFx0b3BhY2l0eTogMC4wNVxuXHRcdFx0XHRcdFx0fSwge1xuXHRcdFx0XHRcdFx0XHRvcGFjaXR5OiAwLjAxXG5cdFx0XHRcdFx0XHR9XVxuXHRcdFx0XHRcdH1cblx0XHRcdFx0fSxcblx0XHRcdFx0cG9pbnRzOiB7XG5cdFx0XHRcdFx0c2hvdzogdHJ1ZSxcblx0XHRcdFx0XHRyYWRpdXM6IDMsXG5cdFx0XHRcdFx0bGluZVdpZHRoOiAxXG5cdFx0XHRcdH0sXG5cdFx0XHRcdHNoYWRvd1NpemU6IDJcblx0XHRcdH0sXG5cdFx0XHRncmlkOiB7XG5cdFx0XHRcdGhvdmVyYWJsZTogdHJ1ZSxcblx0XHRcdFx0Y2xpY2thYmxlOiB0cnVlLFxuXHRcdFx0XHR0aWNrQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWt0LWxpZ2h0LWRhcmsnKSxcblx0XHRcdFx0Ym9yZGVyQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWt0LWxpZ2h0LWRhcmsnKSxcblx0XHRcdFx0Ym9yZGVyV2lkdGg6IDFcblx0XHRcdH0sXG5cdFx0XHRjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1hY3RpdmUtcHJpbWFyeScpLCBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1hY3RpdmUtZGFuZ2VyJyldLFxuXHRcdFx0eGF4aXM6IHtcblx0XHRcdFx0dGlja3M6IDExLFxuXHRcdFx0XHR0aWNrRGVjaW1hbHM6IDAsXG5cdFx0XHRcdHRpY2tDb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0ta3QtYWN0aXZlLWRhcmsnKSxcblx0XHRcdH0sXG5cdFx0XHR5YXhpczoge1xuXHRcdFx0XHR0aWNrczogMTEsXG5cdFx0XHRcdHRpY2tEZWNpbWFsczogMCxcblx0XHRcdFx0dGlja0NvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1hY3RpdmUtZGFyaycpLFxuXHRcdFx0fVxuXHRcdH0pO1xuXG5cdFx0ZnVuY3Rpb24gc2hvd1Rvb2x0aXAoeCwgeSwgY29udGVudHMpIHtcblx0XHRcdCQoJzxkaXYgaWQ9XCJ0b29sdGlwXCI+JyArIGNvbnRlbnRzICsgJzwvZGl2PicpLmNzcyh7XG5cdFx0XHRcdHBvc2l0aW9uOiAnYWJzb2x1dGUnLFxuXHRcdFx0XHRkaXNwbGF5OiAnbm9uZScsXG5cdFx0XHRcdHRvcDogeSArIDUsXG5cdFx0XHRcdGxlZnQ6IHggKyAxNSxcblx0XHRcdFx0Ym9yZGVyOiAnMXB4IHNvbGlkICcgKyBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1saWdodC1kYXJrJyksXG5cdFx0XHRcdHBhZGRpbmc6ICc0cHgnLFxuXHRcdFx0XHRjb2xvcjogICsgS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0ta3QtYWN0aXZlLWRhcmsnKSxcblx0XHRcdFx0J2JvcmRlci1yYWRpdXMnOiAnM3B4Jyxcblx0XHRcdFx0J2JhY2tncm91bmQtY29sb3InOiAgKyBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1rdC1saWdodC1kYXJrJyksXG5cdFx0XHRcdG9wYWNpdHk6IDAuODBcblx0XHRcdH0pLmFwcGVuZFRvKFwiYm9keVwiKS5mYWRlSW4oMjAwKTtcblx0XHR9XG5cblx0XHR2YXIgcHJldmlvdXNQb2ludCA9IG51bGw7XG5cdFx0JChcIiNjaGFydF8yXCIpLmJpbmQoXCJwbG90aG92ZXJcIiwgZnVuY3Rpb24oZXZlbnQsIHBvcywgaXRlbSkge1xuXHRcdFx0JChcIiN4XCIpLnRleHQocG9zLngudG9GaXhlZCgyKSk7XG5cdFx0XHQkKFwiI3lcIikudGV4dChwb3MueS50b0ZpeGVkKDIpKTtcblxuXHRcdFx0aWYgKGl0ZW0pIHtcblx0XHRcdFx0aWYgKHByZXZpb3VzUG9pbnQgIT0gaXRlbS5kYXRhSW5kZXgpIHtcblx0XHRcdFx0XHRwcmV2aW91c1BvaW50ID0gaXRlbS5kYXRhSW5kZXg7XG5cblx0XHRcdFx0XHQkKFwiI3Rvb2x0aXBcIikucmVtb3ZlKCk7XG5cdFx0XHRcdFx0dmFyIHggPSBpdGVtLmRhdGFwb2ludFswXS50b0ZpeGVkKDIpLFxuXHRcdFx0XHRcdFx0eSA9IGl0ZW0uZGF0YXBvaW50WzFdLnRvRml4ZWQoMik7XG5cblx0XHRcdFx0XHRzaG93VG9vbHRpcChpdGVtLnBhZ2VYLCBpdGVtLnBhZ2VZLCBpdGVtLnNlcmllcy5sYWJlbCArIFwiIG9mIFwiICsgeCArIFwiID0gXCIgKyB5KTtcblx0XHRcdFx0fVxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0JChcIiN0b29sdGlwXCIpLnJlbW92ZSgpO1xuXHRcdFx0XHRwcmV2aW91c1BvaW50ID0gbnVsbDtcblx0XHRcdH1cblx0XHR9KTtcbiAgICB9XG5cbiAgICByZXR1cm4ge1xuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGV4YW1wbGVBeGlzKCk7XG4gICAgICAgIH1cbiAgICB9O1xufSgpO1xuXG4vLyBPbiBkb2N1bWVudCByZWFkeVxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbiAoKSB7XG4gICAgS1RGbG90RGVtb0F4aXMuaW5pdCgpO1xufSk7XG4iXSwibmFtZXMiOlsiS1RGbG90RGVtb0F4aXMiLCJleGFtcGxlQXhpcyIsInJhbmRWYWx1ZSIsIk1hdGgiLCJmbG9vciIsInJhbmRvbSIsInBhZ2V2aWV3cyIsInZpc2l0b3JzIiwicGxvdCIsIiQiLCJkYXRhIiwibGFiZWwiLCJsaW5lcyIsImxpbmVXaWR0aCIsInNoYWRvd1NpemUiLCJzZXJpZXMiLCJzaG93IiwiZmlsbCIsImZpbGxDb2xvciIsImNvbG9ycyIsIm9wYWNpdHkiLCJwb2ludHMiLCJyYWRpdXMiLCJncmlkIiwiaG92ZXJhYmxlIiwiY2xpY2thYmxlIiwidGlja0NvbG9yIiwiS1RVdGlsIiwiZ2V0Q3NzVmFyaWFibGVWYWx1ZSIsImJvcmRlckNvbG9yIiwiYm9yZGVyV2lkdGgiLCJ4YXhpcyIsInRpY2tzIiwidGlja0RlY2ltYWxzIiwieWF4aXMiLCJzaG93VG9vbHRpcCIsIngiLCJ5IiwiY29udGVudHMiLCJjc3MiLCJwb3NpdGlvbiIsImRpc3BsYXkiLCJ0b3AiLCJsZWZ0IiwiYm9yZGVyIiwicGFkZGluZyIsImNvbG9yIiwiYXBwZW5kVG8iLCJmYWRlSW4iLCJwcmV2aW91c1BvaW50IiwiYmluZCIsImV2ZW50IiwicG9zIiwiaXRlbSIsInRleHQiLCJ0b0ZpeGVkIiwiZGF0YUluZGV4IiwicmVtb3ZlIiwiZGF0YXBvaW50IiwicGFnZVgiLCJwYWdlWSIsImluaXQiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/flotcharts/axis.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/flotcharts/axis.js"]();
/******/ 	
/******/ })()
;