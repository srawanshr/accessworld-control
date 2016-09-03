<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers
    {
        login as traitLogin;
        username as traitUsername;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * The field used for authentication. Default 'username'
     *
     * @var string
     */
    protected $username = 'username';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $field = filter_var($request->get('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->get('login')]);
        $this->username = $field;

        $user = User::where('email', $request->get('email'))->first();

        if ($user && $user->status == 0)
        {
            return redirect('login')->with('status', trans('activation.email', ['url' => url('/activate/email/' . $user->slug)]));
        }

        return $this->traitLogin($request);
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
}
