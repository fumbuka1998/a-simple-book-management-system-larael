<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Book_like;
use App\Models\Book_Author;
use App\Models\Comment;
use App\Models\Publisher;


class adminController extends Controller
{
    public function book(){
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.vitabu');
            }
            else
            {
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function uploadbook(Request $request)
    {
        $data = new book;
        $image=$request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('vitabuImage', $imagename);

        $data ->image=$imagename;

        $data->isbn=$request->isbn;

        $data->name=$request->name;

        $data->year=$request->year;

        $data->page=$request->page;

        $data->save();

        return redirect()->back()->with('message', 'book Added Successfully');
    }

    public function showBook(){

        $data=book::all();
        return view('admin.showBook', compact('data'));
    }

    public function deleteBook($id){

        $data=book::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book deleted Successfully');

    }

    public function updateBook($id)
    {
        $data=book::find($id);

        return view('admin.updatebook', compact('data'));
    }

    public function updateBookPost(Request $request, $id)
    {
        $data=book::find($id);

        $image=$request->file;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('vitabuImage', $imagename);

            $data ->image=$imagename;

        }

        $data->isbn=$request->isbn;

        $data->name=$request->name;

        $data->year=$request->year;

        $data->page=$request->page;

        $data->save();

        return redirect()->back()->with('message', 'book updated Successfully');


    }

    public function showAuthor()
    {

        $author = author::all();

        return view('admin.showauthor', compact('author'));
    }



    public function showComment()
    {
        $takasms = comment::all();

        return view('admin.showcomment', compact('takasms'));

    }

    public function deleteComment($id)
    {
        $text=comment::find($id);

        $text->delete();

        return redirect()->back()->with('message', 'comment deleted Successfully');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showUsers()
    {
        $leteuser = user::all();

        return view('admin.showUser', compact('leteuser'));

    }

    public function deleteUser($id)
    {
        $myuser=user::find($id);

        $myuser->delete();

        return redirect()->back()->with('message', 'user deleted Successfully');
    }

}
