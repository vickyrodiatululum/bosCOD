<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ],
        [
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'email Harus Diisi',
            'email.unique' => 'email Sudah Terdaftar',
            'password.required' => 'Masukan Password Terlebih Dahulu',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $users = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        if ($users) {
            return response()->json([
                'success' => true,
                'message' => 'User Created',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'User Failed',
            ]);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (! $token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     // return $this->respondWithToken($token);

    //     // Jika login berhasil, arahkan ke halaman transfer
    //     return redirect('/auth/transfer')->with('access_token', $token);
    // }



    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateToken(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'token' => 'required',
        ]);


        try {
            // Verifikasi token refresh yang diberikan
            $newToken = auth()->refresh($validatedData['token']); // Menghasilkan token baru

            // Membuat response sesuai format
            return response()->json([
                'accessToken' => $newToken,    // Token akses baru
                'refreshToken' => $request->token // Token refresh (tetap sama)
            ], 200);

        } catch (\Exception $e) {
            // Jika terjadi kesalahan dalam verifikasi token
            return response()->json([
                'error' => 'Token is invalid or expired',
            ], 401);
        }
    }

    //     public function updateToken(Request $request)
    // {
    //     // Validasi request
    //     $validatedData = $request->validate([
    //         'token' => 'required|string',
    //     ]);

    //     // Lakukan proses dengan $validatedData['token']
    //     // Misalnya: refresh token
    //     $newToken = $this->refreshToken($validatedData['token']);

    //     return response()->json([
    //         'accessToken' => $newToken['access_token'],
    //         'refreshToken' => $newToken['refresh_token'],
    //     ]);
    // }



    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'refresh_token' => auth()->refresh(),
        ]);
    }

}
