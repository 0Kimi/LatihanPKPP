<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $table = 'registers';  // Explicitly set the table name if needed

    protected $fillable = [
        'tmula', 'takhir', 'nama', 'kategori', 'anjuran', 'penganjur',
        'tempoh', 'lokasi', 'ykos', 'pkos',
    ];
    
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
        
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_register');
    }
}
