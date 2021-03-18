<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function index($pageSize)
    {
        $user = Auth::user();
        if ($user)
            if ($user->role_id == $this->adminRole) {
                $users = User::paginate($pageSize);
                $colliction = $users->getCollection();
                return $this->apiResponse($colliction);
            } else
                return $this->unAuthoriseResponse();
        else
            return $this->unAuthoriseResponse();
    }

    public function register(Request $request)
    {
        if ($request->has('name') && $request->has('password') && $request->has('role_id')) {
            $user = User::where('name', $request->name)->first();
            if ($user) {
                return $this->apiResponse(null, false, "User name found in our database !", 403);
            } else {
                $password = bcrypt($request->password);
                $user = new User;
                $user->name = strtolower($request->name);
                $user->password = $password;
                $user->role_id = $request->role_id;
                $user->is_active = 1;
                $user->save();
                $accessToken = $user->createToken('LaserProject')->accessToken;
                $data = ['user' => $user, 'accessToken' => $accessToken];
                return $this->apiResponse($data);
            }
        } else {
            return $this->apiResponse(null, false, "User name or password filed is required ", 403);
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
        if ($user->is_active) {
            if (!auth()->attempt($loginData)) {
                return $this->apiResponse(null, false, 'User name or password is invalid!', 400);
            }

            $accessToken = auth()->user()->createToken('LaserProject')->accessToken;

            $data = ['user' => $user, 'accessToken' => $accessToken];
            return $this->apiResponse($data);
        } else {
            return $this->unAuthoriseResponse();
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validate = $this->apiValidation($request, ['user_id', 'new_password']);
        if ($validate[0] == 'true') {
            if ($user) {
                if ($user->role_id == $this->adminRole) {
                    $editUser = User::where('id', $request->user_id)->first();
                    if ($editUser) {
                        $password = bcrypt($request->new_password);
                        $editUser->password = $password;
                        $editUser->save();
                        return $this->apiResponse('true');
                    } else return $this->notFoundMassage('User');
                } else return $this->unAuthoriseResponse();
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);
    }

    public function changeStatus(Request $request)
    {
        $user = Auth::user();
        $validate = $this->apiValidation($request, ['user_id', 'status']);
        if ($validate[0] == 'true') {
            if ($user) {
                if ($user->role_id == $this->adminRole) {
                    $editUser = User::where('id', $request->user_id)->first();
                    if ($editUser) {
                        $editUser->is_active = $request->status;
                        $editUser->save();
                        return $this->apiResponse('true');
                    } else return $this->notFoundMassage('User');
                } else return $this->unAuthoriseResponse();
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);
    }
}
