<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <div class="container"> @yield('content') 
        <script src="{{ asset('js/app.js') }}" type="text/js"></script> 
<script>
    $(document).ready(function)){
        wwindows.setTimeout(() => {
            $(this).remove(); 
        });
        })
</script>
</body>
</html>