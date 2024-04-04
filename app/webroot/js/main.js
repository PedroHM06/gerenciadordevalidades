function getFieldsForForm(formId) {
    var fields = [];
    var form = document.getElementById(formId);
    if (form) {
        var inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            fields.push(input.getAttribute('id'));
        });
    }
    return fields;
}

function crud(id, form, modal, controller, action, modalBody) {
        
        fields = getFieldsForForm(form);
        var formIsValid = true;

        fields.forEach(function(field) {
            var value = document.getElementById(form).querySelector(`[id="${field}"]`).value;
            if (!value) {
                document.getElementById(form).querySelector(`[id="${field}"]`).classList.add('is-invalid');
                formIsValid = false;
            } else {
                document.getElementById(form).querySelector(`[id="${field}"]`).classList.remove('is-invalid');
            }
        });

        if (!formIsValid) {
            $.confirm({
                title: 'Campos em Branco',
                content: 'Por favor, preencha todos os campos do formulário.',
                type: 'red',
                buttons: {
                    OK: function () {}
                }
            });
            return;
        }
        
    switch (action) {
        case 'add':
        case 'edit':
            $.ajax({
                url: `${controller}/${action}/${id}`,
                type: 'GET',
                success: function (response) {
                    $(`#${modalBody}`).html(response);
                    $(`#${modal}`).modal('show');
                },
                error: function (error) {
                    console.error(error);
                }
            });
            break;

        case 'view':

            break;

        case 'save':
            const formReturn = $(`#${form}`);
            $.ajax({
                type: 'POST',
                url: `${controller}/${action}/${id}`,
                data: formReturn.serialize(),
                success: function (response) {
                    const data = JSON.parse(response);

                    $('#alert').removeClass().addClass('alert-primary');
                    $('#alerttext').html(data.message);
                    $('#alert').show();
                    $(`#${modal}`).modal('hide');
                    setTimeout(function () {
                    $('#alert').hide();
                    }, 5000);

                    const action = data.action;

                    crud('', '', '', controller, action, '');
                },
                error: function (error) {
                    console.error(error);
                },
            });

            break;
        case 'delete':
            $.confirm({
                title: 'Confirmar Exclusão',
                columnClass: 'col-md-6 col-md-offset-6',
                content: 'Tem certeza que deseja excluir esta Categoria?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    confirmar: {
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                url: `${controller}/${action}/${id}`,
                                type: 'DELETE',
                                success: function (response){
                                    const data = JSON.parse(response);
                                    $('#alert').removeClass().addClass('alert-danger');
                                    $('#alerttext').html(data.message);
                                    $('#alert').show();
                                    setTimeout(function () {
                                        $('#alert').hide();
                                    }, 5000);

                                    const action = data.action;

                                    crud('', '', '', controller, action, '');
                                },
                                error: function (error) {
                                    console.error(error);
                                }
                            });
                        }
                    },
                    cancel: function () {
                    }
                }
            });
            break;

        default:
            $.ajax({
                type: "GET",
                url: `${controller}/${action}`,
                success: function (response) {
                    $("#content").html(response);
                },
                error: function (error) {
                    console.error(error);
                }
            });
            break;
    }
} 
//Abrir sistema index
crud('', '', '', 'produtos', 'index', '');