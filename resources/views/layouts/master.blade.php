<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="description" content="Smarthr - Bootstrap Admin Template">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Task Board - HRMS admin template</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets\css\font-awesome.min.css">
        
        <!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets\css\line-awesome.min.css">
        
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="assets\css\select2.min.css">
        
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="assets\css\bootstrap-datetimepicker.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets\css\style.css">
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div id="app" class="">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
