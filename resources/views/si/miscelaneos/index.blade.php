<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4>
                <i class="icon-gear mr-2"></i> 
                <span class="font-weight-semibold">Misceláneos</span>
            </h4>
        </div>
    </div>
</div>

<div class="page-content pt-0">
    <div class="content-wrapper">
        <div class="content">
            <div class="page-container">
                <div class="page-content">
                    <div class="content-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <input type="checkbox" class="chk-todos" data-row="row" />
                                <div class="pull-right">
                                    <a href="{{ $url.'/create' }}" type="button" class="btn btn-primary link-item">
                                        <i class="icon-add mr-2"></i> Nuevo
                                    </a>
                                    <a href="{{ $url }}" type="button" class="btn btn-success link-item" 
                                        data-row="row" data-action="edit">
                                        <i class="icon-pencil7 mr-2"></i> Editar
                                    </a>
                                    <a href="{{ $url }}" type="button" class="btn btn-light link-modal" 
                                        data-row="row" data-size="lg" data-title="Ver registro">
                                        <i class="icon-eye mr-2"></i> Ver
                                    </a>
                                    <a href="{{ $url.'/destroyMass' }}" type="button" class="btn btn-danger delete-item" 
                                        data-row="row" data-table="table-row" data-type="multiple">
                                        <i class="icon-trash mr-2"></i> Eliminar
                                    </a>
                                </div>
                            </div>
                            <div class="card-table">
                                <table class="table table-hover datatable-ajax" id="table-row">
                                    <thead>
                                        <tr>
                                            <th style="width: 25px;"></th>
                                            <th style="width: 125px; text-align: center;">Aplicación</th>
                                            <th style="width: 200px;">Maestro</th>
                                            <th style="min-width: 200px;">Nombre</th>
                                            <th style="width: 125px;">Estado</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.datatable-ajax').dataTable({
        ajax: '{{ url('si/miscelaneos/list') }}',
        columns: [
            {
                orderable: false,
                data: function(data) {
                    return '<input type="checkbox" name="row[]" value="'+data['id_miscelaneo']+'">';
                }
            },
            { 
                data: function(data) {
                    return data['aplicacion'].desc_nombre_modulo;
                }
            },
            { data: 'cod_maestro' },
            { data: 'nom_maestro' },
            { 
                data: function(data) {
                    var idx  = data['ind_estado']
                    return '<span class="badge bg-'+estatus_general[idx].color+'">'+estatus_general[idx].value+'</span>';
                }
            }
        ],
        stateSave: true,
        autoWidth: true,
        scrollY: 300,
        order: [1, 'asc']
    });
</script>
