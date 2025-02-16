<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validación de datos
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);
    
            // Crear usuario
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $request->input('role', 'vendedor'),
            ]);
    
            // Crear token de autenticación
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
    

        // Si el rol es "vendedor", creamos un cliente asociado
        if ($user->role === 'vendedor') {
            $client = Client::create([
                'name' => $validated['name'], 
                'email' => $validated['email'],
                'user_id' => $user->id, // Asociamos el cliente con el usuario creado
            ]);
        }

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}

