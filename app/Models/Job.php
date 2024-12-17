<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jobss';

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id', 'id');
    }
}
