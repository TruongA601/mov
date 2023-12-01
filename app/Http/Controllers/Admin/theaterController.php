<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\theater;
use App\Models\Province;
use App\Models\Seat;
use App\Models\cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

use function PHPUnit\Framework\throwException;

class theaterController extends Controller
{
    public function theater()
    {
        $cinema = Cinema::all();
        $theater = Theater::all();
        return view('admin.theater.theater', compact('cinema', 'theater'));
    }
    public function getcinema($provinceID)
    {
        $cinemas = cinema::where('province', $provinceID)->get();
        return response()->json($cinemas);
    }
    public function gettheater($cinemasID)
    {
        $theaters = theater::where('cinema_id', $cinemasID)->get();
        return response()->json($theaters);
    }
    public function showcreate()
    {
        $province = Province::all();
        return view('admin.theater.add', compact('province'));
    }
    public function create(Request $request)
    {
        try {
            $seatCount = $request->totalseat;
            $theater = Theater::create([
                'name' => $request->name,
                'cinema_id' => $request->cinema,
                'totalSeats' => $seatCount,
            ]);
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $rows = ceil($seatCount / 15);
            $columns = 15;
    
            for ($i = 0; $i < $rows; $i++) {
                for ($col = 1; $col <= $columns; $col++) {
                    Seat::create([
                        'theater_id' => $theater->id,
                        'seatRow' => $alphabet[$i],
                        'seatColumn' => $col,
                       
                    ]);
                }
            }
            return redirect()->route('theater')->with('success', 'Thêm thành công');
        } catch (Throwable) {
            return redirect()->route('theater')->with('error', 'Thêm mới thất bại');
        }
    }

    public function showedit($id)
    {
        $theater = Theater::where('id', $id)->get();
        $seat = Seat::where('theater_id', $id)->get();
        return view('admin.theater.update', compact('theater',  'seat'));
    }
    public function edit(Request $request, $id)
    {
        try {
            $theater = Theater::findOrFail($id);
            $seatCount = $request->totalseat;
            $theater->name = $request->name;
            $theater->totalSeats = $seatCount;
            $theater->save();
            Seat::where('theater_id', $theater->id)->delete();
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $rows = ceil($seatCount / 15);
            $columns = 15;
    
            for ($i = 0; $i < $rows; $i++) {
                for ($col = 1; $col <= $columns; $col++) {
                    Seat::create([
                        'theater_id' => $theater->id,
                        'seatRow' => $alphabet[$i],
                        'seatColumn' => $col,
                       
                    ]);
                }
            }
            return back()->with('success', 'Cập nhật thành công');
        } catch (Throwable) {
            return back()->with('error', 'Cập nhật thất bại');
        }
    }
    public function delete($id)
    {
        DB::table('seats')->where('theater_id', $id)->delete();
        DB::table('theaters')->where('id', $id)->delete();
    }
}
