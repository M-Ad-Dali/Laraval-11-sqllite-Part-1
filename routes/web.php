<?php

use Illuminate\Support\Facades\Route;
use App\Models\job;

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
Route::get('/', function () {
    return view('home',[
    'greeting' => 'Hello', /* [greeting = $greeting = Hello] */
    'name' => 'MokaMo',
    ]);
});


Route::get('/about', function () {
    return view('about');
    });

Route::get('/contact', function () {
    return view('contact');
});

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
//     });

Route::get('/jobs/create', function () {
    return view('jobs.create');
    });

    Route::get('/jobs', function () {
        return view('jobs.index',[
            // 'jobs' => job::all() // [طريقة جلب البيانات من قاعدة البيانات بدون علاقة بين الجداول] [تحميل كسول للبيانات]
            // 'jobs' => Job::with('employer')->paginate(3) // [جلب ثلاثة بس في كل صفحة]
            'jobs' => Job::with('employer')->latest()->simplePaginate(3) // [جلب ثلاثة بس في كل صفحة]
            // 'jobs' => Job::with('employer')->cursorPaginate(3) // [جلب ثلاثة بس في كل صفحة]
            // 'jobs' => Job::with('employer')->get() /* [with('employer') = eager loading] */
        ]);
    });

Route::post('/jobs', function () {
    $job = new Job();

    // $job->title = request('title'); // [طريقة 1]
    // $job->salary = request('salary');
    // $job->employer_id = 1;

    // $job->save();

    // dd(request()->all());// [dd = dump and die] [request()->all() = جلب كل البيانات اللي تم ارسالها من الفورم]
    Job::create([ /* [طريقة 2] */
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

    Route::get('/jobs/{id}', function ($id) {

        $job = job::find($id);

        // dd($job);

            return view('jobs.show', ['job' => $job]);
    });