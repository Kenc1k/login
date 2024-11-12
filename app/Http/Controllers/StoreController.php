<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function check_code(Request $request , $code)
    {
        if($request->$code == Store::where('user_id',auth()->user()->id)->first()->number){
            return redirect('dashboard');
        }else{
            return redirect('/');
        }
    }
}
