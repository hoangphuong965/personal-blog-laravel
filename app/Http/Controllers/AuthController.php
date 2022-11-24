<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        if (Auth::check()) {
            return view('home');
        }
        return view('front.login');
    }

    public function login_submit(Request $request, LoginRequest $loginRequest)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (!$this->userRepository->login($data)) {
            return redirect()->route('login')->with('error', 'Email ' . $request->email . ' not found');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
