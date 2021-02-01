<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('admin.index', $data);
    }

    public function profile() {
        return view('admin.profile');
    }

    public function generateToken() {
        $api_token = Str::random(60);
        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();
        return redirect()->route('admin.index');
    }
}
