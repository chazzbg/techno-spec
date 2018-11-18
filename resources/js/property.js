(function ($) {

    let form = $("#properties_form");
    let landlords_data = false;

    let get_landlords = function (callback) {
        if (!landlords_data) {
            axios.get(form.data('landlords'))
                .then(function (response) {
                    landlords_data = response.data.data;
                    callback(landlords_data);
                });
        } else {
            callback(landlords_data);
        }

    };


    $("#save_property").on('click', function (e) {
        let button = this;
        e.preventDefault();
        $(button).attr('disabled', true);
        $('.alert-success').remove();
        $('.alert-danger').remove();
        $('.is-invalid').each(function () {
            $(this).removeClass('is-invalid').siblings('.invalid-feedback').remove();
        });
        axios.post(form.attr('action'), form.serialize())
            .then(function (response) {
                form.trigger('reset').prepend($("<div>").addClass('alert alert-success')
                    .text('Успешно добавяне на имот!'))
            })
            .catch(function (response) {
                form.prepend($("<div>").addClass('alert alert-danger')
                    .text(response.response.data.message));
                $.each(response.response.data.errors, function (field, message) {
                    field = field.replace('.','-');
                    let input_field = $('input[name=' + field + '], .'+field);
                    input_field.addClass('is-invalid').after($('<div>').addClass('invalid-feedback').text(message.pop().replace(/(.\d)/, '')));
                })
            })
            .finally(function () {
                $(button).attr('disabled', false);
            });
    });

    $("#add_landlord").on('click', function () {
        let tpl = $("#landlord_template").clone().html();
        $(this).closest('.form-group').append(tpl);

        let rows_count = $(this).siblings('.row').length;
        let row = $(this).siblings('.row').last();
        let landlords_select = row.find('select[name=landlords]');

        landlords_select.select2({
            theme: "bootstrap4"
        });
        row.find('button').on('click', function () {
            $(this).closest('.row').remove();
        });

        row.find(':input').each(function () {
            $(this).addClass($(this).attr('name')+'-'+rows_count).attr('name',$(this).attr('name')+'['+rows_count+']');
        });
        get_landlords(function (data) {

            $.each(data, function (k, landlord) {
                let text = landlord.firstname + ' ' + landlord.lastname + '; телефон: ' + landlord.phone + '; ЕГН: ' + landlord.egn;
                let option = new Option(text, landlord.id, false, false);
                landlords_select.append(option);
            });
            landlords_select.trigger('change')

        });
    });
})(jQuery);
