<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\SuccessReource;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService) {}

    /**
     * login user
     *
     * @param AuthRequest $request
     * @return mixed
     */
    public function login(AuthRequest $request)
    {
        try {
            return new AuthResource($this->userService->login($request->validated()));
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }

    /**
     * logout user
     *
     * @return mixed
     */
    public function logout()
    {
        try {
            $this->userService->logout();
            return new SuccessReource([]);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
            $code = array_key_exists($e->getCode(), Response::$statusTexts) ? $e->getCode() : 500;
            return response()->json(["message" => $e->getMessage()], $code);
        }
    }
}
