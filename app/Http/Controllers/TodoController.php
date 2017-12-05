<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Section;
use App\Priority;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Section::with('todos')->get();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [    'body' => 'required',
                                        'section' => 'required|integer',
                                        'priority' => 'required|integer'
                                ]);
        $request->user()->todos()->create([  'body' => request('body'),
                        'priority_id' => request('priority'),
                        'section_id' => request('section')
                    ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    /* public function show(Todo $todo)
    {
        //
        return view('todo.single', compact('todo'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Todo $todo)
    {
        //
        if ($todo->user_id == auth()->user()->id || $request->user()->hasAnyRole(['editor','admin']))
            {
            return view('todo.show', compact('todo'));
            }
        else
            {
            abort(401, 'This action is unauthorized!');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // 
        if ($todo->user_id == auth()->user()->id || $request->user()->hasAnyRole(['editor','admin']))
            {
            $this->validate(request(), [    'body' => 'required',
                                            'section' => 'required|integer',
                                            'priority' => 'required|integer'
                                    ]);
            $todo->body = request('body');
            $todo->section_id = request('section');
            $todo->priority_id = request('priority');
            $todo->save();
            return redirect('/');
            }
        else
            {
            abort(401, 'This action is unauthorized!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Todo $todo)
    {
        //
        if ($todo->user_id == auth()->user()->id || $request->user()->hasAnyRole(['editor','admin']))
            {
            $todo->delete();
            return redirect('/');
            }
        else
            {
            abort(401, 'This action is unauthorized!');
            }
    }
}
