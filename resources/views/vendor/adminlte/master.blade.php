<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/select2/css/select2.min.css') }}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        {{--  <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/jquery.dataTables.min.css') }}" />  --}}
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/buttons.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/responsive.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/dataTables.bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatables/responsive.bootstrap.min.css') }}" />
        
        
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <link rel="stylesheet" href="{{ asset('css/Gstyle.css') }}">
</head>
<body class="hold-transition @yield('body_class')">
@yield('body')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="{{ asset('vendor/adminlte/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatables/responsive.bootstrap.min.js') }}"></script>
    

    
@endif

{{--  JSPDF LIBS  --}}

    <script src="{{ asset('vendor/adminlte/vendor/jsPDF/jspdf.debug.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jsPDF/jspdf.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jsPDF/jspdf.plugin.autotable.js') }}"></script>

{{--  notificacion  --}}
  <div class="alert" id="notification-container" style="display:none;">
    <div class="notification">
        <button class="notification-close"></button>
        <div class="notification-title"><span id="titulo"></span> !</div>
        <div class="notification-message"><span id="mensaje"></span></div>
    </div>
  </div>
  

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif
{{--  bootbox lib  --}}

<script src="{{ asset('js/bootbox.min.js') }}"></script>

@yield('adminlte_js')

</body>
</html>
