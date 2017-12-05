<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('admin');
        $sections = Section::all();
        return view('section.index', compact('sections'));
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
        $request->user()->authorizeRoles('admin');
        $this->validate(request(), [ 'name' => 'required' ]);
        Section::create(['name' => request('name')]);
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    /*public function show(Section $section)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Section $section)
    {
        //
        $request->user()->authorizeRoles('admin');
        return view('section.show', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
        $request->user()->authorizeRoles('admin');
        $this->validate(request(), [ 'name' => 'required' ]);
        $section->name = request('name');
        $section->save();
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Section $section)
    {
        //
        $request->user()->authorizeRoles('admin');
        if ($section->todos()->count() == 0)
            {
            $section->delete();
            return redirect('/sections');
            }
        else
            {
            abort(401, "Section has todos.");
            }
    }
}
