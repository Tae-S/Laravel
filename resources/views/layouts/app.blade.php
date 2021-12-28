<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <header class="nav-header">
        <ul class="nav-ul">
            <li class="nav-li nav-employees"><a href="/employees">Employees</a></li>
            <li class="nav-li nav-companies"><a href="/companies">Companies</a></li>
        </ul>
    </header>
    @yield('content')
</body>
</html>