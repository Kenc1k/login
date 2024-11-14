<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TestController;
use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'lowercase' , 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $number = rand(1000, 10000);

        $token = "hech narsa baribir ishlamadi";

        $data = [
            'mobile_phone' =>$user->phone,
            'message' => 'Test uchun tasdiqlash codi: ' .   $code,
            'from' =>4546,
            'call_back' => 'http://127.0.0.1:3232/dashboard',
        ];
        
        $response = Http::withToken($token)->post('notify.eskis.uz/api/message/sms/send' , $data);


        // Store::create(['user_id'=>Auth::user()->id,'number'=>$number]);

        // TestController::get_code(Auth::user()->id,[$number]);

        return redirect(route('check.code', absolute: false));
    }


}
