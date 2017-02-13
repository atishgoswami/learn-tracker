<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    const LIMIT = 10;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::fetchNotesOfUser(Auth::id())->paginate(self::LIMIT);
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
        $this->validator(request()->all())->validate();

        $note           = new Note();
        $note->title    = request('title');
        $note->body     = request('body');
        $note->user_id  = Auth::id();
        $note->save();

        return redirect('notes');
    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {

    }

    /**
     * Show the notes index.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($noteId)
    {
        $note = Note::fetchNotesOfUser(Auth::id())->where('id', $noteId)->firstOrFail();
        return view('notes.edit', compact('note'));
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
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
    }
}
