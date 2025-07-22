<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateNoteRequest;

/**
 * @OA\Put(
 *     path="/api/notes/{id}",
 *     summary="Обновить заметку",
 *     tags={"Notes"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string", example="Новый заголовок"),
 *             @OA\Property(property="content", type="string", example="Обновлённый текст", nullable=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Заметка успешно обновлена",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Новый заголовок"),
 *             @OA\Property(property="content", type="string", example="Обновлённый текст"),
 *             @OA\Property(property="created_at", type="string", format="date-time"),
 *             @OA\Property(property="updated_at", type="string", format="date-time")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Заметка не найдена",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Note not found")
 *         )
 *     ),
 @OA\Response(
 *         response=422,
 *         description="Не прошел валидацию",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Note not found")
 *         )
 *     )
 * )
 */
class UpdateController extends Controller
{
    public function __invoke(UpdateNoteRequest $request, $id)
    {
		try 
		{
        $note = Note::findOrFail($id);
		}
		catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Напоминание не найдено',
            'error' => $e->getMessage()
        ], 404);
		}
		$note->update($request->validated());
        return response()->json($note);
    }
}