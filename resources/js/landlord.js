(function ($) {
    let form = $('#landlord_form');

    form.on('submit', function (e) {
        e.preventDefault();
        $(form).find('button').attr('disabled', true);
        $('.alert-success').remove();
        $('.is-invalid').each(function () {
            $(this).removeClass('is-invalid').siblings('.invalid-feedback').remove();
        });
        axios.post(form.attr('action'), form.serialize())
            .then(function (response) {
                form.trigger('reset').prepend($("<div>").addClass('alert alert-success').text('Успешно добавяне на арендодател!'))
            })
            .catch(function (response) {
                $.each(response.response.data.errors, function (field, message) {
                    $('input[name=' + field + ']').addClass('is-invalid').after($('<div>').addClass('invalid-feedback').text(message))
                })
            })
            .finally(function () {
                $(form).find('button').attr('disabled', false);
            });
    })

})(jQuery);
