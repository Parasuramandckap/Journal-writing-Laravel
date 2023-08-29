<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    public function registerView(){
        return view('auth.register');
       }

    public function store(request $request){
          $request->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'password_confirmation'=> 'required|same:password|min:8'
          ] );

          $token_vaild = Str::random(64);


            $user = new User;
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->remember_token = $token_vaild;
            $user->password = Hash::make($request->input('password'));
            // $user->password_confirmation = Hash::make($request->input('password_confirmation'));

            $user->save();

            Mail::send('auth.email.register',['token_vaild'=>$token_vaild],function($message) use($request){
                $message->to($request->input('email'));
                $message->subject('Welcome to the Journals');
             });

            Auth::login($user);

            return redirect('email/verify');

       }

       public function emailVerify(request $request){

        $email_verify =  DB::table('users')
        ->where('remember_token',$request->token)
        ->first();


        if(!$email_verify){
          return back()->with('error','Invaild Token !');
        }

        else{


            User::where('remember_token',$request->token)

            ->update(['email_verified_at'=> Carbon::now()]);

            return redirect('/')->with('status','Logged Sucessfully');
        }


       }

       public function emailVerification(){
        return view('auth.emailVerify');

       }
}
