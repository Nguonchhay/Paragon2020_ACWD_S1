<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAPIController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Missing required field',
                'data' => $request->all()
            ]);
        }

        /** @var User $user */
        $user = User::where('email', '=', $request->get('email'))->first();
        if (empty($user)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
                'data' => $request->all()
            ]);
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
                'data' => $request->all()
            ]);
        }

        $apiToken = bcrypt($user->id);
        $user->api_token = $apiToken;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Valid credentials',
            'data' => [
                'api_token' => $apiToken
            ]
        ]);
    }
}