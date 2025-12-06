<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * Get a list of users
     *
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $users = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com'],
        ];

        return response()->json([
            'success' => true,
            'data' => $users,
            'message' => 'Users retrieved successfully'
        ]);
    }

    /**
     * Get a single user by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getUser(int $id): JsonResponse
    {
        $users = [
            1 => ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            2 => ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            3 => ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com'],
        ];

        if (!isset($users[$id])) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $users[$id],
            'message' => 'User retrieved successfully'
        ]);
    }

    /**
     * Health check endpoint
     *
     * @return JsonResponse
     */
    public function healthCheck(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'timestamp' => now()->toIso8601String()
        ]);
    }
}
