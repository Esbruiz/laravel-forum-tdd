<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    //
    public function index(Request $request)
    {
        $threads = Thread::latest()->get();
        return view("threads.index", compact('threads'));
    }

    /**
     * @param Thread $thread
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Thread $thread)
    {
        return view("threads.show", compact('thread'));
    }
}
