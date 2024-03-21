<?php

namespace App\Http\Controllers;
use App\Application\Services\UserService;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
        ]);

        $this->userService->createUser(
            $validatedData['email'],
            $validatedData['firstName'],
            $validatedData['lastName']
        );

        return response()->json(['message' => 'User created successfully']);
    }
}
