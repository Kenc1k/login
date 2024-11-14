<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckCodeController extends Controller
{
    public function index()
    {
        return view('check_code');
    }

    public function check_code(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
        ]);

        $userID = Auth::id();
        
        $codeVerify = Store::where('user_id', $userID)->where('number', $request->number)->first();

        if ($codeVerify) {
            $user = User::find($userID);
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('dashboard');  
        } else {
            return redirect()->route('check.code')->with('error', 'Invalid code');
        }
    }
}
