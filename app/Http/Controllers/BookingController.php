<?php

namespace App\Http\Controllers;

use App\Http\Models\Booking;
use App\Http\Models\Room;

class BookingController extends Controller
{

    public function doCheckIn($roomId, $guestId)
    {

        if ($roomId !== null && $guestId !== null) {
            $booking = new Booking();
            $booking->room_id = $roomId;
            $booking->guest_id = $guestId;

            if ($booking->save()) {
                $room = Room::find($roomId);
                $room->status = 1;
                $room->save();
            }
        }

        return redirect()->route("dashboard");
    }

    public function doCheckOut($roomId)
    {
        if ($roomId !== null) {
            $room = Room::find($roomId);
            $room->status = 0;

            if ($room->save()) {
                $booking = Booking::where("room_id", $roomId)->first();
                if ($booking !== null) {
                    $booking->check_out = date("Y-m-d H:i:s");
                    if($booking->save()) {
                        return redirect()->route("rating.form")->with(
                            ['roomId' => $roomId, 'guestId' => $booking->guest_id]
                            );
                    }
                }
            }
        }

        return redirect()->back();
    }
}
