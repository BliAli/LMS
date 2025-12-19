<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'posted_date'
    ];

    protected $casts = [
        'posted_date' => 'date'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
