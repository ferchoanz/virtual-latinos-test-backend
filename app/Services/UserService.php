<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class UserService
{
    public function __construct(protected UserRepository $userRepository) {}

    /**
     * login user
     *
     * @param array $loginData
     * @return object
     */
    public function login(array $loginData)
    {
        if (Auth::attempt($loginData) === false) {
            throw new UnauthorizedException('Invalid credentials', 401);
        }

        /** @var User */
        $user = Auth::user();
        $token = $user->createToken('accessToken')->plainTextToken;

        return (object)[
            'user' => $user,
            'token' => $token
        ];
    }

    /**
     * logout user
     *
     * @return int
     */
    public function logout()
    {
        /** @var User */
        $user = Auth::user();
        return $user->tokens()->delete();
    }
}
