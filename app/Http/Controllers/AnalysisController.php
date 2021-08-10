<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Field;
use App\Models\Result;
use App\Models\Binnacle;
use App\Models\Laboratory;
use App\Models\Permission;
Use App\Models\User;
use App\Models\campaign;
use App\Models\Proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyses=Analysis::where('lab_id',Auth::user()->laboratory_id)->where('status',1)->get();
        return view('analysis.index', compact('analyses'));
    }

    public function myAnalyses($id)
    {
        $analyses= Analysis::where('patient_id', $id)->get();
        $analyses->load('nurse');
        return view('analysis.myAnalysis', compact('analyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lab=Laboratory::findOrFail(Auth::user()->laboratory_id);
        $fields=Field::where('laboratory_id',$lab->id)->get();
        $nurses=Permission::where('role_id',2)->get();
        $array=array();
        foreach($nurses as $nurse){
            array_push($array,$nurse->user_id);
        }
        $nurses=User::whereIn('id',$array)->where('laboratory_id',$lab->id)->get();

        $patients=Permission::where('role_id',3)->get();
        $array=array();
        foreach($patients as $patient){
            array_push($array,$patient->user_id);
        }
        $patients=User::whereIn('id',$array)->where('laboratory_id',$lab->id)->get();

        $proofs=Proof::where('laboratory_id',$lab->id)->get();
        return view('analysis.create',['nurses'=>$nurses,
        'patients'=> $patients ,'proofs'=>$proofs, 'fields'=>$fields]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lab=Laboratory::findOrFail(Auth::user()->laboratory_id);
        $discount=campaign::where('discountCode',request('code'))->value('discount');
        $price=Proof::where('id',request('proof_id'))->value('price');
        $fields=request('fields');
        $total=$price-($price*$discount);
        date_default_timezone_set("America/La_Paz");

        $p=request('proof_id');
        $analysis=Analysis::create([
            'price'=> $price,
            'total'=> $total,
            'patient_id'=> request('patient_id'),
            'proof_id'=> $p,
            'nurse_id'=> request('nurse_id'),
            'lab_id'=> $lab->id
        ]);
        foreach ($fields as $field){
            $result=Result::create([
                'analysis_id'=>$analysis->id,
                'field_id'=>$field,
            ]);
        }

        Binnacle::setInsert("analisis de precio ".$analysis->price,"analisis",Auth::user());
        return redirect('analysis');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analysis=Analysis::findOrFail($id);
        $lab=Laboratory::findOrFail($analysis->lab_id);
        $proof=Proof::findOrFail($analysis->proof_id);
        $patient=User::findOrFail($analysis->patient_id);
        $nurse=User::findOrFail($analysis->nurse_id);
        $results=Result::where('analysis_id',$id)->get();
        return view('analysis.show',compact('analysis'),['nurse'=>$nurse,
        'patient'=> $patient ,'proof'=>$proof, 'results'=>$results]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $analysis=Analysis::findOrFail($id);
        $laboratorio=Laboratory::findOrFail($analysis->lab_id);
        $results=Result::where('analysis_id',$id)->get();
        $array=array();
        foreach($results as $result){
            array_push($array,$result->field_id);
        }

        $atributos=Field::where('laboratory_id',$laboratorio->id)->whereNotIn('id',$array)->get();
        $fields=Field::whereIn('id',$array)->get();
        $prueba=Proof::findOrFail($analysis->proof_id);
        $paciente=User::findOrFail($analysis->patient_id);
        $enfermera=User::findOrFail($analysis->nurse_id);
        
        $nurses=Permission::where('role_id',2)->get();
        $array=array();
        foreach($nurses as $nurse){
            array_push($array,$nurse->user_id);
        }
        $nurses=User::whereIn('id',$array)->where('id','!=',$enfermera->id)->where('laboratory_id',$laboratorio->id)->get();

        $patients=Permission::where('role_id',3)->get();
        $array=array();
        foreach($patients as $patient){
            array_push($array,$patient->user_id);
        }
        $patients=User::whereIn('id',$array)->where('id','!=',$paciente->id)->where('laboratory_id',$laboratorio->id)->get();

        $proofs=Proof::where('laboratory_id',$laboratorio->id)->where('id','!=',$prueba->id)->get();

        return view('analysis.edit',compact('analysis'),['nurses'=>$nurses,
        'patients'=> $patients ,'proofs'=>$proofs, 'enfermera'=>$enfermera,
        'paciente'=>$paciente, 'prueba'=>$prueba, 'fields'=>$fields, 'atributos'=>$atributos, 'results'=>$results]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $analysis=Analysis::findOrFail($id);
        $fields=request('fields');
        $results=request('results');
        $campos=request('campos');
        $lab=Laboratory::findOrFail(Auth::user()->laboratory_id);
        $discount=campaign::where('discountCode',request('code'))->value('discount');
        $price=Proof::where('id',request('proof_id'))->value('price');
        $total=$price-($price*$discount);
        date_default_timezone_set("America/La_Paz");

        $filename= NULL;
        if ($request->hasFile('doc')){
            $filename= $request->doc->getClientOriginalName();
            $destino=public_path('analisis');
            $request->doc->move($destino,$filename);
        }


        DB::table('analyses')->where('id',$id)->update([
            'price'=> $price,
            'total'=> $total,
            'patient_id'=> request('patient_id'),
            'nurse_id'=> request('nurse_id'),
            'proof_id'=> request('proof_id'),
            'detail'=> request('detail'),
            'lab_id'=> $lab->id,
            'doc'=> $filename,
        ]);

        if($fields!=NULL){
            foreach ($fields as $field){
                $result=Result::create([
                    'analysis_id'=>$analysis->id,
                    'field_id'=>$field,
                ]);
            }
        }


        $array=array();
        foreach($results as $result){
            array_push($array,$result);
        }
        $i=0;
        foreach ($campos as $campo){
            DB::table('results')->where('id',$campo)->update([
                'resultado'=>$array[$i]
            ]);
            $i++;
        }


        Binnacle::setUpdate("analisis de precio ".$price,"analisis",Auth::user());
        return redirect('analysis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analysis=Analysis::findOrFail($id);
        $analysis->status=0;
        $analysis->update();
        return redirect('analysis');
    }
}
