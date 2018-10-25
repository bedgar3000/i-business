<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }} - @yield('title')</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/layout.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/components.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('limitless/css/colors.min.css') }}" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <link href="{{ asset('vendor/material-loading/material-loading.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css?'.date('YmdHis')) }}" rel="stylesheet" type="text/css">

        @yield('css')
    </head>
    <body class="@yield('body-class')">
        @yield('body')

        <!-- Remote source -->
        <button style="display: none;" type="button" data-toggle="modal" data-target="#modal_remote"></button>
        <div id="modal_remote" class="modal" tabindex="-1" data-url="" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-grey-300">
                        <h5 class="modal-title">Remote source 1</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <button style="display: none;" type="button" data-toggle="modal" data-target="#modal_remote-xs"></button>
        <div id="modal_remote-xs" class="modal" tabindex="-1" data-url="" data-backdrop="false">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header bg-grey-300">
                        <h5 class="modal-title">Remote source 2</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <button style="display: none;" type="button" data-toggle="modal" data-target="#modal_remote-sm"></button>
        <div id="modal_remote-sm" class="modal" tabindex="-1" data-url="" data-backdrop="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-grey-300">
                        <h5 class="modal-title">Remote source 3</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <button style="display: none;" type="button" data-toggle="modal" data-target="#modal_remote-lg"></button>
        <div id="modal_remote-lg" class="modal" tabindex="-1" data-url="" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-grey-300">
                        <h5 class="modal-title">Remote source 4</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <button style="display: none;" type="button" data-toggle="modal" data-target="#modal_remote-full"></button>
        <div id="modal_remote-full" class="modal" tabindex="-1" data-url="" data-backdrop="false">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header bg-grey-300">
                        <h5 class="modal-title">Remote source 5</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
        <!-- /remote source -->

        <!-- Core JS files -->
        <script src="{{ asset('limitless/js/main/jquery.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/main/bootstrap.bundle.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/loaders/blockui.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/ui/slinky.min.js?'.date('YmdHis')) }}"></script>
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script src="{{ asset('limitless/js/plugins/visualization/d3/d3.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/visualization/d3/d3_tooltip.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/extensions/jquery_ui/core.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/inputs/inputmask.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/tags/tagsinput.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/tags/tokenfield.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/inputs/touchspin.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/inputs/maxlength.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/inputs/formatter.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/ui/moment/moment.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/daterangepicker.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/notifications/pnotify.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/ui/moment/moment.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/daterangepicker.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/anytime.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/pickadate/picker.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/pickadate/picker.date.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/pickadate/picker.time.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/pickers/pickadate/legacy.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('limitless/js/plugins/notifications/jgrowl.min.js?'.date('YmdHis')) }}"></script>
        
        <script src="{{ asset('limitless/js/app.js?'.date('YmdHis')) }}"></script>
        <!-- /theme JS files -->

        <script src="{{ asset('vendor/axios/axios.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('vendor/material-loading/material-loading.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('vendor/numeral/numeral.min.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('vendor/jquery.serializejson/jquery.serializejson.js?'.date('YmdHis')) }}"></script>

        <script src="{{ asset('js/constantes.js?'.date('YmdHis')) }}"></script>
        <script src="{{ asset('js/app.js?'.date('YmdHis')) }}"></script>

        @yield('js')
    </body>
</html>