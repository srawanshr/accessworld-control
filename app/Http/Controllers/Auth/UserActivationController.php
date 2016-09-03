<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ActivationCode;

class UserActivationController extends Controller {

    /**
     * Activate a user.
     *
     * @param $token
     * @return mixed
     */
    public function activate($token)
    {
        $user = User::whereActivationCode($token)->firstOrFail();

        $this->activateUser($user);

        return redirect('')->with('success', trans('messages.activation_success'));
    }

    /**
     * Send Activation Code
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function sendActivationLinkEmail(User $user)
    {
        $user->forceFill([
            'activation_code' => Str::random(60),
            'status'          => 0
        ])->save();

        $user->notify(new ActivationCode());

        return redirect()->back()->with('success', 'Activation code has been sent. Please check your email.');
    }

    /**
     * @param $user
     */
    protected function activateUser($user)
    {
        $user->forceFill([
            'activation_code' => null,
            'status'          => 1
        ])->save();

        $this->guard()->login($user);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
