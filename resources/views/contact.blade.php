<!-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تواصل معنا</title> -->

    <!-- ربط CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>

<div class="contact-container">
    <h1>تواصل معنا</h1>
    <p>يسعدنا تواصلك معنا، املأ النموذج بالأسفل</p> -->

    {{-- رسالة نجاح --}}
    <!-- @if(session('success'))
        <p class="success" style="display:block;">
            {{ session('success') }}
        </p>
    @endif -->

    {{-- عرض الأخطاء --}}
    <!-- @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <label>الاسم</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>البريد الإلكتروني</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>الرسالة</label>
        <textarea name="message" rows="5" required>{{ old('message') }}</textarea>

        <button type="submit">إرسال</button>
    </form>
</div>

</body>
</html> -->


