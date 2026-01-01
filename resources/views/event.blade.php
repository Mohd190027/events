@extends('layouts.app')

@section('content')

<div class="event-details">
    <img src="{{ asset('storage/'.$event->image) }}" class="event-image">

    <h1>{{ $event->name }}</h1>

    <p><strong>المكان:</strong> {{ $event->place }}</p>
    <p><strong>التاريخ:</strong> {{ $event->date_start }} - {{ $event->date_end }}</p>

    <p>{{ $event->description }}</p>

    @auth
        <button class="btn">حجز تذكرة</button>
    @else
        <a href="/login" class="btn">سجّل الدخول للحجز</a>
    @endauth
</div>

@endsec