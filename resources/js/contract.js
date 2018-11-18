(function ($) {

    $('input[name=valid_from], input[name=valid_to]').datepicker({
        format: 'yyyy-mm-dd'
    });
    let form = $("#contract_form");

    axios.get(form.data('properties'))
        .then(function (response) {
            $.each(response.data.data, function (k, property) {
                console.log(property);
                let text = property.number + '; ' + property.area + ' дка.';
                let opt = new Option(text, property.id, false, false);
                $("#properties_select").append(opt);
            })
        })
        .finally(function () {
            // $("#properties_select").select2();
        });


    $(form).on('submit', function (e) {
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
                    .text('Успешно добавяне на договор!'))
            })
            .catch(function (response) {
                form.prepend($("<div>").addClass('alert alert-danger')
                    .text(response.response.data.message));
                $.each(response.response.data.errors, function (field, message) {
                    field = field.replace('.', '-');
                    let input_field = $('input[name|=' + field + '], .'+field);
                    input_field.addClass('is-invalid').after($('<div>').addClass('text-danger').text(message.pop().replace(/(.\d)/, '')));
                })
            })
            .finally(function () {
                $(button).attr('disabled', false);
            });
    });

})(jQuery);
