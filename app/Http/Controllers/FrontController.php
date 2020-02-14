<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use Redirect;

class FrontController extends Controller
{
    public function index()
    {
        $comments = Discussion::latest()->paginate(15);
        return view('front.index', compact(['comments']));
    }
    public function comment(Request $request){
        try{
            Discussion::create([
                'comment' => $request->comment,
                'username' => Auth::user()->name
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return Redirect::back()->withError($ex->getMessage());
        }
        return redirect('/');
    }

}
