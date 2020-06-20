<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryAPIController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/categories",
     *     summary="Get category list",
     *     tags={"Category"},
     *     description="Get category list",
     *     produces={"application/json"},
     *
     *     @SWG\Parameter(
     *          name="name",
     *          description="Filter by category name",
     *          type="string",
     *          required=false,
     *          in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category list",
     *
     *      @SWG\Schema(
     *        type="object",
     *        @SWG\Property(
     *           property="success",
     *           type="boolean"
     *        ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *          @SWG\Property(
     *            property="category",
     *            type="array",
     *            @SWG\Items(ref="#/definitions/Category")
     *          ),
     *        ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *        )
     *     )
     *   ),
     *
     *     @SWG\Response(
     *          response=500,
     *          description="Server Error"
     *     )
     * )
     */
    public function index(Request $request)
    {
        if ($request->has('name')) {
            $categories = Category::where('name', 'LIKE', '%' . $request->get('name') . '%')->get();
        } else {
            $categories = Category::get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Category list',
            'data' => $categories->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/categories",
     *     summary="Create new category",
     *     tags={"Category"},
     *     description="Create new category",
     *     produces={"application/json"},
     *
     *     @SWG\Parameter(
     *          name="name",
     *          description="name",
     *          type="string",
     *          required=true,
     *          in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was stored successfully.",
     *
     *      @SWG\Schema(
     *        type="object",
     *        @SWG\Property(
     *           property="success",
     *           type="boolean"
     *        ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *          @SWG\Property(
     *            property="category",
     *            type="array",
     *            @SWG\Items(ref="#/definitions/Category")
     *          ),
     *        ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *        )
     *     )
     *   ),
     *
     *     @SWG\Response(
     *          response=400,
     *          description="Missing required field"
     *     ),
     *
     *     @SWG\Response(
     *          response=500,
     *          description="Server Error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|min:3|max:35'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Missing required field',
                'data' => $input
            ], 400);
        }

        $category = Category::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Category was stored successfully.',
            'data' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|min:3|max:35'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Missing required field',
                'data' => $input
            ]);
        }

        $category->fill($input);
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category was updated successfully.',
            'data' => $category
        ]);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category was deleted successfully.',
            'data' => []
        ]);
    }
}