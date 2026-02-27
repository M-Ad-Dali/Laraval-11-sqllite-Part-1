<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Support\Facades\Auth;
use App\Mail\JopPosted;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        
        $jobs = Job::with('employer')->latest()->simplePaginate(3); // [جلب ثلاثة بس في كل صفحة] [latest() = ترتيب البيانات من الأحدث إلى الأقدم] [simplePaginate() = جلب البيانات بدون إظهار عدد الصفحات الكلي في الواجهة]
        // $jobs = Job::with('employer')->cursorPaginate(3); // [جلب ثلاثة بس في كل صفحة]
        // $jobs = job::all(); // [طريقة جلب البيانات من قاعدة البيانات بدون علاقة بين الجداول] [تحميل كسول للبيانات]
        // $jobs = Job::with('employer')->paginate(3); // [جلب ثلاثة بس في كل صفحة]
        // $jobs = Job::with('employer')->get() /* [with('employer'); = eager loading] */
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        // $job = new Job(); // [طريقة 1]

        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->employer_id = 1;

        // $job->save();

        // dd(request()->all());// [dd = dump and die] [request()->all() = جلب كل البيانات اللي تم ارسالها من الفورم]
        $job =Job::create([/* [طريقة 2] */
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->queue(
        new JopPosted($job)
        );

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {

        if (Auth::guest()) {
            return redirect('/login');
        }
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        // $job = Job::findOrFail($id);  // [findOrFail = جلب البيانات أو إظهار خطأ 404 إذا لم يتم العثور عليها] null

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete(); // [delete = حذف البيانات]

        return redirect('/jobs');
    }
}
