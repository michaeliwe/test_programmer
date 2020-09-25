<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Method extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function activity()
    {
        return $this->hasMany(LearningActivity::class, 'method_id');
    }
}
