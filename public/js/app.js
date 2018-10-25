/**
 * Ready document
 */
$(document).ready(function() {
    init();

    $('#modal_remote, #modal_remote-xs, #modal_remote-sm, #modal_remote-lg, #modal_remote-full').on('show.bs.modal', function() {
        $(this).find('.modal-body').load($(this).data('url'), function() {
            _componentSelect2();
        });
    });
    
    $('#link-default').click();

    // Select2
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        init();
    };
});

/**
 * Inicializar eventos y plugins
 */
function init() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("a.link-item").off();

    $("a.link-modal").off();

    $("form.link-form").off();

    $("a.delete-item").off();

    $("a.delete-item").off();

    $(".datatable-ajax tbody tr").off();

    $(".table-cell tbody tr").off();

    $(".table-cell-s tbody tr").off();

    // Get request
    $('a.link-item').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var row = $(this).data('row');
        var type = $(this).data('type');
        var action = $(this).data('action');

        // send a value selected
        if (row) {
            var sel = $("input[name='"+row+"[]']:checked");
            var num = sel.length;

            if (num < 1) {
                message({
                    text: 'Debe seleccionar por lo menos un registro.',
                    status: 'error'
                });
                return false;
            }
            else if (num > 1 && type != 'multiple') {
                message({
                    text: 'Debe seleccionar solamente un registro.',
                    status: 'error'
                });
                return false;
            }

            if (type != 'multiple') {
                if (action) url = url + '/' + sel.val() + '/' + action;
                else url = url + '/' + sel.val();
            }
        }
        getLink(url);
    });

    //  Get request for modal
    $('a.link-modal').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var row = $(this).data('row');
        var type = $(this).data('type');
        var action = $(this).data('action');
        var size = $(this).data('size');
        var title = $(this).data('title');

        // send a value selected
        if (row) {
            var sel = $("input[name='"+row+"[]']:checked");
            var num = sel.length;

            if (num < 1) {
                message({
                    text: 'Debe seleccionar por lo menos un registro.',
                    status: 'error'
                });
                return false;
            }
            else if (num > 1 && type != 'multiple') {
                message({
                    text: 'Debe seleccionar solamente un registro.',
                    status: 'error'
                });
                return false;
            }

            if (type != 'multiple') {
                if (action) url = url + '/' + sel.val() + '/' + action;
                else url = url + '/' + sel.val();
            }
        }

        if (size == '') var modal = 'modal_remote'; else var modal = 'modal_remote-'+size;
        $('#'+modal).find('.modal-title').html($('.page-title h4').html()+' - '+title);
        $('#'+modal).attr('data-url', url);
        $('[data-target="#'+modal+'"]').click();
    });

    // Form submit
    $('form.link-form').on('submit', function(e) {
        e.preventDefault();
        materialLoading(true);

        var url = $(this).attr('action');
        var back = $(this).data('back');
        var method = $(this).attr('method');
        var data = $(this).serializeJSON();
        
        axios({
            method: method,
            url: url,
            data: data
        })
        .then(response => {
            console.log(response);
            message({
                text: response.data.message,
                status: response.data.status
            });
            materialLoading(false);
            if (response.data.status === 'success' &&  back) getLink(back);
        })
        .catch(err => console.log(err));
    });

    // Action item
    $('a.delete-item').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var row = $(this).data('row');
        var type = $(this).data('type');
        var table = $(this).data('table');
        var params = [];

        var sel = $("input[name='"+row+"[]']:checked");
        var num = sel.length;

        if (num < 1) {
            message({
                text: 'Debe seleccionar por lo menos un registro.',
                status: 'error'
            });
            return false;
        }
        else if (num > 1 && type != 'multiple') {
            message({
                text: 'Debe seleccionar solamente un registro.',
                status: 'error'
            });
            return false;
        }

        // Setup
        var notice = new PNotify({
            title: 'Advertencia',
            text: '<p>Está seguro de ejecutar esta acción?</p>',
            hide: false,
            type: 'warning',
            addclass: 'alert alert-styled-left',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Aceptar',
                        addClass: 'btn btn-sm btn-danger'
                    },
                    {
                        text: 'Cancelar',
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {
            materialLoading(true);
            if (type != 'multiple') {
                url = url + '/' + sel.val();

                axios
                    .delete(url)
                    .then(response => {
                        console.log(response.data);
                        if (table) {
                            var table_rows = $('#'+table).DataTable();
                            sel.each(function(i) {
                                table_rows.row('.table-success').remove().draw(false);
                            });
                        }
                        materialLoading(false);
                    })
                    .catch(err => console.log(err));
            }
            else {
                sel.each(function(i) {
                    params.push($(this).val());
                });

                axios
                    .post(url, { data: params })
                    .then(response => {
                        console.log(response.data);
                        message({
                            text: response.data.message,
                            status: response.data.status
                        });
                        if (table) {
                            var table_rows = $('#'+table).DataTable();
                            sel.each(function(i) {
                                table_rows.row('.table-success').remove().draw(false);
                            });
                        }
                        materialLoading(false);
                    })
                    .catch(err => console.log(err));
            }
        });
    });

    // Multiple rows selection
    $('.datatable-ajax tbody tr').on('click', function() {
        var chk = $(this).find('input[name="row[]"]');
        $(this).toggleClass('table-success');
        if ($(this).hasClass('table-success')) chk.prop('checked', true); else chk.prop('checked', false);
    });

    // Multiple rows selection
    $('.table-cell tbody tr').on('click', function() {
        $(this).toggleClass('table-success');
    });

    // Simple rows selection
    $('.table-cell-s tbody tr').on('click', function() {
        $(this).siblings().removeClass('table-success');
        $(this).toggleClass('table-success');
    });

    // Action item
    $('input.chk-todos').on('click', function(e) {
        var row = $(this).data('row');
        var tr = $("input[name='"+row+"[]']").parent().parent();
        $("input[name='"+row+"[]']").prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked')) tr.addClass('table-success');
        else tr.removeClass('table-success');
    });
    
    // Uniform
    $('.form-check-input-styled').uniform();

    // Bootstrap switch
    $('.form-check-input-switch').bootstrapSwitch();

    // Tooltip
    $('[data-popup=tooltip]').tooltip();

    // Select
    $('.select').select2({
        minimumResultsForSearch: Infinity
    });

    // Select with search
    $('.select-search').select2();

    //  Mask
    $('.alpha-dash').mask('A', {'translation': {A: {pattern: /[a-zA-Z0-9-_]/, recursive: true}}});
    $('.daterange-single').mask('00-00-0000');
    $('.money').mask("#,##0.00", {reverse: true, selectOnFocus: true});

    // Single picker
    $('.daterange-single').daterangepicker({
        singleDatePicker: true,
        maxDate: moment().format('DD-MM-YYYY'),
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
}

/**
 * Funcion para cargar contenido html por ajax
 * 
 * @param {string} url Url del request
 */
function getLink(url) {
    materialLoading(true);
    axios
        .get(url)
        .then(response => {
            $("#content").html(response.data);
            setTimeout(() => {
                init();
                materialLoading(false);
            }, 2000);
        })
        .catch(err => console.log(err));
}

/**
 * Funcion para mostrar una notificacion
 * 
 * @param {array} params Parametros para el plugin de mensajes
 */
function message(params) {
    if (params.status === 'error') {
        var color = 'danger';
        var type = 'error';
    }
    else if (params.status === 'success') {
        var color = 'success';
        var type = 'success';
    }
    else if (params.status === 'warning') {
        var color = 'warning';
        var type = 'warning';
    }
    else {
        var color = 'info';
        var type = 'info';
    }

    new PNotify({
        title: params.title,
        text: params.text,
        type: params.status,
        addclass: 'alert bg-'+color+' border-'+color+' alert-styled-left'
    });
}

/**
 * Funcion para formatear un valor a moneda
 * 
 * @param {string} value Valor a formatear
 */
function formatMoney(value) {
    return numeral(value).format('0,0.00');
}

/**
 * Funcion para formatear un valor a fecha en format Y-m-d
 * 
 * @param {string} value Valor a formatear recibido en formato dmY
 */
function formatDate(value) {
    var p = value.split('-');
    return p[2] + '-' + p[1] + '-' + p[0];
}

/**
 * Cargar select dependientes
 * 
 * @param {object} $select 
 * @param {object} $destinos 
 * @param {array} data 
 */
function select($select, $destinos, data = null) {
    var option = '<option></option>';

    for(var i=0; i < $destinos.length; i++) {
        var $destino = $destinos[i];
        if ($destino.length > 0) $destino.empty().append(option).trigger('change');
    }
    
    if (!data) {
        data = {
            id : $select.val()
        }
    }
    var url = $select.data('url');

    axios({
        method: 'POST',
        url: url,
        data: data
    })
    .then(response => {
        console.log(response);
        response.data.forEach(function(element) {
            var newOption = new Option(element.nombre, element.id, false, false);
            $destinos[0].append(newOption).trigger('change');
            // $destino[0].append($(`<option value="${element.id}">${element.nombre}</option>`)).trigger('change');
        });
    })
    .catch(err => console.log(err));
}