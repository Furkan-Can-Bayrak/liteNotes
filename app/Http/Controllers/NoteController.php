<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id',Auth::user()->id)->latest('updated_at')->paginate(2);

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
                'content' => 'required | min:12',

            ],[
                'title.required' => 'Başlık alanı boş olamaz',
                'title.min' => 'Başlık 4 karakterden kısa olamaz',
                'content.min' => 'İçerik 12 karakterden uzun olmalıdır'
            ]
        );



        $note =new Note();
        $note->user_id = Auth::user()->id;
        $note->title =$request->title;
        $note->content = $request->content;
        $note->uuid = Str::uuid();
        $note->save();

        return redirect()->back()->with('success', 'Başarıyla Kaydedildi');
    }


    public function show($uuid)
    {
        $note = Note::where('uuid',$uuid)->first();

        if ($note->user_id != Auth::user()->id){
            return redirect()->back();
        }

        return view('front.notes.show',compact('note'));
    }

    public function update($id)
    {
        $note = Note::find($id);
        return view('front.notes.updateNoParam',compact('note'));
    }

    public function edit(Request $request,$id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'min:10'
        ]);

        $note = Note::find($id);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return redirect()->route('indexNote')->with('success','Güncelleme işlemi başarılı');

    }
    public function editNoParameter(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'min:10',
            'note_id' => 'required'
        ]);

        $note =Note::find($request->note_id);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return redirect()->route('indexNote')->with('success','Güncelleme işlemi başarılı');
    }

}
