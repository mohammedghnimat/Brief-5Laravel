<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(5);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    public function create()
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        Review::create($request->all());
        return redirect()->route('admin.reviews.index');
    }

    public function edit(Review $review)
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->all());
        return redirect()->route('admin.reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index');
    }
}
