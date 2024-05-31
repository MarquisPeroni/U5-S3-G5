@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{ $activity->name }}</h1>
            <p>{{ $activity->description }}</p>
            <form action="{{ route('bookings.store', $activity) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="booking_time">Booking Time</label>
                    <input type="datetime-local" id="booking_time" name="booking_time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Book</button>
            </form>
        </div>
    </div>
@endsection
