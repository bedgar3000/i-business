@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i>
	                <span class="font-weight-semibold"> Municipios  </span> - {{ $title }}
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
                    	<div class="col-md-{{ ($option != 'show' ? '10 offset-md-1' : '12') }}">
				            <div class="card">
				                <div class="card-body">
				                	<form class="link-form" autocomplete="off"
				                		method="{{ ($option == 'create') ? 'post' : 'put' }}"
				                		action="{{ $action }}" data-back="{{ $url }}">
				                		<input type="hidden" name="id_municipio" id="id_municipio" value="{{ $form->id_municipio }}">
				                		<div class="row">
					                		<div class="col-md-4">
												<div class="form-group">
													<label>Estados</label>
													<select class="form-control select" name="id_estado" id="id_estado" {{ $disabled['editar'] }} data-fouc data-placeholder="Selecciona...">
													<option></option>
													@foreach($estado as $row)
															<option value="{{ $row->id_estado }}" {{ ($row->id_estado == 	$form->id_estado) ? 'selected' : '' }}>
															{{ $row->desc_estado }}
															</option>
													@endforeach
													</select>
												</div>
					                		</div>

				                			<div class="col-md-4">
																<div class="form-group">
																	<label>Nombre Municipio:</label>
																	<input type="text" class="form-control municipio" name="desc_municipio" id="desc_municipio" value="{{ $form->desc_municipio }}">
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
									</form>
								</div>
			                </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
</script>
