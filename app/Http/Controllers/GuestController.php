<?php

namespace App\Http\Controllers;

use App\Http\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function search($roomId, $query)
    {
        $guest = Guest::where("email", $query)->first();

        if ($guest === null) {
            return redirect()->route("guest.form", $roomId);
        }

        return redirect()->route("checkin", [$roomId, $guest->id]);
    }

    public function showAddGuestForm($roomId)
    {
        return view("add-guest")->with("roomId", $roomId);
    }

    public function doAddGuest($roomId, Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $newGuest = new Guest();
        $newGuest->first_name = $data['first_name'];
        $newGuest->last_name = $data['last_name'];
        $newGuest->email = $data['email'];

        if ($newGuest->save()) {
            return redirect()->route("checkin", [$roomId, $newGuest->id]);
        }

        return response()->json(['status' => 500]);
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:guests'],
        ]);
    }
}
