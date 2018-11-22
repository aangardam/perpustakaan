let table = {};
$(document).ready(function(){
    table = {
        el: $("#table-denda"),
        evt: {},
        init: function(){
            let self = this;
            self.el.dataTable();
        }
    };

    table.init();
});