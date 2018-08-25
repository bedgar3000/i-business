@extends('layouts.app')

@section('body')
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand wmin-0 mr-5">
            <a href="{{ url('/') }}" class="d-inline-block">
                <img src="{{ asset('img/logo-light.png') }}" alt="">
            </a>
        </div>
        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <span class="navbar-text ml-md-3 mr-md-auto">
            </span>
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ auth()->user()->imagen ? asset('uploads/usuarios/'.auth()->user()->imagen) : asset('img/avatar-light.png') }}" class="rounded-circle" alt="">
                        <span>{{ auth()->user()->usuario }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Mi cuenta</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Mensajes <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            class="dropdown-item"
                            onclick = "event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i> Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->

    <!-- Secondary navbar -->
    @yield('navbar')
    <!-- /secondary navbar -->

    <div id="content">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('includes.footer')
    <!-- /footer -->
@endsection