<?php

namespace App\Http\Controllers;

use App\Http\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function showRatingScreen()
    {
        return view("rate-hotel");
    }

    public function doRateBooking(Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $rating = new Ratings();
        $rating->room_id = $data['room_id'];
        $rating->guest_id = $data['guest_id'];
        $rating->rating = $data['rating'];
        $rating->comment = $data['comment'];
        if ($rating->save()) {
            return redirect()->route("dashboard");
        }

        return redirect()->back();
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'room_id' => ['required', 'integer'],
            'guest_id' => ['required', 'integer'],
            'rating' => ['required', 'integer', 'min:0', 'max:5'],
            'comment' => ['required', 'string', 'max:225']
        ]);
    }
}
