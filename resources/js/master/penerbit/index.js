let table = {};
$(document).ready(function(){
    table = {
        el: $("#table-penerbit"),
        evt: {},
        init: function(){
            let self = this;
            self.el.dataTable();
        }
    };
    $('#file').change(function() {
        $('#target').submit();
      });
    table.init();
});

window.remove = function (id) {
    event.preventDefault();

    swal({
        title: "Apakah Anda Yakin?",
        text: "Data yang sudah di hapus tidak bisa dikembalikian ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!",
        cancelButtonText: 'Batal',
        closeOnConfirm: false,
        html: false
    }, function () {
        document.getElementById('delete-' + id).submit();
        swal("Berhasil!",
            "Data berhasil dihapu",
            "success");
    });
};