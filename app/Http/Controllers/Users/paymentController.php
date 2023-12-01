<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\MyMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\ShowSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class paymentController extends Controller
{
    public function payment(Request $request)
    {
        $data = $request->all();
        $selectedSeats = explode(',', $data['selectedSeats']);
        foreach ($selectedSeats as $seatId) {
            $showseat = ShowSeat::findOrFail($seatId);
            if ($showseat && $showseat->status === 'available') {
                $showseat->update(['status' => 'reserved']);
            } else if ($showseat && $showseat->status === 'booked') {
                return redirect()->route('index')->with('error', 'Something went wrong');
            } else {
                return back()->with('error', 'something went wrong');
            }
        }
        return view('home.user.payment', compact('data'));
    }


    public function releaseSeats(Request $request)
    {
        $selectedSeats = explode(',', $request->input('selectedSeats'));

        foreach ($selectedSeats as $seatId) {
            $showseat = ShowSeat::findOrFail($seatId);
            if ($showseat && $showseat->status === 'booked') {
                return redirect()->route('index')->with('error', 'Some seat are not available');
            } else {
                ShowSeat::where('id', $seatId)->update(['status' => 'available']);
            }
        }
        return response()->json(['message' => 'Seats released successfully'], 200);
    }

    public function ticketdetail(Request $request)
    {
        $data = $request->all();
        $seatIds = explode(',', $data['selectedSeats']);

        $booking = new Booking();
        $booking->user_id = $data['user_id'];
        $booking->show_id = $data['show_id'];
        $booking->booking_time =$booking->booking_time = now()->setTimezone('Asia/Ho_Chi_Minh');
        $booking->total_price = $data['total_price'];
        $booking->save();

        $shouldContinue = true;

        foreach ($seatIds as $seatId) {

            $existingBookingDetail = BookingDetail::where('seat_id', $seatId)->first();

            if ($existingBookingDetail) {

                $shouldContinue = false;
                break;
            }
            $bookingDetail = new BookingDetail();
            $bookingDetail->booking_id = $booking->id;
            $bookingDetail->seat_id = $seatId;
            $bookingDetail->movie_id = $data['movie_id'];
            $bookingDetail->cinema_id = $data['cinema_id'];
            $bookingDetail->theater_id = $data['theater_id'];
            $bookingDetail->show_time = $data['start_time'];
            $bookingDetail->show_price = $data['show_price'];
            $bookingDetail->save();


            ShowSeat::where('id', $seatId)->update(['status' => 'booked']);
        }

        if (!$shouldContinue) {

            $booking->delete();
            return redirect()->route('index')->with('error', 'Something went wrong');
        }
        $user_mail = $data['email'];
        Mail::to($user_mail)->send(new MyMail($data));
        return view('home.user.ticketdetail', compact('data'))->with('success', 'Book the Ticket successfully');
    }
}
