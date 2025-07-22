<?php
//получить все заметки
namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	 /**
     * @OA\Get(
     *     path="/api/notes",
     *     summary="Получить список заметок",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="Список заметок"
     *     )
     * )
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return NoteResource::collection(Note::paginate($perPage));
    }
}