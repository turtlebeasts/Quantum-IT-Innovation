<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['employer_id', 'name', 'email', 'image'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
