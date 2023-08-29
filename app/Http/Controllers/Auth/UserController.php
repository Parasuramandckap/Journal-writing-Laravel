<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
      public function userUpdate(request $request){


        //  dd($request);
        $firstname = $request->input('fname');

        $phone = $request->input('phone');

        $bio = $request->input('bio');

        $image = $request->input('image');



          if(User::where('id',Auth::id())->exists()){
             $users = User::where('id',Auth::id())->first();

             $users->name = $firstname;

             $users->phone = $phone;

             $users->bio = $bio;


             if($request->hasFile('image')){

                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:512',
                ]);

                $image = $request->file('image');

                $new_image = date('Y-md-d').time().".".$image->extension();

                $desination_path = public_path('/images');

                $image->move($desination_path,$new_image);

                $users->avatar = 'images/'.$new_image;

                }


             $users->update();

             return redirect()->back();

         }
      }

      public function passwordUpdate(Request $request){

         $old_password = $request->input('old_password');
         $new_password = $request->input('new_password');
         $confirm_password = $request->input('confirm_password');

        //  if(User::where('id',Auth::id())->exists()){

        //     $user = User::where('id',Auth::id())->where('password',Hash::check($request->input('old_password')))->first();

        //     dd($user);
        //  }

        $user = User::find(Auth::id());

        if (!Hash::check($request->input('old_password'),$user->password)) {
            return response()->json(['status'=>'The specified password does not match']);
            // return back()->withErrors(['The specified password does not match the database password']);
        }else {
            // write code to update password
           if($new_password != $confirm_password){

            return response()->json(['status'=>'New password does not match']);

           }
           else{
            $user->update([
                 'password'=>Hash::make($confirm_password)
            ]);

            // return response()->json(['status'=>'your password changed']);
        Mail::send('auth.passwordChanged',['password'=>'password'],function($message) use($request){
            $message->to(Auth::user()->email);
            $message->subject('DCKAP Journals');
         });
            return redirect('/')->with('status','Password has been changed');
           }



      }
}
}
