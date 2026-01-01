@extends('layouts.app')
@section('title','نتائج البحث')

@section('content')

<h2 class="title">نتائج البحث</h2>

<div class="events">
    @if($events->count())
        @foreach($events as $event)
            <div class="event-card">
                <img src="{{ asset('storage/'.$event->image) }}">
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->place }}</p>
                <span>{{ $event->date_start }}</span>
            </div>
        @endforeach
    @else
        <p class="no-results">لا توجد فعاليات في هذه المنطقة</p>
    @endif
</div>

@endsection