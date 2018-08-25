@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i> 
	                <span class="font-weight-semibold">Estructura Monetaria</span> - {{ $title }}
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
				                		<input type="hidden" name="id_moneda" id="id_moneda" value="{{ $form->id_moneda }}">

				                		<div class="row">
				                			<div class="col-md-6">
												<div class="form-group">
													<label>Siglas:</label>
													<input type="text" class="form-control alpha-dash" name="siglas_moneda" name="siglas_moneda" value="{{ $form->siglas_moneda }}" maxlength="4" {{ $disabled['editar'] }} data-popup="tooltip" title="Letras, números, -_" data-placement="right">
												</div>
				                			</div>

					                		<div class="col-md-6">
												<div class="form-group">
													<label>Tipo de Moneda</label>
													<select class="form-control select" name="tipo_moneda" id="tipo_moneda" {{ $disabled['ver'] }} data-fouc>
														@foreach($tipo_moneda as $key => $value)
															<option value="{{ $key }}" {{ ($key == $form->tipo_moneda) ? 'selected' : '' }}>
																{{ $value }}
															</option>
														@endforeach
													</select>
												</div>
					                		</div>

				                			<div class="col-md-12">
												<div class="form-group">
													<label>Nombre:</label>
													<input type="text" class="form-control" name="desc_moneda" name="desc_moneda" value="{{ $form->desc_moneda }}" maxlength="50" {{ $disabled['ver'] }}>
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
