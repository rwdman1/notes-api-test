<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->only(['title', 'content']));
        return response()->json($note);
    }
}