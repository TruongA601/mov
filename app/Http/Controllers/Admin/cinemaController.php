<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Cinema;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class cinemaController extends Controller
{
    public function cinemas()
    {
        $cinemas = Cinema::all();
        $data = DB::table('cinemas')
            ->join('provinces', 'cinemas.province', '=', 'provinces.id')
            ->join('districts', 'cinemas.district', '=', 'districts.id')
            ->join('wards', 'cinemas.ward', '=', 'wards.id')
            ->select('cinemas.id', 'provinces.name as proname', 'districts.name as disname', 'wards.name as waname')
            ->get()
            ->groupBy('id');
        return view('admin/cinemas/cinema', compact('cinemas', 'data'));
    }
    public function getDistrict($provinceID)
    {
        $districts = District::where('province_id', $provinceID)->get();
        return response()->json($districts);
    }
    public function getWard($districtId)
    {
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json($wards);
    }

    public function viewupdate($id)
    {
        $cinemas = cinema::where('id', $id)->get();
        $province = Province::all();
        $district = District::all();
        $ward = Ward::all();
        return view('admin.cinemas.update', compact('cinemas', 'province', 'district', 'ward'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);
        $cinemas = cinema::find($id);
        if ($request->hasFile('logo')) {
            $destination = 'public/uploads/cinemas/' . $cinemas->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $imageName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/cinemas'), $imageName);
            $cinemas->logo = $imageName;
        }
        $data = $request->all();
        $cinemas->update([
            'name' => $data['name'],
            'province' => $data['province'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'location' => $data['location'],

        ]);
        return redirect()->route('cinemas')->with('success', 'successfully updated');
    }

    public function viewadd()
    {
        $province = Province::all();
        return view('admin.cinemas.add', compact('province'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('uploads/cinemas'), $imageName);
        $cinemas = new cinema();
        $cinemas->name = $request->name;
        $cinemas->logo = $imageName;
        $cinemas->province = $request->province;
        $cinemas->district = $request->district;
        $cinemas->ward = $request->ward;
        $cinemas->location = $request->location;
        $cinemas->save();
        return redirect()->route('cinemas')->with('success', 'Thêm thành công');
    }
    public function delete($id)
    {
        $cinema = Cinema::where('id', $id)->first();
        // $imageDirectory = 'uploads/cinemas/';
        // File::delete($imageDirectory . $cinema->logo);
        $cinema->delete();
    }
}
