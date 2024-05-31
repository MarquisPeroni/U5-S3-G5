@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Profile</h1>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <h2>Bookings</h2>
            <div class="list-group">
                @foreach ($user->bookings as $booking)
                    <div class="list-group-item">
                        <p><strong>Activity:</strong> {{ $booking->activity->name }}</p>
                        <p><strong>Time:</strong> {{ $booking->booking_time }}</p>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Cancel Booking</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
