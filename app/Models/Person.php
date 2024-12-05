<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
        return $this->hasMany(Contact::class, 'people_id', 'id');
    }
}
