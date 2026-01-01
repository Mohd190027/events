@extends('layouts.app')

@section('title', 'نتائج البحث')

@section('content')

<h1 class="title">نتائج البحث</h1>

<section class="events">
    @forelse($events as $event)
        <div class="event-card" onclick="goToEvent({{ $event->id }})">
            <img src="{{ asset('storage/' . $event->image) }}">
            <h4>{{ $event->name }}</h4>
            <p>{{ $event->place }}</p>
        </div>
    @empty
        <p style="text-align:center">لا توجد فعاليات في هذه المنطقة</p>
    @endforelse
</section>

@endsection
