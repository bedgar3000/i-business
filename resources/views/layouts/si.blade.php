@extends('layouts.main')

@section('title', 'Sistema')

@section('css')
    <style>
        .navbar-dark {
            background-color: #37474F;
        }
    </style>
@endsection

@section('navbar')
    <div class="navbar navbar-expand-md navbar-light">
        <div class="text-center d-md-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"></i>
            Navigation
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('si/dashboard') }}" class="navbar-nav-link link-item" id="link-default">
                        <i class="icon-home4 mr-2"></i>
                        Escritorio
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cogs mr-2"></i>
                        Maestros del Sistema
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <i class="icon-people"></i> Personas
                        </a>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle">
                                <i class="icon-cog"></i> Configuración
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ url('si/aplicaciones') }}" class="dropdown-item link-item">Aplicaciones</a>
                                <a href="{{ url('si/parametros') }}" class="dropdown-item link-item">Parámetros</a>
                                <a href="{{ url('si/miscelaneos') }}" class="dropdown-item link-item">Misceláneos</a>
                                <a href="{{ url('si/monedas') }}" class="dropdown-item link-item">Estructura Monetaria</a>
                                <a href="{{ url('si/tipo_cambio') }}" class="dropdown-item link-item">Tipo de Cambio Diario</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle">
                                <i class="icon-office"></i> Organización
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Compañias / Empresas</a>
                                <a href="#" class="dropdown-item">Unidades de Negocio</a>
                                <a href="#" class="dropdown-item">Sucursales</a>
                                <a href="#" class="dropdown-item">Estructura Organizacional</a>
                                <a href="#" class="dropdown-item">Grupo de Centro de Costos</a>
                                <a href="#" class="dropdown-item">Centro de Costos</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle">
                                <i class="icon-map"></i> Organización Territorial
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Paises</a>
                                <a href="#" class="dropdown-item">Provincias / Estados</a>
                                <a href="#" class="dropdown-item">Departamentos / Municipios</a>
                                <a href="#" class="dropdown-item">Ciudades</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-safe mr-2"></i>
                        Administración de la Seguridad
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle">
                                <i class="icon-users"></i> Seguridad
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Maestro de Usuarios</a>
                                <a href="#" class="dropdown-item">Conceptos de Seguridad</a>
                                <a href="#" class="dropdown-item">Asignar Autorizaciones</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle">
                                <i class="icon-lock"></i> Seguridad Alterna
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Conceptos de Seguridad</a>
                                <a href="#" class="dropdown-item">Asignar Autorizaciones</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection