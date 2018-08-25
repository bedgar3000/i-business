@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i> 
	                <span class="font-weight-semibold">Aplicaciones</span> - {{ $title }}
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
                    	<div class="col-md-{{ ($option != 'show' ? '6 offset-md-3' : '12') }}">
				            <div class="card">
				                <div class="card-body">
				                	<form class="link-form" autocomplete="off" 
				                		method="{{ ($option == 'create') ? 'post' : 'put' }}" 
				                		action="{{ $action }}" data-back="{{ $url }}">
				                		<input type="hidden" name="id_aplicacion" id="id_aplicacion" value="{{ $form->id_aplicacion }}">
				                		<input type="hidden" name="id_dependencia" id="id_dependencia" value="{{ $form->id_dependencia }}">
				                		<input type="hidden" name="id_misc_det_sist_fuente" id="id_misc_det_sist_fuente" value="{{ $form->id_misc_det_sist_fuente }}">

										<div class="form-group col-md-6">
											<label>Código:</label>
											<input type="text" class="form-control alpha-dash" name="cod_acronimo_aplicacion" name="cod_acronimo_aplicacion" value="{{ $form->cod_acronimo_aplicacion }}" maxlength="4" {{ $disabled['editar'] }} data-popup="tooltip" title="Letras, números, -_" data-placement="right">
										</div>

										<div class="form-group col-md-12">
											<label>Nombre:</label>
											<input type="text" class="form-control" name="desc_nombre_modulo" name="desc_nombre_modulo" value="{{ $form->desc_nombre_modulo }}" maxlength="100" {{ $disabled['ver'] }}>
										</div>

										<div class="form-group col-md-12">
											<label>Descripción:</label>
											<textarea class="form-control" name="desc_descripcion_modulo" name="desc_descripcion_modulo" rows="3" cols="3" {{ $disabled['ver'] }}>{{ $form->desc_descripcion_modulo }}</textarea>
										</div>

										<div class="col-md-12">
											<div class="form-check form-check-switch form-check-switch-left">
												<label class="form-check-label d-flex align-items-center">
													<input type="checkbox" name="ind_estado" id="ind_estado" value="1" data-on-color="success" data-off-color="danger" data-on-text="Activo" data-off-text="Inactivo" class="form-check-input-switch" {{ (($form->ind_estado === 'A') ? 'checked' : '') }} {{ $disabled['ver'] }}>
												</label>
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
