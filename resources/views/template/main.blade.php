<<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('page_title')
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>
<body>
    
    @yield('navbar')

    <main>
        @yield('content')
    </main>

    @yield('footer')
</body>
</html>