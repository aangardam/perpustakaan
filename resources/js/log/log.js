$(document).ready(function(){
    table = {
        el: $("#table-log"),
        evt: {},
        init: function(){
            let self = this;
            self.el.dataTable();
        }
    };

    table.init();
});