<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; 
use Illuminate\Database\Eloquent\Factories\HasFactory;


// class job { // [الطريقة الاحدث في لارفل لتعريف البيانات يدوياً] 
//     public static function all(): array
//     {
//         return [
//             [
//                 'id' => 1,
//                 'title' => 'Director',
//                 'salary' => '$50,000'
//             ],
//             [
//                 'id' => 2,
//                 'title' => 'Programmer',
//                 'salary' => '$10,000'
//             ],
//             [
//                 'id' => 3,
//                 'title' => 'Teacher',
//                 'salary' => '$40,000'
//             ]
//         ];
//     }

class Job extends Model{ 
    use HasFactory;

    protected $table = 'job_listings'; /* [تحديد اسم الجدول في قاعدة البيانات] */

    // protected $fillable = ['employer_id', 'title', 'salary'];
    protected $guarded = []; // [هو وسيلة لإخبار قاعدة البيانات: "أنا أثق في كل البيانات القادمة، اسمح بإدخال أي شيء.]

    public function employer()
    {
        return $this->belongsTo(Employer::class); /* [تعريف العلاقة بين الوظيفة وصاحب العمل صاحب عمل واحد معه عدة وظائف] [One-to-Many] */
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id"); /* [تعريف العلاقة بين الوظيفة التاج وظيفة واحدة لها عدة تاجات والعكس صحيح] [Many-to-Many] */ /* [foreignPivotKey عشان تقدر تتعامل مع اسم مغاير للاسماء الاكفلر استخداماً في قواعد البيانات] */
    // }

}