@extends('layouts.app')

@section('title', 'Contabilidad')

@section('stylesheet')
    <style>
        .navbar-inverse {
            background-color: #00A65A;
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
        let modulo = 'cb';
    </script>
@endsection
