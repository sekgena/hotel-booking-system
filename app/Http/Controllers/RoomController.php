<?php

namespace App\Http\Controllers;

use App\Http\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{

    public function index() {
        return view("add-room");
    }

    public function postCreateRoom(Request $request) {
        $data = $request->all();

        $this->validator($data)->validate();

        $room = new Room();
        $room->title = $data['title'];
        $room->description = $data['description'];
        $room->rates = $data['rates'];

        if ($room->save()) {
            return redirect()->route("dashboard");
        }

        return Redirect::back();
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string', 'max:120'],
            'rates' => ['required', 'integer', 'max:100000']
        ]);
    }
}
