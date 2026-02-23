<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;

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
//     Route::post('/jobs', 'store');

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

// Route::resource('jobs', JobController::class)->middleware('auth'); // [هذي الطريقة مستخدمة لختصار الكود عندما يكون في نفس الكلاس] [JobController::class = جلب كل المسارات من الكنترولر] [middleware('auth') = حماية جميع مسارات الوظائف من الوصول غير المصرح به]

Route::view('/', 'home');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class); // [هذي الطريقة مستخدمة لختصار الكود عندما يكون في نفس الكلاس] [JobController::class = جلب كل المسارات من الكنترولر]

// Index
Route::get('/jobs', [JobController::class, 'index']);

// Create
Route::get('/jobs/create', [JobController::class, 'create']);

// Store
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth'); 

// Show
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth') // [حماية مسار تعديل الوظيفة من الوصول غير المصرح به]
    ->can('edit', 'job'); // [can('edit-job', 'job') = التحقق من صلاحية المستخدم لتعديل الوظيفة اذا كانت توجد صلاحيات تظهر عدا ذالك تختفي]

// Update
Route::patch('/jobs/{job}', [JobController::class, 'update']);

// Destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); 
// Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login'); // [تسمية المسار لتسهيل عملية إعادة التوجيه في حالة عدم تسجيل الدخول]
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);