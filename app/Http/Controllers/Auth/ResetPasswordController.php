<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Contracts\Auth\ResetPasswordInterface;

class ResetPasswordController extends Controller
{
    protected $resetPasswordService;

    public function __construct(ResetPasswordInterface $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function getPasswordEmail()
    {
        return view('frontend.auth.password.email');
    }

    public function getResetPassword($token)
    {
        return view('frontend.auth.password.reset', ['token' => $token]);
    }

    /**
     * Envía email para reestablecer la contraseña del usuario.
     *
     * @param ForgotPasswordRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = $this->resetPasswordService->sendResetLink( $request->only('email') );

        $response = $this->resetPasswordService->reponseStatusResetLink($status);

        return view('frontend.auth.password.email')
                ->with('result',$response);
    }

    /**
     * Reestablecer la contraseña del usuario.
     *
     * @param ResetPasswordRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = $this->resetPasswordService->resetPassword(
            $request->only('email', 'password', 'password_confirmation', 'token')
        );

        $response = $this->resetPasswordService->reponseStatusResetPassword($status);

        return view('frontend.auth.password.email')
                ->with('result',$response);
    }
}
