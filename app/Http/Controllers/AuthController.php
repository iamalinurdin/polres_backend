<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  /**
   * Undocumented function
   *
   * @param LoginRequest $request
   * @return void
   */
  public function login(LoginRequest $request)
  {
    $username = $request->input('username');
    $password = $request->input('password');
    $user     = User::nrp($username)->first();

    if ($user)
    {
      if (Hash::check($password, $user->password))
      {
        return response()->json([
          'status' => 'success',
          'message' => 'proses login berhasil',
          'token' => "Bearer {$user->createToken('auth_token')->plainTextToken}"
        ], 200);
      }

      return response()->json([
        'status' => 'fail',
        'message' => 'password Anda salah',
      ], 400);
    }

    return response()->json([
      'status' => 'fail',
      'message' => 'NRP todak ditemukan'
    ], 400);
  }

  /**
   * Undocumented function
   *
   * @param Request $request
   * @return void
   */
  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
      'status' => 'success',
      'message' => 'logout berhasil'
    ], 200);
  }

  /**
   * Undocumented function
   *
   * @param RegisterRequest $request
   * @return void
   */
  public function register(RegisterRequest $request)
  {
    $user = User::create([
      'nrp' => $request->input('nrp'),
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => Hash::make($request->input('password')),
    ]);

    return response()->json([
      'status' => 'success',
      'message' => 'register berhasil',
      'data' => [
        'nrp' => $user->nrp,
        'name' => $user->name
      ]
    ], 200);
  }
}
