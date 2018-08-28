<template>
    <div>
        <!-- Page header mini -->
        <div class="content-group border-top-lg border-top-primary">
            <div class="page-header page-header-default page-header-xs" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                <div class="page-header-content">
                    <div class="page-title">
                        <h5>
                            <i class="icon-arrow-left52 position-left"></i>
                            <span class="text-semibold">Maestro de Usuarios</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page container -->
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <div class="heading-elements" style="padding:10px 0px;">
                                    <router-link :to="{ name: 'usuarios-create', params: { form: 'create'} }" class="btn btn-success btn-raised">
                                        <i class="icon-plus3 position-left"></i> Nuevo
                                    </router-link>
                                    <button type="button" class="btn btn-default btn-raised">
                                        <i class="icon-pencil7 position-left"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-default btn-raised">
                                        <i class="icon-eye8 position-left"></i> Ver
                                    </button>
                                    <button type="button" class="btn btn-danger btn-raised">
                                        <i class="icon-trash position-left"></i> Eliminar
                                    </button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Vence?</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Status</th>
                                            <th>ID</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(row, index) in filtered" v-bind:key="index">
                                            <td>{{ row.usuario }}</td>
                                            <td>
                                                <i class="fa fa-check" v-if="row.flag_vence"></i>
                                            </td>
                                            <td>
                                                <div v-if="row.flag_vence">
                                                    {{ row.fecha_vence | moment("DD-MM-YYYY") }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="label" v-bind:class="[row.status ? 'label-success' : 'label-danger']">
                                                    {{ row.status ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td>{{ row.id }}</td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                            <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                            <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		data: function() {
			return { rows : '' }
		},
		created: function() {
            let uri = '/si/usuarios/';
			Axios.get(uri).then((response) => {
                this.rows = response.data;
            });
        },
		updated: function() {
            $('.datatable-basic').DataTable({
                select: true,
                autoWidth: true,
                scrollY: 450
            });
        },
        computed: {
            filtered: function() {
				if (this.rows.length) {
					return this.rows;
				}
            }
        }
	}
</script>
