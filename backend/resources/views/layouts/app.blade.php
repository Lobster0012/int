<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="index">
<header>
      <div class="header">
        <div class="">ЛОГО</div>
        <div class="">
          <a class="menu_item_active" href="/">ГЛАВНАЯ</a>
          <a class="" href="{{route('events.index')}}">СОБЫТИЯ</a>
        </div>
        <div class="">
          <a class="" href="{{route('buyRequest.index')}}">КОИНЫ</a>
<<<<<<< HEAD
        <p class="PC" id="PC">ЛИЧНЫЙ КАБИНЕТ</p>
=======
 <a href="{{ route('user.show') }}">ЛИЧНЫЙ КАБИНЕТ</a>
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
    
        </div>
      </div>
    </header>
    <main>
    @yield('content')
    </main> 
    <footer>
        <ul>
          <h1>footer</h1>
            <li><a href='/'>главная</a></li>
            <li><a href={{route('user.show')}}>ЛК</a></li>
            <li><a href={{route('events.index')}}>события и задания</a></li>
            <li><a href={{route('admin.index')}}>админка</a></li>
        </ul> 
    </footer>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>