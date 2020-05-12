<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $room_id
 * @property int $guest_id
 * @property int $rating
 * @property int $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Ratings extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['room_id', 'guest_id', 'rating', 'comment', 'created_at', 'updated_at'];

}
