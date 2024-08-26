<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        
    ];
    public function job()
    {
        return $this->hasMany(JobData::class);
    }
    
}
