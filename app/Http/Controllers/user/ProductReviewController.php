<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\AddReviewRequest;
use App\Models\Review;

class ProductReviewController extends Controller
{
    public function addReview(AddReviewRequest $request)
    {
        dd($request->all());
        $add_review = Review::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'rating' => $request->rating,
            'message' => $request->message

        ]);
        if ($add_review) {
            return response()->json([
                'success' => true,
                'message' => 'Review has been added successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }
}
