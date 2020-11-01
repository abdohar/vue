<?php

namespace App\Http\Controllers;

use App\Data;
use PDF;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Data::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "s";
        return Data::create([
            'name' => $request['name'],
            'age'  => $request['age'],
            'description' => $request['description']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // return $request;
        $data=Data::where('id',$id)->first();
        $data->name=$request->get('val1');
        $data->age=$request->get('val2');
        $data->description=$request->get('val3');
        $data->save();

        return $data;
    }

    public function generate_pdf() {
   $datas=Data::all();
    $pdf = PDF::loadView('test', ['datas' =>$datas]);
    // $i=str_rand(8);
    $key = mt_rand(100000, 999999);
    // $name= 'doc'.$key.'.pdf';
    return $pdf->download('doc'.$key.'.pdf');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            $data=Data::find($request->id)->delete();
    }
}
