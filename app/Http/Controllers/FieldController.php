<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Laboratory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=Field::where('laboratory_id',Auth::user()->laboratory_id)->get();
        return view('fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $lab=Laboratory::findOrFail(Auth::user()->laboratory_id);
        $field=Field::create([
            'name'=> request('name'),
            'femaleMaxParam'=> request('femaleMaxParam'),
            'femaleMinParam'=> request('femaleMinParam'),
            'maleMaxParam'=> request('maleMaxParam'),
            'maleMinParam'=> request('maleMinParam'),
            'laboratory_id'=> $lab->id
        ]);
        return redirect('field');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field=Field::findOrFail($id);
        return view('fields.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("America/La_Paz");
        $field=Field::findOrFail($id);
        $lab=Laboratory::findOrFail(Auth::user()->laboratory_id);
        DB::table('fields')->where('id',$id)->update([
            'name'=> request('name'),
            'femaleMaxParam'=> request('femaleMaxParam'),
            'femaleMinParam'=> request('femaleMinParam'),
            'maleMaxParam'=> request('maleMaxParam'),
            'maleMinParam'=> request('maleMinParam'),
            'laboratory_id'=> $lab->id
        ]);
        
        return redirect('field');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field=Field::findOrFail($id);
        date_default_timezone_set("America/La_Paz");
        Field::destroy($id);

        return redirect('field');
    }
}
