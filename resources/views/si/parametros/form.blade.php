@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i> 
	                <span class="font-weight-semibold">Parámetros</span> - {{ $title }}
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
                    	<div class="col-md-{{ ($option != 'show' ? '8 offset-md-2' : '12') }}">
				            <div class="card">
				                <div class="card-body">
				                	<form class="link-form" autocomplete="off" 
				                		method="{{ ($option == 'create') ? 'post' : 'put' }}" 
				                		action="{{ $action }}" data-back="{{ $url }}">
				                		<input type="hidden" name="id_parametro" id="id_parametro" value="{{ $form->id_parametro }}">
				                		<input type="hidden" name="flag_comun_compania" id="flag_comun_compania" value="{{ $form->flag_comun_compania }}">

				                		<div class="row">
					                		<div class="col-md-6">
												<div class="form-group">
													<label>Código:</label>
													<input type="text" class="form-control alpha-dash" name="cod_parametro_clave" name="cod_parametro_clave" value="{{ $form->cod_parametro_clave }}" maxlength="15" {{ $disabled['editar'] }} data-popup="tooltip" title="Letras, números, -_" data-placement="right">
												</div>
					                		</div>

					                		<div class="col-md-6">
												<div class="form-group">
													<label>Aplicación</label>
													<select class="form-control select" name="id_aplicacion" id="id_aplicacion" {{ $disabled['ver'] }} data-fouc data-placeholder="Selecciona...">
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
													<label>Descripción:</label>
													<input type="text" class="form-control" name="desc_parametro" name="desc_parametro" value="{{ $form->desc_parametro }}" maxlength="255" {{ $disabled['ver'] }}>
												</div>
					                		</div>

					                		<div class="col-md-12">
												<div class="form-group">
													<label>Explicación:</label>
													<textarea class="form-control" name="exp_parametro" name="exp_parametro" rows="3" cols="3" {{ $disabled['ver'] }}>{{ $form->exp_parametro }}</textarea>
												</div>
					                		</div>

					                		<div class="col-md-6">
												<div class="form-group">
													<label>Tipo de Valor</label>
													<select class="form-control select" name="tipo_valor" id="tipo_valor" {{ $disabled['ver'] }} data-fouc>
														@foreach($tipo_valor as $key => $value)
															<option value="{{ $key }}" {{ ($key == $form->tipo_valor) ? 'selected' : '' }}>
																{{ $value }}
															</option>
														@endforeach
													</select>
												</div>
					                		</div>

					                		<div class="col-md-6">
												<div class="form-group">
													<label>Tipo de Parámetro</label>
													<select class="form-control select" name="tipo_parametro" id="tipo_parametro" {{ $disabled['ver'] }} data-fouc>
														@foreach($tipo_parametro as $key => $value)
															<option value="{{ $key }}" {{ ($key == $form->tipo_parametro) ? 'selected' : '' }}>
																{{ $value }}
															</option>
														@endforeach
													</select>
												</div>
					                		</div>

					                		<div class="col-md-12">
												<div class="form-group">
													<label>Valor:</label>
													<textarea class="form-control" name="valor_parametro" name="valor_parametro" rows="3" cols="3" {{ $disabled['ver'] }}>{{ $form->valor_parametro }}</textarea>
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
