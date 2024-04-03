<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('front.notes.index');
    }

    public function create()
    {
        return view('front.notes.create');
    }

    public function store(Request $request)
    {

        $note =new Note();
        $note->title =$request->title;
        $note->content = $request->content;
        //users tablosundan dinamik veri çekilip selectbox ile user_id alınacak
        //$note->save();
    }

}
