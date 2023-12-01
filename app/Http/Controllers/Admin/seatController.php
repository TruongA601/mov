<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class seatController extends Controller
{
  
    public function updateSeats(Request $request)
    {
        $selectedSeatIds = explode(',', $request->input('selectedSeats'));
        $newStatus = $request->input('newStatus');
        Seat::whereIn('id', $selectedSeatIds)->update(['status' => $newStatus]);
        return back()->with('success', 'Trạng thái ghế đã được cập nhật.');
    }
}
