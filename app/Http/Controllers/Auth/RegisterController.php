<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            //'password' => Hash::make($data['password']),
            'password' => $data['password'],
            'gender'=>$data['gender'],
            'last_name'=>$data['gender'],
            'dob'=>$data['dob'],
            'mobile'=>$data['mobile'],
            'address'=>$data['address'],
            'city'=>$data['city'],
        ]);
    }

    public function mailform() {

        return view('mailform');
        // $receiver = "ganjichinmaya5@gmail.com";
        // $subject = "Email Test via PHP using Localhost from laravel";
        // $body = "Hi, there...This is a test email send from Localhost-2.";
        // $sender = "From:orchard.training.1@gmail.com";
    
        // if(mail($receiver, $subject, $body, $sender)){
        //     echo "Email sent successfully to $receiver";
        // }else{
        //     echo "Sorry, failed while sending mail!";
        // }
    }

    public function sendmail(Request $request) {
        //dd($request->all());
        //dd($request['email']);
        //$receiver = "srihi1998@gmail.com";
        $receiver = $request['email'];
        //dd($receiver);
        //$password=123;
        $user=User::whereEmail($request->email)->first();
        //dd($user);

        if($user){
            $password = DB::table('users')->where('email', $receiver)->first()->password;
            $subject = "Forgot password";
            $body = "Hi, there...This is a test email  from EMS your password is :". $password;
            $sender = "From:orchard.training.1@gmail.com";
        
            if(mail($receiver, $subject, $body, $sender)){
                echo "Email sent successfully to $receiver";
            }else{
                echo "Sorry, failed while sending mail!";
            }
        }else{
            //echo('email does not exists');
            redirect('login')->with('error','Email doesnot Exists');
            //die();
        }
       
        //dd($password);
       
    }
}
