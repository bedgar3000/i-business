@if ($option != 'show')
	<div class="page-header">
	    <div class="page-header-content header-elements-md-inline">
	        <div class="page-title d-flex">
	            <h4>
	                <i class="icon-gear mr-2"></i> 
	                <span class="font-weight-semibold">Tipo de Cambio Diario</span> - {{ $title }}
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
				                		<input type="hidden" name="id_tipo_cambio" id="id_tipo_cambio" value="{{ $form->id_tipo_cambio }}">

				                		<div class="row">
				                			<div class="col-md-4">
												<div class="form-group">
													<label>Fecha de Cambio:</label>
													<input type="text" class="form-control daterange-single" name="fecha_cambio" name="fecha_cambio" value="{{ formatDate($form->fecha_cambio,'Y-m-d','d-m-Y') }}" maxlength="10" {{ $disabled['editar'] }}>
												</div>
				                			</div>

					                		<div class="col-md-4">
												<div class="form-group">
													<label>Moneda Origen</label>
													<select class="form-control select" name="id_moneda_origen" id="id_moneda_origen" {{ $disabled['editar'] }} data-fouc data-placeholder="Selecciona...">
														<option></option>
														@foreach($monedas as $row)
															<option value="{{ $row->id_moneda }}" {{ ($row->id_moneda == $form->id_moneda_origen) ? 'selected' : '' }}>
																{{ $row->desc_moneda }}
															</option>
														@endforeach
													</select>
												</div>
					                		</div>

					                		<div class="col-md-4">
												<div class="form-group">
													<label>Moneda Destino</label>
													<select class="form-control select" name="id_moneda_destino" id="id_moneda_destino" {{ $disabled['editar'] }} data-fouc data-placeholder="Selecciona...">
														<option></option>
														@foreach($monedas as $row)
															<option value="{{ $row->id_moneda }}" {{ ($row->id_moneda == $form->id_moneda_destino) ? 'selected' : '' }}>
																{{ $row->desc_moneda }}
															</option>
														@endforeach
													</select>
												</div>
					                		</div>

				                			<div class="col-md-4">
												<div class="form-group">
													<label>Factor Compra:</label>
													<input type="text" class="form-control money" name="factor_compra" name="factor_compra" value="{{ number_format($form->factor_compra, 2, '.', ',') }}" {{ $disabled['ver'] }}>
												</div>
				                			</div>

				                			<div class="col-md-4">
												<div class="form-group">
													<label>Factor Venta</label>
													<input type="text" class="form-control money" name="factor_venta" name="factor_venta" value="{{ number_format($form->factor_venta, 2, '.', ',') }}" {{ $disabled['ver'] }}>
												</div>
				                			</div>

				                			<div class="col-md-4">
												<div class="form-group">
													<label>Factor Promedio:</label>
													<input type="text" class="form-control money" name="factor_promedio" name="factor_promedio" value="{{ number_format($form->factor_promedio, 2, '.', ',') }}" {{ $disabled['ver'] }}>
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
