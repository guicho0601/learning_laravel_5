<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\FooRepositorie;
use Illuminate\Http\Request;

class FooController extends Controller {

    private $repositorie;

    private $auth;

    public function __construct(FooRepositorie $repositorie, Guard $auth){
        $this->auth = $auth;
        $this->repositorie = $repositorie;
    }

	public function foo(){
        return $this->repositorie->get();
    }

    public function login(){
        return view('login');
    }

    public function makeLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email',$request->get('email'))->first();

        if ($this->auth->loginUsingId($user->id))
        //if ($this->auth->login($user))
        {
            return redirect('articles');
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    public function logout(){
        $this->auth->logout();
        return redirect('/');
    }

}
