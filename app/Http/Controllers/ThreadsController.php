<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{
    /**
     * ThreadsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $thread = Thread::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect($thread->path());
    }
}
