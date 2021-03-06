@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i> 
	                <span class="font-weight-semibold">Misceláneos</span> - {{ $title }}
	            </h4>
	        </div>
	    </div>
	</div>
@endif

<div class="page-content pt-0">
    <div class="content-wrapper">
        <div class="content">
            <div class="page-container">
                <div class="page-content">
                    <div class="content-wrapper">
						<div class="col-md-12">
							<form class="link-form" autocomplete="off" 
								method="{{ ($option == 'create') ? 'post' : 'put' }}" 
								action="{{ $action }}" data-back="{{ $url }}">
								<input type="hidden" name="id_miscelaneo" id="id_miscelaneo" value="{{ $form->id_miscelaneo }}">

								<div class="row">
									<div class="col-md-{{ ($option != 'show' ? '6' : '12') }}">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Código <span class="text-danger">*</span></label>
															<input type="text" class="form-control alpha-dash" name="cod_maestro" name="cod_maestro" value="{{ $form->cod_maestro }}" maxlength="15" {{ $disabled['editar'] }} data-popup="tooltip" title="Letras, números, -_" data-placement="right">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Aplicación <span class="text-danger">*</span></label>
															<select class="form-control select" name="id_aplicacion" id="id_aplicacion" {{ $disabled['editar'] }} data-fouc data-placeholder="Selecciona...">
																<option></option>
																@foreach($aplicaciones as $row)
																	<option value="{{ $row->id_aplicacion }}" {{ ($row->id_aplicacion == $form->id_aplicacion) ? 'selected' : '' }}>
																		{{ $row->desc_nombre_modulo }}
																	</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label>Nombre <span class="text-danger">*</span></label>
															<input type="text" class="form-control" name="nom_maestro" name="nom_maestro" value="{{ $form->nom_maestro }}" maxlength="255" {{ $disabled['ver'] }}>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label>Descripción:</label>
															<textarea class="form-control" name="desc_maestro" name="desc_maestro" rows="3" cols="3" {{ $disabled['ver'] }}>{{ $form->desc_maestro }}</textarea>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-check form-check-switch form-check-switch-left">
															<label class="form-check-label d-flex align-items-center">
																<input type="checkbox" name="ind_estado" id="ind_estado" value="1" data-on-color="success" data-off-color="danger" data-on-text="Activo" data-off-text="Inactivo" class="form-check-input-switch" {{ (($form->ind_estado === 'A') ? 'checked' : '') }} {{ $disabled['ver'] }}>
															</label>
														</div>
													</div>
												</div>

												@if ($option != 'show')
													<div class="text-center form-buttons">
														<button type="submit" class="btn btn-primary">
															<i class="icon-floppy-disk mr-2"></i> Guardar
														</button>
														<a href="{{ $url }}" type="button" class="btn btn-light link-item">
															<i class="icon-blocked mr-2"></i> Cancelar
														</a>
													</div>
												@endif
											</div>
										</div>
									</div>

									<div class="col-md-{{ ($option != 'show' ? '6' : '12') }}">
										<div class="card">
											<div class="card-header header-elements-inline">
												<h5 class="card-title">Valores del maestro</h5>
												<div class="pull-right">
													<button type="button" class="btn btn-default" onclick="agregarItem();">
														<i class="icon-add mr-2"></i> Agregar
													</button>
													<button type="button" class="btn btn-danger" onclick="$('#detalles-items').find('.table-success').remove();">
														<i class="icon-pencil7 mr-2"></i> Borrar
													</button>
												</div>
											</div>

											<div class="table-responsive table-scrollable">
												<table class="table table-cell-s">
													<thead>
														<tr>
															<th style="width: 125px;">Codigo</th>
															<th style="min-width: 200px;">Descripcion</th>
															<th style="width: 125px;">Estatus</th>
														</tr>
													</thead>
													<tbody id="detalles-items"></tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	function agregarItem() {
		var tr = `
			<tr>
				<td>
					<input type="text" name="detalles[][cod_detalle]" class="form-control">
				</td>
				<td>
					<input type="text" name="detalles[][desc_detalle]" class="form-control">
				</td>
				<td>
					<select name="detalles[][ind_estado]" class="form-control select" data-fouc>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</td>
			</tr>
		`;

		$('#detalles-items').append($(tr));
		init();
	}
</script>
