<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostAPIController extends Controller
{

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
            'title' => 'required|min:3|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Missing required field',
                'data' => $input
            ]);
        }

        $user = User::where('api_token', '=', $request->bearerToken())->first();
        $input['creator_id'] = $user->id;

        $post = Post::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Post was stored successfully.',
            'data' => $post
        ]);
    }
}