<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Book_like;
use App\Models\Book_Author;
use App\Models\Comment;
use App\Models\Publisher;

class HomeController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            return view('admin.Home');
        }
        else{
            $data = book::paginate(3);
            $user=auth()->user();

            return view('User.home', compact('data'));
        }
    }

    public function index(){

        if(Auth::id())
        {
            return redirect('redirect');
        }

        else
        {

            $data = book::paginate(3);
            return view('User.home', compact('data'));
        }

    }

    public function search(Request $request)
    {
        $search =$request->search;

        if($search=='')
        {
            $data = book::paginate(3);

            return view('User.home', compact('data'));
        }

            $data=book::where('title', 'like','%'.$search.'%')->get();

            // $data = product::paginate(3);

            $user=auth()->user();

            $cart=cart::where('phone', $user->phone)->get();

            $count=cart::where('phone', $user->phone)->count();

             return view('User.home', compact('data', 'count'));

    }




    public function vitabuvyetu()
    {
        $data = book::paginate(6);
        return view('User.vitabuvyote', compact('data'));
    }


    public function homeView()
    {

        if(Auth::id())
        {
            $data = book::paginate(3);
            $user=auth()->user();

               // return view('User.home', compact('data', 'count'));
            return view('User.home', compact('data','user'));
        }

        else
        {

            $data = book::paginate(3);
            return view('User.home', compact('data','user'));
        }




    }

    public function favour()
    {
        return view('User.favourate');
    }

    public function author()
    {
        return view('User.author');
    }


    public function sendComment(Request $request)
    {
        if(Auth::user())
       {
        $coment = new comment();

        $coment->content=$request->content;



        $coment->save();

        return redirect()->back()->with('message', ' comment sent Successfully');
       }

       else{

        return redirect('login');

       }
    }


}
