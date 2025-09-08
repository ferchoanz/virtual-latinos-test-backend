<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct(protected PostService $postService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return PostResource::collection($this->postService->getAll());
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            return new PostResource($this->postService->create($request->validated()));
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return new PostResource($this->postService->getById($id));
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        try {
            return new PostResource($this->postService->update($id, $request->validated()));
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return new PostResource($this->postService->delete($id));
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * get applicants by post id
     */
    public function getApplicants(string $id)
    {
        try {
            $applicants = json_decode(file_get_contents(public_path('mocks/applicants.json')));
            return response()->json(['data' => Arr::random($applicants, 5)]);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }
}
