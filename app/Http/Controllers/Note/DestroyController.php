<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


/**
 * @OA\Delete(
 *     path="/api/notes/{id}",
 *     summary="Удалить заметку",
 *     tags={"Notes"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID заметки",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=200, description="Заметка удалена"),
 *     @OA\Response(response=404, description="Заметка не найдена"),
 *     @OA\Response(response=500, description="Ошибка сервера")
 * )
 */
class DestroyController extends Controller
{
    public function __invoke(Note $Note): JsonResponse
    {
		
	    try 
		{
        $Note->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Note deleted successfully'
        ]);
        
		} catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Ошибка удаления напоминания',
            'error' => $e->getMessage()
        ], 500);
		}
    }
}
