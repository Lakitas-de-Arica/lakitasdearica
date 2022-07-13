<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Auth\RegisterInterface;
use App\Contracts\User\UserAddressInterface;

class RegisterController extends Controller
{
    protected $redirectTo = '/';
    protected $registerService;
    protected $userAddressService;

    public function __construct(RegisterInterface $registerService)
    {
        $this->middleware('guest');
        $this->registerService = $registerService;
    }

    public function getRegister()
    {
        return view('frontend.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->registerService->register($request->all());

        Auth::login($user);

        return redirect()->route('home');

        /*
        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with([
            'register' => true
        ]);
        */
    }
}
