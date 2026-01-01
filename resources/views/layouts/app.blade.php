
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Saudi Events')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

<header class="navbar">
    <div class="nav-left">
        <div class="logo">
            <span>SE</span> Saudi Events
        </div>
    </div>

    <nav class="nav-center">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">تواصل</a>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.events.index') }}">الفعاليات</a>
                <a href="{{ route('admin.tickets.index') }}">التذاكر</a>
            @endif
        @endauth
    </nav>
    <div class="nav-right">
     @guest
        <a style="width: fit-content;" href="{{ route('login') }}" class="btn-primary h">تسجيل الدخول</a>
     @endguest

     @auth
        <div class="user-menu">
            <span class="avatar">{{ mb_substr(auth()->user()->name,0,1) }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-outline">خروج</button>
            </form>
        </div>
     @endauth
    </div>
</header>

<main class="page">
    @yield('content')
</main>
<footer class="footer">
    © {{ date('Y') }} Saudi Events — All Rights Reserved
</footer>
</body>
</html>

