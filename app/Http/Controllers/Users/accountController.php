<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class accountController extends Controller
{
    public function useraccount()
    {
        $userid = Auth::user()->id;
        $booking = DB::table('bookings')
            ->join('booking_detail', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('movies', 'booking_detail.movie_id', '=', 'movies.id')
            ->select('bookings.id as booking_id', 'movies.name as movie_name', 'bookings.show_id as show_id', 'bookings.booking_time as booking_time', 'bookings.total_price as total_price', 'booking_detail.show_time as show_time')
            ->where('bookings.user_id', $userid)
            ->distinct('bookings.id')
            ->orderBy('booking_time', 'DESC')
            ->get();
    
        return view('home.user.account', compact('booking'));
    }
    

    public function update($id, Request $request)
    {

        $data = $request->all();
        $user = User::find($id);

        if ($request->hasFile('avatar')) {
            $destination = public_path('uploads/avatars/' . $user->avatar);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $avatarname = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads/avatars'), $avatarname);
            $user->avatar = $avatarname;
        }

        if (!empty($data['password'])) {
            if ($data['password'] === $data['old_password']) {
                $user->update([
                    'username' => $data['username'],

                    'phone' => $data['phone']
                ]);
            } else {
                $user->update([
                    'username' => $data['username'],
                    'password' => bcrypt($data['password']),
                    'phone' => $data['phone']
                ]);
            }
        } else {
            $user->update([
                'username' => $data['username'],

                'phone' => $data['phone']
            ]);
        }

        return back()->with('success', 'User successfully updated');
    }

    public function bookingdetail($id)
    {
        $data = DB::table('bookings')->join('booking_detail', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('movies', 'movies.id', '=', 'booking_detail.movie_id')
            ->join('cinemas', 'cinemas.id', '=', 'booking_detail.cinema_id')
            ->join('shows', 'shows.id', '=', 'bookings.show_id')
            ->join('theaters', 'theaters.id', '=', 'booking_detail.theater_id')
            ->select(
                'movies.name as movie_name',
                'theaters.name as theater_name',
                'cinemas.name as cinema_name',
                'bookings.booking_time as booking_time',
                'bookings.total_price as total_price',
                'shows.date_show as date_show',
                'shows.start_time as start_time'
            )
            ->where('bookings.id', $id)->first();
        $seat = DB::table('booking_detail')->join('bookings', 'bookings.id', '=', 'booking_detail.booking_id')
            ->join('show_seat', 'show_seat.id', '=', 'booking_detail.seat_id')
            ->join('seats', 'seats.id', '=', 'show_seat.seat_id')
            ->select('booking_detail.seat_id as seat_id', 'seats.seatRow as seat_row', 'seats.seatColumn as seat_column')
            ->where('bookings.id', $id)
            ->get();
        return view('home.user.bookingdetail', compact('data','seat'));
    }
    public function bookingdelete($id)
    {
        
    }
}
