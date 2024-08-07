<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapters;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class ChaptersController extends Controller
{
    /**
     * @OA\Put(
     *     operationId="updateChapters",
     *     tags={"Chapters"},
     *     summary="Chapters - Update",
     *     description="Update data Chapters",
     *     path="/chapters/update",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request Body Description",
     *         @OA\JsonContent(
     *             example={
     *                 "id": "9",
     *                 "book_id": "2",
     *                 "title": "Bab 11:Semangat"
     *             },
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Ok",
     *         @OA\JsonContent(example={
     *             "success": true,
     *             "message": "Data berhasil diubah"
     *         }),
     *     ),
     * )
     */
    public function updateChapters(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:chapters,id',
            'book_id' => 'required|integer',
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $chapter = Chapters::where('id', $request->input('id'))->first();

        try {
            $chapter->book_id = $request->input('book_id');
            $chapter->title = $request->input('title');
            $chapter->save();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'data' => $chapter
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}