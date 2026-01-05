 @extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')

  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}">  -->

  <!-- <h1 class="title">فعاليات المملكة العربية السعودية</h1>  -->
  <h1 class="title"> 
    <span>فعاليات المملكة العربية السعودية</span>
  </h1> 


   <!-- Search  -->
 <form class="search-box" action="{{ route('events.search') }}" method="GET">
    <input
        type="text"
        name="place"
        placeholder="اكتب المنطقة أو اسم الفعالية"
        required
    >
    <button type="submit">بحث</button>
 </form>

  <!-- Events   -->
 <!-- <section class="events">
      @foreach($events as $event)
         <div class="event-card" onclick="goToEvent({{ $event->id }})">

              <img
                 src="{{ asset('storage/' . $event->image) }}"
                 alt="{{ $event->name }}"
                 style="width:100%;height:100%;object-fit:cover;border-radius:18px;"
                >

              <div style="padding:10px">
                  <h4 style="color:#D4AF37">{{ $event->name }}</h4>
                  <p>📍 {{ $event->place }}</p>
                  <p>📅 {{ $event->date_start }}</p>
              </div>

         </div>
     @endforeach
  </section> -->

  <section class="events">
    @foreach($events as $event)
        <a href="{{ route('events.show', $event) }}" class="event-card">

            <img class="event-image"
            style="object-fit: cover; box-shadow: 0px 0px 0px 0px; border-radius: 20px;"
                src="{{ asset('storage/' . $event->image) }}"
                alt="{{ $event->name }}"
            >

            <div class="event-info">
                <h4>{{ $event->name }}</h4>
                <p>📍 {{ $event->place }}</p>
                <p>📅 {{ $event->date_start }}</p>
            </div>

        </a>
    @endforeach
</section>


@endsection
