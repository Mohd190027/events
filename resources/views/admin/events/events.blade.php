@extends('layouts.app')

@section('title','إدارة الفعاليات')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin-events.css') }}">
@endsection

@section('content')

<div class="admin-page"> 

    <!-- Top Nav -->
     <div class="admin-nav">
        <a href="{{ route('home') }}">HOME</a>
        <a href="{{ route('admin.tickets') }}" class="active">Tickets</a>
    </div>

    <!-- Card -->
    <div class="event-card">

        <h2>إدارة الفعالية</h2>

        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid">
                <input type="text" name="title" placeholder="ادخل الاسم" required>
                <input type="text" name="location" placeholder="ادخل المكان" required>

                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>

                <textarea name="description" placeholder="ادخل الوصف"></textarea>

                <input type="file" name="image">
            </div>

            <div class="actions">
                <button class="btn create">إنشاء</button>
            </div>
        </form>

    </div>

    <!-- Events Table -->
    <table class="events-table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>المكان</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->location }}</td>
                <td class="controls"> -->

                    <!-- تعديل -->
                    <form method="POST" action="{{ route('admin.events.update',$event) }}">
                        @csrf
                        @method('PUT')
                        <button class="btn edit">تعديل</button>
                    </form> 

                    <!-- حذف -->
                     <form method="POST" action="{{ route('admin.events.destroy',$event) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete">حذف</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
 </div>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الفعاليات</title>
    <link rel="stylesheet" href="{{ asset('css/admin-events.css') }}">
</head>
<body>
   <div class="admin-page">

    <!-- Top Nav -->
    <div class="admin-nav">
        <a href="{{ route('home') }}">HOME</a>
        <a href="{{ route('admin.tickets') }}" class="active">Tickets</a>
    </div>

    <!-- Card -->
    <div class="event-card">

        <h2>إدارة الفعالية</h2>

        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid">
                <input type="text" name="name" placeholder="ادخل الاسم" required>
                <input type="text" name="place" placeholder="ادخل المكان" required>

                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>

                <textarea name="description" placeholder="ادخل الوصف"></textarea>

                <input type="file" name="image">
            </div>

            <div class="actions">
                <button class="btn create">إنشاء</button>
            </div>
        </form>

    </div>

    <!-- Events Table -->
    <table class="events-table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>المكان</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->location }}</td>
                <td class="controls">

                    <!-- تعديل -->
                    <form method="POST" action="{{ route('admin.events.update',$event) }}">
                        @csrf
                        @method('PUT')
                        <button class="btn edit">تعديل</button>
                    </form>

                    <!-- حذف -->
                    <form method="POST" action="{{ route('admin.events.destroy',$event) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete">حذف</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div> 
</body>
</html>