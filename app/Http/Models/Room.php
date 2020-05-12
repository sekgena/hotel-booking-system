<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string description
 * @property string $rates
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Room extends Model
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
    protected $fillable = ['title', 'description', 'rates', 'status', 'created_at', 'updated_at'];

}
