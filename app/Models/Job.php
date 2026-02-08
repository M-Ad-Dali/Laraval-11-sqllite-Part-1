<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; 


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

    protected $table = 'job_listings'; /* [تحديد اسم الجدول في قاعدة البيانات] */

    protected $fillable = ['title', 'salary'];

}