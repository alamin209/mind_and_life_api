/******/
(function (modules) { // webpackBootstrap
    /******/ 	// The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ 	// The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ 		// Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ 		// Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/            i: moduleId,
            /******/            l: false,
            /******/            exports: {}
            /******/
        };
        /******/
        /******/ 		// Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ 		// Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ 		// Return the exports of the module
        /******/
        return module.exports;
        /******/
    }

    /******/
    /******/
    /******/ 	// expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ 	// expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ 	// define getter function for harmony exports
    /******/
    __webpack_require__.d = function (exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {enumerable: true, get: getter});
            /******/
        }
        /******/
    };
    /******/
    /******/ 	// define __esModule on exports
    /******/
    __webpack_require__.r = function (exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {value: 'Module'});
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', {value: true});
        /******/
    };
    /******/
    /******/ 	// create a fake namespace object
    /******/ 	// mode & 1: value is a module id, require it
    /******/ 	// mode & 2: merge all properties of value into the ns
    /******/ 	// mode & 4: return value when already ns object
    /******/ 	// mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function (value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', {enumerable: true, value: value});
        /******/
        if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) {
            return value[key];
        }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ 	// getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function (module) {
        /******/
        var getter = module && module.__esModule ?
            /******/            function getDefault() {
                return module['default'];
            } :
            /******/            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ 	// Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ 	// __webpack_public_path__
    /******/
    __webpack_require__.p = "/";
    /******/
    /******/
    /******/ 	// Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 4);
    /******/
})
    /************************************************************************/
    /******/ ({

    /***/ "./resources/js/pages/dashboard.init.js":
    /*!**********************************************!*\
      !*** ./resources/js/pages/dashboard.init.js ***!
      \**********************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

// line chart
        var options = {
            series: [{
                name: "2018",
                type: 'line',
                data: [20, 34, 27, 59, 37, 26, 38, 25]
            }, {
                name: "2019",
                data: [10, 24, 17, 49, 27, 16, 28, 15],
                type: 'area'
            }],
            chart: {
                height: 260,
                type: 'line',
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            colors: ['#45cb85', '#3b5de7'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: '3',
                dashArray: [4, 0]
            },
            markers: {
                size: 3
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                title: {
                    text: 'Month'
                }
            },
            fill: {
                type: 'solid',
                opacity: [1, 0.1]
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        };
        var chart = new ApexCharts(document.querySelector("#line-chart"), options);
        chart.render(); // column chart

        var options = {
            series: [{
                name: 'Series A',
                data: [11, 17, 15, 15, 21, 14]
            }, {
                name: 'Series B',
                data: [13, 23, 20, 8, 13, 27]
            }, {
                name: 'Series C',
                data: [44, 55, 41, 67, 22, 43]
            }],
            chart: {
                type: 'bar',
                height: 260,
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
            },
            colors: ['#eef3f7', '#ced6f9', '#3b5de7'],
            fill: {
                opacity: 1
            }
        };
        var chart = new ApexCharts(document.querySelector("#column-chart"), options);
        chart.render(); // donut chart

        var options = {
            series: [38, 26, 14],
            chart: {
                height: 230,
                type: 'donut'
            },
            labels: ["Online", "Offline", "Marketing"],
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%'
                    }
                }
            },
            legend: {
                show: false
            },
            colors: ['#3b5de7', '#45cb85', '#eeb902']
        };
        var chart = new ApexCharts(document.querySelector("#donut-chart"), options);
        chart.render(); // Scatter  chart

        var options = {
            series: [{
                name: "Series A",
                data: [[2, 5], [7, 2], [4, 3], [5, 2], [6, 1], [1, 3], [2, 7], [8, 0], [9, 8], [6, 0], [10, 1]]
            }, {
                name: "Series B",
                data: [[15, 13], [7, 11], [5, 8], [9, 17], [11, 4], [14, 12], [13, 14], [8, 9], [4, 13], [7, 7], [5, 8], [4, 3]]
            }],
            chart: {
                height: 230,
                type: 'scatter',
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true,
                    type: 'xy'
                }
            },
            colors: ['#3b5de7', '#45cb85'],
            xaxis: {
                tickAmount: 10
            },
            legend: {
                position: 'top'
            },
            yaxis: {
                tickAmount: 7
            }
        };
        var chart = new ApexCharts(document.querySelector("#scatter-chart"), options);
        chart.render();
        $('#usa-vectormap').vectorMap({
            map: 'us_merc_en',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: '#556ee6'
                }
            },
            markerStyle: {
                initial: {
                    r: 9,
                    'fill': '#556ee6',
                    'fill-opacity': 0.9,
                    'stroke': '#fff',
                    'stroke-width': 7,
                    'stroke-opacity': 0.4
                },
                hover: {
                    'stroke': '#fff',
                    'fill-opacity': 1,
                    'stroke-width': 1.5
                }
            }
        });

        /***/
    }),

    /***/ 4:
    /*!****************************************************!*\
      !*** multi ./resources/js/pages/dashboard.init.js ***!
      \****************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        module.exports = __webpack_require__(/*! C:\xampp7.3\htdocs\admin\resources\js\pages\dashboard.init.js */"./resources/js/pages/dashboard.init.js");


        /***/
    })

    /******/
});
