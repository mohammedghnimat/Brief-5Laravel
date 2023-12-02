<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  
  public function index(){
    //
}

  public function create(){$properties = Property::all();

        return view('reviews.create', compact('properties'));
    }

    
  public function store(Request $request){

        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        // dd($request);

        // $user_id=;

        // Assuming the currently authenticated user is the renter
        $review = Review::create([
            'property_id' => $request->input('property_id'),
            // 'renter_id' => $user_id,
            'renter_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        // Additional logic if needed

        // return redirect('/')->with('success', 'Review submitted successfully.');
        return redirect('properties/'.$request->property_id);
    }


    /*
     
Display the specified resource.*/
  public function show(Review $review){
    //
}

    /*Show the form for editing the specified resource.*/
  public function edit(Review $review){//
}

  public function update(Request $request, Review $review){//
}

    
  public function destroy(Review $review){//
}
}