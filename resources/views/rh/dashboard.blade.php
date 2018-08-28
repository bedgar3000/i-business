@extends('layouts.app')

@section('title', 'Recursos Humanos')

@section('stylesheet')
    <style>
        .navbar-inverse {
            background-color: #357CA5;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <app></app>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let modulo = 'rh';
    </script>
@endsection
