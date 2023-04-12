<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- Meta Tag -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name='copyright' content=''>             
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title Tag  -->
        <title>{{env('APP_NAME')}}</title>
        <!-- Favicon -->
        <!--<link rel="icon" type="image/png" href="images/favicon.png">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url("/")}}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url("/")}}/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="{{url("/")}}/style.css?v={{version()}}" rel="stylesheet">
        <link href="{{url("/")}}/custom.css?v={{version()}}" rel="stylesheet">

        <!--Custom CSS-->
        <script>
            var globalSiteUrl = '<?php echo $path = url('/'); ?>'
            var serverEnvironment = '<?php echo env('APP_ENV'); ?>'
            var currentRouteName = '<?php echo request()->route()->getName(); ?>'
        </script>          
    </head>
    <body>

        @yield('content')


        <!-- Jquery -->
        <script src="{{url("/")}}/assets/js/jquery.min.js"></script>
        <script src="{{url("/")}}/assets/js/popper.min.js"></script>
        <script src="{{url("/")}}/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url("/")}}/assets/js/jquery.dataTables.min.js"></script>
        <script src="{{url("/")}}/assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{url("/")}}/assets/js/js.js?v={{version()}}"></script>


        <script src="{{url("/")}}/js/jquery.validate.min.js"></script>        
        <script src="{{url("/")}}/js/additional-methods.min.js"></script>  

        @yield('pagescript')
    </body>
</html>