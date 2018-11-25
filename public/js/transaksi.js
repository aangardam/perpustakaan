/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 61);
/******/ })
/************************************************************************/
/******/ ({

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(62);


/***/ }),

/***/ 62:
/***/ (function(module, exports) {

// var tableTransaksi;
// var filter = {
//     tanggalMulai: {},
//     tanggalAkhir: {},
//     shortCutTimeFilter: {},
//     status:{},
// };
// var btn = {
//     refreshTable: {},
//     exportExcel: {}
// };
$(document).ready(function () {
    // table = {
    //     el: $("#table-transaksi"),
    //     evt: {},
    //     init: function(){
    //         let self = this;
    //         self.el.dataTable();
    //     }
    // };

    // filter.tanggalMulai = $("input[name=tanggal_mulai]").datepicker({
    //     autoclose: true,
    //     format: 'dd/mm/yyyy'
    // });
    // filter.tanggalAkhir = $("input[name=tanggal_akhir]").datepicker({
    //     autoclose: true,
    //     format: 'dd/mm/yyyy'
    // });
    // $("#tanggal_mulai").on('changeDate', function (selected) {
    //     var startDate = new Date(selected.date.valueOf());
    //     $("#tanggal_akhir").datepicker('setStartDate', startDate);
    //     if ($("#tanggal_mulai").val() > $("#tanggal_akhir").val()) {
    //         $("#tanggal_akhir").val($("#tanggal_mulai").val());
    //     }
    // });
    // filter.status = $("#status").select2({
    //     placeholder: 'Status Buku'
    // });

    table = {
        el: $("#table-transaksi"),
        evt: {},
        init: function init() {
            var self = this;
            self.el.dataTable();
        }
    };

    table.init();
});

// function buildTable(){
//     let table = $("#table-transaksi");
//     tableTransaksi = table.DataTable({
//         processing: true,
//         serverSide: true,
//         ajax:{
//             url:  '/reporting/ajax/data?' + $("#filter").serialize(),
//             method: 'post',
//             complete: function () {
//                 loadingToIbox(false, '#ibox-reporting');
//             },
//             error: function (xhr, status, error) {
//                 var err = JSON.parse(xhr.responseText);
//                 swal({
//                     type: 'error',
//                     title: 'Gagal Memuat Reporting',
//                     text: err.message
//                 });
//             }
//         },
//         createdRow: function (row, data) {
//             $('td', row)
//                 .eq(0)
//                 .html(moment(data.tgl).format('DD/MM/YYYY'));
//         },
//         order: [
//             [1, 'desc']
//         ],
//         columns: [
//             {
//                 data: 'tgl',
//                 name: 'tgl'
//             },
//         ]
//     });
// }

// function init() {
//     generateReport();
// }

// function isInstanceDatatable(id) {
//     return $
//         .fn
//         .DataTable
//         .isDataTable(id);
// }

// function validateParams() {
//     let tanggalMulai = $("input[name=tanggal_mulai]").val();

//     if (tanggalMulai)
//         return true;
//     return false;
// }

// function generateReport() {
//     if (validateParams()) {
//         loadingToIbox(true, '#ibox-reporting');
//         if (isInstanceDatatable('#table-transaksi')) {
//             tableTransaksi.destroy();
//             buildTable();
//         } else {
//             buildTable();
//         }
//     } else {
//         swal({
//             type: 'error',
//             title: 'Gagal Memuat Reporting',
//             text: 'Parameter yang diperlukan belum lengkap'
//         });
//     }
// }
// function loadingToIbox(state, ibox) {
//     if (state) {
//         $(ibox)
//             .children('.ibox-content')
//             .toggleClass('sk-loading');
//     } else {
//         $(ibox)
//             .children('.ibox-content')
//             .removeClass('sk-loading');
//     }
// }

/***/ })

/******/ });