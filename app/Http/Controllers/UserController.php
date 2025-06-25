<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\LoginRequest;
use App\Models\RoleUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function indexCustomers()
    {
        return User::whereHas('roles', function($query) {
            $query->where('role_name', 'Customer');
        })->get();
    }

    public function  createCustomer(UserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->roles()->attach(1);

        return response()->json(
            [   
                'status' => 200,
                'description' => 'User created successfully',
            ]
            
        );
    }


    public function indexEmployees()
    {
        return User::whereHas('roles', function($query) {
            $query->where('role_name', 'Customer');
        })->gey();
    }

    public function  createEmployee(UserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->roles()->attach(2);


        return response()->json(
            [   
                'status' => 200,
                'description' => 'User created successfully',
            ]
            
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
