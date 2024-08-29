<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'image',
        'description',
        'responsability',
        'job_nature',
        'location',
        'salary_from',
        'salary_to',
        'qualification',
        'date_line',
        'published',
        'category_id',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
}
