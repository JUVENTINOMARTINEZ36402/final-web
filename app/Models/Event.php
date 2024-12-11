<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',        // Correct field name
        'description',  // Added description
        'event_date',   // Correct field name
        'location',     // Correct field name
        'logo_image',   // Added logo image
        'status',       // Added status
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'event_date' => 'datetime', // Ensuring event_date is cast to datetime
    ];
}
