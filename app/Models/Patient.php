<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['id', 'name', 'age', 'gender', 'mobile', 'created_at', 'updated_at'];
}
