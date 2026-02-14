<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// $jobs = [ // [الطريقة القديمة الفانية لتعريف البيانات] 
//     [
//         'id' => 1,
//         'title' => 'Director',
//         'salary' => '$50,000'
//     ],
//     [
//         'id' => 2,
//         'title' => 'Programmer',
//         'salary' => '$10,000'
//     ],
//     [
//         'id' => 3,
//         'title' => 'Teacher',
//         'salary' => '$40,000'
//     ]
// ];


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('home',[
//     'greeting' => 'Hello', /* [greeting = $greeting = Hello] */
//     'name' => 'MokaMo',
//     ]);
// });


// Route::get('/about', function () {
//     return view('about');
//     });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/jobs', function () { // [الطريقة القديمة لتعريف البيانات]
//         return view('jobs',[
    
//             'jobs' => [
//                 [
//                     'id' => 1,
//                     'title' => 'Director',
//                     'salary' => '$50,000'
//                 ],
//                 [
//                     'id' => 2,
//                     'title' => 'Programmer',
//                     'salary' => '$10,000'
//                 ],
//                 [
//                     'id' => 3,
//                     'title' => 'Teacher',
//                     'salary' => '$40,000'
//                 ]
//             ]
//         ]);
//     })



// Show
// Route::get('/jobs/{id}', function ($id) { [الطريقة الاولى البحث عبر الايدي]
//     $job = job::find($id);
//     // dd($job);
//         return view('jobs.show', ['job' => $job]);
// });

    // [هذي الطريقة عندما يكون مسارات الكنترولر مختلفة]
//     // Index
//     Route::get('/jobs', [JobController::class, 'index']);

//     // Create
//     Route::get('/jobs/create', [JobController::class, 'create']);

//     // Show
//     Route::get('/jobs/{job}', [JobController::class, 'show']);// [ ID عن السجل الذي يطابق الـ jobs البحث في جدول الـ ]

//     // Store
//     Route::post('/jobs', [JobController::class, 'stor']);

//     // Edit
//     Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

//     // Update
//     Route::patch('/jobs/{job}', [JobController::class, 'update']);

//     // Destroy
//     Route::delete('/jobs/{job}', [JobController::class, 'destroy']);


// Route::controller(JobController::class)->group(function () { // [هذي الطريقة عندما يكون مسارات الكنترولر متشابهة]
//     // Index
//     Route::get('/jobs', 'index');

//     // Create
//     Route::get('/jobs/create', 'create');

//     // Show
//     Route::get('/jobs/{job}', 'show');// [ ID عن السجل الذي يطابق الـ jobs البحث في جدول الـ ]

//     // Store
//     Route::post('/jobs', 'stor');

//     // Edit
//     Route::get('/jobs/{job}/edit', 'edit');

//     // Update
//     Route::patch('/jobs/{job}', 'update');

//     // Destroy
//     Route::delete('/jobs/{job}', 'destroy');
// });

// Route::resource('jobs', JobController::class, [ // [نستخدم احد الطريقتين لستثنااء عملية من الكنترولر]
//     except => ['show'] // [استثنا عرض السجل]
//     only => ['index', 'create', 'store', 'edit', 'update', 'destroy'] // [تحديد المسارات التي نريدها فقط]
// ]);

Route::view('/', 'home');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class); // [هذي الطريقة مستخدمة لختصار الكود عندما يكون في نفس الكلاس] [JobController::class = جلب كل المسارات من الكنترولر]