<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // get all users
            $users = User::all();
            return ResponseHelper::success(message: 'Users fetched successfully', data: $users->toArray(), statusCode: 200);

        } catch (\Exception $e) {
            // throw exception
            Log::error('Error in UserController -> index : ' . ' Line : ' . $e->getLine() . 'Exception : ' . $e->getMessage());

            return ResponseHelper::error(message: 'Error in UserController -> index ' . $e->getMessage(), statusCode: 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        try {

            // create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                // return success response
                return ResponseHelper::success(message: 'User created successfully', data: $user->toArray(), statusCode: 201);
            } else {
                // return error response
                return ResponseHelper::error(message: 'Error in creating user', statusCode: 400);
            }

        } catch (\Exception $e) {

            // throw exception
            Log::error('Error in UserController -> store : ' . ' Line : ' . $e->getLine() . 'Exception : ' . $e->getMessage());
            return ResponseHelper::error(message: 'Error in UserController -> store ' . $e->getMessage(), statusCode: 400);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // get user by id
            $user = User::find($id);

            if ($user) {
                // return success response
                return ResponseHelper::success(message: 'User fetched successfully', data: $user->toArray(), statusCode: 200);
            } else {
                // return error response
                return ResponseHelper::error(message: 'User not found', statusCode: 404);
            }

        } catch (\Exception $e) {
            // throw exception
            Log::error('Error in UserController -> show : ' . ' Line : ' . $e->getLine() . 'Exception : ' . $e->getMessage());
            return ResponseHelper::error(message: 'Error in UserController -> show ' . $e->getMessage(), statusCode: 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            // get user by id
            $user = User::find($id);

            if ($user) {
                // update user
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                // return success response
                return ResponseHelper::success(message: 'User updated successfully', data: $user->toArray(), statusCode: 200);

            } else {
                // return error response
                return ResponseHelper::error(message: 'User not found', statusCode: 404);
            }

        } catch (\Exception $e) {
            // throw exception
            Log::error('Error in UserController -> update : ' . ' Line : ' . $e->getLine() . 'Exception : ' . $e->getMessage());
            return ResponseHelper::error(message: 'Error in UserController -> update ' . $e->getMessage(), statusCode: 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // get user by id
            $user = User::find($id);

            if ($user) {
                // delete user
                $user->delete();

                // return success response
                return ResponseHelper::success(message: 'User deleted successfully', statusCode: 200);

            } else {
                // return error response
                return ResponseHelper::error(message: 'User not found', statusCode: 404);
            }

        } catch (\Exception $e) {
            // throw exception
            Log::error('Error in UserController -> destroy : ' . ' Line : ' . $e->getLine() . 'Exception : ' . $e->getMessage());
            return ResponseHelper::error(message: 'Error in UserController -> destroy ' . $e->getMessage(), statusCode: 400);
        }
    }
}
