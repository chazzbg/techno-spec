

(function ($) {

    let table = $("#due_table"),
    data_url = table.data('url');

    let cols ={
        number: {
            format: null,
        },
        valid_from: {
            format: function (data) {
                if(data.indexOf('-')>=0){
                    return data;
                }
                let date = new Date(data*1);
                return date.getFullYear()+"-"+(date.getUTCMonth()+1)+"-"+(date.getUTCDay()+1);
            },
        },

        area: {
            format: function (data) {
                return data +' дка.'
            },
        },
        price: {
            format:  function (data) {
                return data +'лв.'
            },
        },
        price_per_ar: {
            format:  function (data) {
                return data +'лв.'
            },
        }
    };
    let refreshTable = function (filters ='') {
        if(filters){
            filters  = '?'+filters;
        }
        table.find('tr').not('.table-heading').remove();
        axios.get(data_url+filters).then(function (response) {
            $.each(response.data.data, function (k, row) {
                let tr = $('<tr>');
                $.each(cols, function (col, options) {
                    let td = $('<td>');
                    if(row[col]){
                        let data = options.format ? options.format(row[col]) : row[col];
                        td.html(data).appendTo(tr);
                    } else {
                        td.html('').appendTo(tr);
                    }

                });
                tr.appendTo(table);
            })
        })
    };

    refreshTable()

        $('input[name=date]').datepicker({
            format: 'yyyy-mm-dd'
        });
    $("#search_form").on('submit', function (e) {
        e.preventDefault();
        refreshTable($(this).serialize());
    })
})(jQuery);
