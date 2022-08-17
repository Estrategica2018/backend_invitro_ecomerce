<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function store(StoreCategoryRequest $request) {

        $category = Category::create($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Categoria registrada exitosamente!',
            'data' => [
                'category' => $category,
            ]
        ],201);

    }

    public function update(UpdateCategoryRequest $request , Category $category){

        $category->update($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Categoria actualizada exitosamente!',
            'data' => [
                'category' => $category,
            ]
        ],201);

    }

    public function list(){

        $categories = Category::all();

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Categorias consultadas exitosamente!',
            'data' => [
                'categories' => $categories,
            ]
        ],201);
    }
}
