 @extends('layouts.app')

@section('title','إدارة الفعاليات')
@section('styles')
<!-- <link rel="stylesheet" href="{{ asset('css/admin-events.css') }}"> -->
@endsection

@section('content')
<div class="admin-page">

    <!-- Card: إنشاء / تعديل -->
     <div class="event-card">
        <h2>{{ $editEvent ?? false ? 'تعديل الفعالية' : 'إنشاء فعالية جديدة' }}</h2>

        <form method="POST" 
              action="{{ $editEvent ?? false ? route('admin.events.update', $editEvent) : route('admin.events.store') }}" 
              enctype="multipart/form-data">
            
            @csrf
            @if($editEvent ?? false)
                @method('PUT')
            @endif

            <div class="grid">
                <input type="text" name="name" value="{{ old('name', $editEvent->name ?? '') }}" placeholder="اسم الفعالية" required>
                <input type="text" name="place" value="{{ old('place', $editEvent->place ?? '') }}" placeholder="المكان" required>
                <textarea name="description" placeholder="الوصف">{{ old('description', $editEvent->description ?? '') }}</textarea>
                <input type="date" name="date_start" value="{{ old('date_start', $editEvent->date_start ?? '') }}" required>
                <input type="date" name="date_end" value="{{ old('date_end', $editEvent->date_end ?? '') }}" required>
                <!-- <input type="text" name="place" value="{{ old('place', $editEvent->place ?? '') }}" placeholder="المكان" required> -->
                <input type="number" name="qty_tick" value="{{ old('qty_tick', $editEvent->qty_tick ?? '') }}" placeholder="عدد التذاكر">
                <input type="file" name="image">
            </div>

            <div class="actions">
                <button class="btn {{ $editEvent ?? false ? 'edit' : 'create' }}">
                    {{ $editEvent ?? false ? 'تحديث' : 'إنشاء' }}
                </button>
                @if($editEvent ?? false)
                    <a href="{{ route('admin.events.index') }}" class="btn cancel">إلغاء</a>
                @endif
            </div>
        </form>
    </div> 

    <!-- جدول الفعاليات -->
     <table class="events-table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>المكان</th>
                <th>تاريخ البداية</th>
                <th>تاريخ النهاية</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->place }}</td>
                <td>{{ $event->date_start }}</td>
                <td>{{ $event->date_end }}</td>
                <td class="controls">
                    <a href="{{ route('admin.events.index', ['edit'=>$event->id]) }}" class="btn edit">تعديل</a>
                    <form method="POST" action="{{ route('admin.events.destroy',$event) }}" style="display:inline-block;">
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
@endsection 

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الفعاليات</title>
    <link rel="stylesheet" href="{{ asset('css/admin-events.css') }}">
</head>
<body>
   <div class="admin-page"> -->

    <!-- Card: إنشاء / تعديل -->
    <!-- <div class="event-card">
        <h2>{{ $editEvent ?? false ? 'تعديل الفعالية' : 'إنشاء فعالية جديدة' }}</h2>

        <form method="POST" 
              action="{{ $editEvent ?? false ? route('admin.events.update', $editEvent) : route('admin.events.store') }}" 
              enctype="multipart/form-data">
            
            @csrf
            @if($editEvent ?? false)
                @method('PUT')
            @endif

            <div class="grid">
                <input type="text" name="name" value="{{ old('name', $editEvent->name ?? '') }}" placeholder="اسم الفعالية" required>
                <textarea name="description" placeholder="الوصف">{{ old('description', $editEvent->description ?? '') }}</textarea>
                <input type="date" name="date_start" value="{{ old('date_start', $editEvent->date_start ?? '') }}" required>
                <input type="date" name="date_end" value="{{ old('date_end', $editEvent->date_end ?? '') }}" required>
                <input type="text" name="place" value="{{ old('place', $editEvent->place ?? '') }}" placeholder="المكان" required>
                <input type="number" name="qty_tick" value="{{ old('qty_tick', $editEvent->qty_tick ?? '') }}" placeholder="عدد التذاكر">
                <input type="file" name="image">
            </div>

            <div class="actions">
                <button class="btn {{ $editEvent ?? false ? 'edit' : 'create' }}">
                    {{ $editEvent ?? false ? 'تحديث' : 'إنشاء' }}
                </button>
                @if($editEvent ?? false)
                    <a href="{{ route('admin.events.index') }}" class="btn cancel">إلغاء</a>
                @endif
            </div>
        </form>
    </div> -->

    <!-- جدول الفعاليات -->
    <!-- <table class="events-table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>المكان</th>
                <th>تاريخ البداية</th>
                <th>تاريخ النهاية</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->place }}</td>
                <td>{{ $event->date_start }}</td>
                <td>{{ $event->date_end }}</td>
                <td class="controls">
                    <a href="{{ route('admin.events.index', ['edit'=>$event->id]) }}" class="btn edit">تعديل</a>
                    <form method="POST" action="{{ route('admin.events.destroy',$event) }}" style="display:inline-block;">
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
</html> -->
