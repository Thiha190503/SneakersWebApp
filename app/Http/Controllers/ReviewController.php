<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    // add review
    public function reviewAdd(Request $request) {
        $this->reviewValidationCheck($request);
        $data = $this->requestReviewData($request);
        Review::create($data);
        return back();
    }

    // delete review
    public function reviewDelete($id) {
        $review = Review::find($id);
        if($review->user_id == auth()->user()->id) {
            $review->delete();
            return back();
        } else {
            return back()->with('error', 'Unauthorize');
        }
    }

    // review Validation Check
    private function reviewValidationCheck($request) {
        Validator::make($request->all(),[
            'content' => 'required'
        ])->validate();
    }

    // Request review data
    private function requestReviewData($request) {
        return [
            'content' => $request->content,
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
        ];
    }
}
