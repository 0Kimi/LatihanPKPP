<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function registers()
    {
        return $this->belongsToMany(Register::class, 'department_register');
    }
}
