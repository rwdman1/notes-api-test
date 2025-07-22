<?php
//вывод одной заметки
namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/notes/{id}",
 *     summary="Получить заметку по ID",
 *     tags={"Notes"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Данные заметки",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Пример заголовка"),
 *             @OA\Property(property="content", type="string", example="Текст заметки"),
 *             @OA\Property(property="created_at", type="string", format="date-time"),
 *             @OA\Property(property="updated_at", type="string", format="date-time")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Не найдено",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Note not found")
 *         )
 *     )
 * )
 */
class ShowController extends Controller
{
	public function __invoke($id): JsonResponse
    {
        $note = Note::find($id);
        
        if (!$note) {
            return response()->json([
                'message' => 'Не найдено'
            ], 404);
        }

        return response()->json($note);
    }
}
