<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * @OA\Get(
     *     path="/books",
     *     tags={"Books"},
     *     operationId="listBooks",
     *     summary="Get All Books",
     *     description="Retrieve all Books data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil Mengambil Data Books",
     *                 "data": {
     *                     {
     *                         "id": "1",
     *                         "title": "Bersamamu",
     *                         "author": "Dina",
     *                         "years": "2024"
     *                     }
     *                 }
     *             }
     *         )
     *     )
     * )
     */
    public function listBooks()
    {
        try {
            $success = true;
            $message = 'Berhasil Mengambil Data Books';
            $data = Books::all();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'data' => $data
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mengambil Data Books',
                'data' => []
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/books/{id}",
     *     tags={"Books"},
     *     operationId="listBooksById",
     *     summary="Books Get By ID",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         description="ID Books",
     *         example="1",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil mengambil Data Books",
     *                 "data": {
     *                         "id": "1",
     *                         "title": "Bersamamu",
     *                         "author": "Dina",
     *                         "years": "2024"
     *                 }
     *             }
     *         )
     *     )
     * )
     */
    public function listBooksById($id)
    {
        try {
            $success = true;
            $message = 'Berhasil Mengambil Data Books';
            $data = Books::where('id', $id)->first();

            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Books tidak ditemukan',
                    'data' => null
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => $success,
                'message' => $message,
                'data' => $data
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mengambil Data Books',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

  /**
     * @OA\Post(
     *     path="/books/create",
     *     tags={"Books"},
     *     operationId="insertBooks",
     *     summary="Books Insert",
     *     description="Tambah data Books",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data Books yang ingin ditambahkan",
     *         @OA\JsonContent(
     *             example={
     *                         "id": "1",
     *                         "title": "Bersamamu",
     *                         "author": "Dina",
     *                         "years": "2024"
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Data berhasil disimpan"
     *             }
     *         )
     *     )
     * )
     */
    public function insertBooks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>'required',
            'title' =>'required',
            'author' =>'required',
            'years' =>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $success = true;
        $message = 'Berhasil Menambah Data Books';
        $result = Books::create($request->all());
        $data = $result;

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * @OA\Put(
     *     path="/books/update",
     *     tags={"Books"},
     *     operationId="updateBooks",
     *     summary="Books Update",
     *     description="Update data Books",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request Body Description",
     *         @OA\JsonContent(
     *             example={
     *                         "id": "1",
     *                         "title": "Bersamamu",
     *                         "author": "Dina",
     *                         "years": "2024"
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Data berhasil diubah"
     *             }
     *         )
     *     )
     * )
     */
    public function updateBooks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>'required',
            'title' =>'required',
            'author' =>'required',
            'years' =>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $success = true;
        $message = 'Berhasil Mengubah Data Books';

        $data = array(
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'years' => $request->input('years')

        );

        $id = $request->input('id');
        $result = Books::where('id', $id)->update($data);

        return response()->json([
            'success' => $success,
            'message' => $message
        ], 200);
    }

  /**
     * @OA\Delete(
     *     path="/books/delete",
     *     tags={"Books"},
     *     operationId="deleteBooks",
     *     summary="Books Delete",
     *     description="Hapus data Books",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="ID Books yang ingin dihapus",
     *         @OA\JsonContent(
     *             example={
     *                 "id": "1"
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Data berhasil dihapus"
     *             }
     *         )
     *     )
     * )
     */
    
    public function deleteBooks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' =>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $success = true;
        $message = 'Berhasil Menghapus Data Books';

        $id = $request->input('id');
        $result = Books::where('id', $id)->delete();

        return response()->json([
            'success' => $success,
            'message' => $message
        ], 200);
    }
    

}
