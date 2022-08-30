<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductReview\StoreProductReviewRequest;
use App\Http\Requests\ProductReview\UpdateProductReviewRequest;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    //

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Reseña de producto registrada exitosamente!',
            'data' => [
                'product_review' => $productReview,
            ]
        ],201);
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Reseña de producto actualizada exitosamente!',
            'data' => [
                'product_review' => $productReview,
            ]
        ],201);
    }

    public function list()
    {
        $productReviews = ProductReview::with('product');
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Reseña de productos consultados exitosamente!',
            'data' => [
                'product_reviews' => $productReviews,
            ]
        ],201);
    }
}
