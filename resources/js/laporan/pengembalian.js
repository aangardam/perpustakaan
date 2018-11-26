
$(document).ready(function(){
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