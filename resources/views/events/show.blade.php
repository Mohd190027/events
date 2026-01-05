@extends('layouts.app')

@section('title', $event->name)

@section('content')

<section class="event-details">

    <!-- Top Bar -->
    <!-- <div class="event-top">
        <a href="{{ url()->previous() }}" class="btn-outline">⬅ رجوع</a>

        <a href="{{ route('login') }}" class="btn-outline">تسجيل الدخول</a>
    </div> -->

    <!-- Image -->
    <div class="event-image">
        <img class="" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}">
    </div>

    <!-- Content -->
    <div class="event-body">
        <h1 class="event-title">{{ $event->name }}</h1>

        <div class="event-meta">
            <p>📍 {{ $event->place }}</p>
            <p>📅 من {{ $event->date_start }} إلى {{ $event->date_end }}</p>
            <p>🏷 {{ $event->category }}</p>
        </div>

        <p class="event-description">
            {{ $event->description }}
        </p>

        <!-- Ticket Button -->
        <div class="ticket-action">
            @auth
                <form method="POST" action="{{ route('tickets.store', $event) }}">
                    @csrf
                    <button type="submit" class="btn-primary">🎟 حجز تذكرة</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-primary">
                    🎟 حجز تذكرة
                </a>
            @endauth
        </div>

    </div>

</section>

@endsection

