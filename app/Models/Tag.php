<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id"); /* [تعريف العلاقة بين التاج والوظائف تاج واحد له عدة وظائف والعكس صحيح] [Many-to-Many] */ /* [foreignPivotKey عشان تقدر تتعامل مع اسم مغاير للاسماء الاكفلر استخداماً في قواعد البيانات] */
    }
}
