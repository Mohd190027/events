

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-wrapper">
    <div class="form-box login">
        <h2>تسجيل الدخول</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>

            @if($errors->any())
                <span class="error-msg">بيانات الدخول غير صحيحة</span>
            @endif

            <button type="submit" class="submit-btn">دخول</button>
        </form>

        <p class="signup-link">ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب</a></p>
    </div>
</div>
</body>
</html> 


