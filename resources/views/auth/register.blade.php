<!-- @extends('layouts.app')

@section('title', 'إنشاء حساب')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="form-box register">
        <h2>إنشاء حساب</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="الاسم الكامل" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>

            <button type="submit" class="submit-btn">تسجيل</button>
        </form>

        <p class="login-link">لديك حساب؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
    </div>
</div>
@endsection  -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-wrapper">
    <div class="form-box register">
        <h2>إنشاء حساب</h2>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <input type="text" name="name" placeholder="الاسم الكامل" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>

            <button type="submit" class="submit-btn">تسجيل</button>
        </form>

        <p class="login-link">لديك حساب؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
    </div>
</div>
</body>
</html>



