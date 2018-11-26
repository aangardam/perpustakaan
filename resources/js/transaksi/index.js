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
$(document).ready(function(){
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

    $("#idmember").select2({
        placeholder: 'Pilih Anggota'
    });
     $("#idbuku").select2({
        placeholder: 'Pilih Buku'
    });
    table = {
        el: $("#table-transaksi"),
        evt: {},
        init: function(){
            let self = this;
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