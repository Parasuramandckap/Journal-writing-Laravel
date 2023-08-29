<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Share;
use Illuminate\Support\Facades\Mail;

class SharedController extends Controller
{
    public $email_id;

    public function index(){


        $sharedItems = Share::select('users.name','posts.content','posts.title')
         ->join('users','users.id','=','shares.user_id')
         ->join('posts','posts.id','=','shares.content_id')
         ->where('shares.share_id',Auth::id())->get();

        return view('frontend.shared',compact('sharedItems'));
    }


    public function shareStore(request $request){



        $emailCheck = $request->input('email');

        $post_id = $request->input('post_id');

        $email_id = User::where('email', $emailCheck)->first();


        if($email_id === NULL){
        Mail::send('auth.shareEmail',['post_id'=>$post_id,'email_id'=>$email_id],function($message) use($request){
            $message->to($request->input('email'));
            $message->subject('Journals');
         });

         return response()->json('nook');

        }

        else if($email_id != NULL){

        $shared_id = User::where('email', $emailCheck)->first()->id;

        $access = $request->input('access');

       if($shared_id != Auth::id()){
         $request->validate([
            'email'=>'required'
          ]);
            $share = new Share;
            $share->content_id = $post_id;
            $share->user_id = Auth::id();
            $share->share_id = $shared_id;
            $share->access = $access;


         $post  = Share::select('users.name','posts.content','posts.title')
                    ->join('users','shares.share_id','=',$shared_id)
                    ->join('posts','shares.content_id','=',$post_id)
                    ->where('shares.user_id',Auth::id())
                    ->get();
        // SELECT users.name,posts.content from shares join users on shares.share_id = users.id join posts on shares.content_id = posts.id where shares.user_id = ;


        Mail::send('auth.shareEmail',['post_id'=>$post_id,'email_id'=>$email_id],function($message) use($request){
            $message->to($request->input('email'));
            $message->subject('Journals');
         });

            $share->save();




            return response()->json('ok');

        // }
    }

        // else{
        // return response()->json(['status'=>'This Jorunal Cannot share yourself']);
        // }
    }
    }
}
