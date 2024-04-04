<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $user =Auth::user();

        $notes =Note::where('user_id',$user->id)->get();

        return view('front.notes.index',compact('notes'));
    }

    public function create()
    {
        return view('front.notes.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required | min:4 | max:20',
                'content' => 'required',

            ]
        );



        $note =new Note();
        $note->user_id = Auth::user()->id;
        $note->title =$request->title;
        $note->content = $request->content;
        $note->save();

        return redirect()->back()->with('success', 'Başarıyla Kaydedildi');
    }

}
