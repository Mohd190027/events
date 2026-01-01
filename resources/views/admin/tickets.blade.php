@extends('layouts.app')

@section('title','إدارة التذاكر')

@section('content')
<div class="admin-container">

    <!-- Header -->
    <div class="admin-header">
        <h1>إدارة التذاكر</h1>
        <p>إضافة وحذف التذاكر الخاصة بالفعاليات</p>
    </div>

    <!-- Create Ticket -->
    <div class="card">
        <h3>إنشاء تذكرة جديدة</h3>

        <form method="POST" action="{{ route('admin.tickets.store') }}" class="ticket-form">
            @csrf

            <div class="form-group">
                <label>اسم التذكرة</label>
                <input type="text" name="name" placeholder="VIP / عادية" required>
            </div>

            <div class="form-group">
                <label>عدد التذاكر</label>
                <input type="number" name="qty" placeholder="100" required>
            </div>

            <div class="form-group">
                <label>سعر التذكرة</label>
                <input type="number" name="price" placeholder="150" required>
            </div>

            <button class="btn btn-primary">إنشاء التذكرة</button>
        </form>
    </div>

    <!-- Tickets Table -->
    <div class="card">
        <h3>قائمة التذاكر</h3>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->qty }}</td>
                        <td>{{ $ticket->price }} ر.س</td>
                        <td>
                            <form method="POST" action="{{ route('admin.tickets.destroy',$ticket) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty">لا توجد تذاكر</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
