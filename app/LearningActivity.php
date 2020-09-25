<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningActivity extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'start_date', 'end_date', 'method_id'
    ];

    public function method()
    {
        return $this->belongsTo(Method::class, 'method_id');
    }
}
