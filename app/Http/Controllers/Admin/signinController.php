<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Movie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class signinController extends Controller
{
  
  public function signin()
  {
    return view('public.signin');
  }
  public function signup()
  {
    return view('public.signup');
  }
  // show trang home
  public function home()
  {
    $currentDate = now();
    $banner = Banner::all();
    $movies = Movie::where('status', 1)
        ->where(function ($query) use ($currentDate) {
            $query->whereNull('daterelease')
                ->orWhere('daterelease', '<=', $currentDate);
        })
        ->take(10)
        ->get();

    $coming =   Movie::where('status', 1)
        ->where('daterelease', '>', $currentDate)
        ->take(10)
        ->get();
    $recomendmovies = Movie::where('status', 1)
        ->inRandomOrder()
        ->where(function ($query) use ($currentDate) {
            $query->whereNull('daterelease')
                ->orWhere('daterelease', '<=', $currentDate);
        })
        ->take(5)
        ->get();
    return view('home.home', compact('movies', 'coming', 'recomendmovies', 'banner'));
  }
  //show trang admin
  public function adminpage()
  {
   return redirect()->route('adminpage');
  }
 
  public function checkLogin(Request $request)
  {
    
    $request->validate([
      'email' => 'required|email:filter',
      'password' => 'required'
    ]);
    if (Auth::attempt(
      [
        'email' => $request->input('email'),
        'password' => $request->input('password')
      ]
    )) {
      if (Auth::user()->role === '1') {
        return redirect()->route('adminpage')->with('success', 'login successfully');
      } else {
        return redirect()->route('home')->with('success','login successfully');
      }
    }
    return back()->with('error','login failed');
  }
  public function destroy()
  {
    Auth::logout();
    return redirect()->route('index');
  }
  public function register(Request $request)
  {
    $user = new User();
    $user->avatar = 'admin.jpg';
    $user->email = $request->email;
    $user->username = $request->username;
    $user->password = bcrypt($request->password);
    $user->role = '2';
    $user->phone = $request->phone;
    $user->save();
    return redirect()->route('signin')->with('success','register successfully');
  }
}
