<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class APIAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyses=Analysis::all();
        return response($analyses, 200);
    }


    public function getAnalyses($userId)
    {
        $analyses=Analysis::where('patient_id',$userId)
                            ->where('status',1)->get();
        return response($analyses, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $precio=request('price');
        $descuento=request('discount');
        $total=$precio-$precio*$descuento;
        $test = Test::create([ 
            'discount' => request('discount'),
            'detail' => request('detail'),
            'doc' => request('doc'),
            'price' => request('price'),
            'total' => $total,
        ]);
        return response()->json([
            'status' => 'ok',
            'data' => $test
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analysis=Analysis::findOrFail($id);
        return response($analysis, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test=Test::findOrFail($id);
        $precio=request('price');
        $descuento=request('discount');
        $total=$precio-$precio*$descuento;
        $test->discount=request('discount');
        $test->detail=request('detail');
        $test->price=request('price');
        $test->total=$total;
        $test->update();
        return response()->json([
            'status' => 'ok',
            'data' => $test
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Test::findOrFail($id);
        $test->status=0;
        $test->update();
        return response()->json([
            'status' => 'ok',
            'data' => $test
            ], 200);
    }
}
