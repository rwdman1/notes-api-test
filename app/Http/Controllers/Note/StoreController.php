<?php
//создание заметки
namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;


/**
 * @OA\Post(
 *     path="/api/notes",
 *     summary="Создать новую заметку",
 *     tags={"Notes"},
 *     operationId="storeNote",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title"},
 *             @OA\Property(property="title", type="string", maxLength=255, example="Новая заметка"),
 *             @OA\Property(property="content", type="string", example="Текст заметки", nullable=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Заметка успешно создана",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Новая заметка"),
 *                 @OA\Property(property="content", type="string", example="Текст заметки"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-21T12:00:00Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-07-21T12:00:00Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Ошибка валидации",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Не заполнен заголовок заметки"),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 @OA\Property(
 *                     property="title",
 *                     type="array",
 *                     @OA\Items(type="string", example="Поле title обязательно.")
 *                 )
 *             )
 *         )
 *     )
 * )
 */
class StoreController extends Controller
{
      public function __invoke(StoreNoteRequest $request): JsonResponse
    {
        $note = Note::create($request->validated());
        return response()->json(
            new NoteResource($note->fresh()),
            201
        );
    }
}
