<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('products')->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $categories
        ], 200);
    }
}
