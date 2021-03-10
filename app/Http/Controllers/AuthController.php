<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $user = Auth::user();
        if ($user)
            if ($user->role_id == $this->adminRole)
                return $this->apiResponse(User::all());
            else
                return $this->unAuthoriseResponse();
        else
            return $this->unAuthoriseResponse();
    }

    public function register(Request $request)
    {
        if ($request->has('name') && $request->has('password') && $request->has('role_id')) {
            $user = User::where('name', $request->name)->first();
            if ($user) {
                return $this->apiResponse(null, 0, "User name found in our database !", 403);
            } else {
                $password = bcrypt($request->password);
                $user = new User;
                $user->name = strtolower($request->name);
                $user->password = $password;
                $user->role_id = $request->role_id;
                $user->save();
                $accessToken = $user->createToken('LaserProject')->accessToken;
                $data = ['user' => $user, 'accessToken' => $accessToken];
                return $this->apiResponse($data);
            }
        } else {
            return $this->apiResponse(null, 0, "User name or password filed is required ", 403);
        }
    }

    public function login(Request $request)
    {
        $name = strtolower($request->name);
        $user = User::where('name', $name)->first();
        $loginData = [
            'name' => $name,
            'password' => $request->password
        ];

        if (!auth()->attempt($loginData)) {
            return $this->apiResponse(null, false, 'User name or password is invalid!', 400);
        }

        $accessToken = auth()->user()->createToken('LaserProject')->accessToken;

        $data = ['user' => $user, 'accessToken' => $accessToken];
        return $this->apiResponse($data);
    }
}
