<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class bannerController extends Controller
{
    public function banner()
    {
        $banners = Banner::all();
        return view('admin.banners.banner', compact('banners'));
    }
    public function edit($id)
    {
        $banners = Banner::where('id', $id)->get();
        return view('admin.banners.edit', compact('banners'));
    }
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
    
        if ($request->hasFile('image')) {
         
            if ($banner->image) {
                $imagePath = public_path('uploads/banners/') . $banner->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
           
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/banners'), $imageName);
    
          
            $banner->image = $imageName;
        }
    
        $banner->save();
    
        return redirect()->route('show-banner')->with('success', 'Banner updated successfully');
    }
    
    public function create()
    {
        return view('admin.banners.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/banners'), $imageName);
        } else {
            $imageName = null;
        }
        $image = new Banner;
        $image->image = $imageName;
        $image->save();
        return redirect()->route('show-banner')->with('success', 'banner created successfully');
    }

    public function delete($id)
    {
        $banner = Banner::where('id', $id)->first();
        $imageDirectory = 'uploads/banners/';
        File::delete($imageDirectory . $banner->image);
        $banner->delete();
    }
}
