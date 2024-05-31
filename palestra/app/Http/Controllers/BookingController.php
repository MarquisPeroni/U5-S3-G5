<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, Activity $activity)
    {
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->activity_id = $activity->id;
        $booking->booking_time = $request->booking_time;
        $booking->save();

        return redirect()->route('activities.index')->with('success', 'Booking successful!');
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        $booking->delete();
        return redirect()->route('activities.index')->with('success', 'Booking cancelled!');
    }
}

