@extends('layouts.main')

@section('title', 'Módulos')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Módulos del Sistema</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <span class="breadcrumb-item active">Módulos</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper" style="padding: 20px;">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="/rh">
                            <div class="small-box rh">
                                <div class="inner">
                                    <i class="fa fa-users"></i>
                                </div>
                                <span class="small-box-footer">
                                    Recursos Humanos
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ url('pr') }}">
                            <div class="small-box pr">
                                <div class="inner">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <span class="small-box-footer">
                                    Nómina
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ url('cb') }}">
                            <div class="small-box cb">
                                <div class="inner">
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <span class="small-box-footer">
                                    Contabilidad
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ url('si') }}">
                            <div class="small-box mast">
                                <div class="inner">
                                    <i class="fa fa-gears"></i>
                                </div>
                                <span class="small-box-footer">
                                    Sistema
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection