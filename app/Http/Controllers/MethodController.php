<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MethodRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Method;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MethodRequest $request)
    {
        Method::create([
            'name' => $request->name
        ]);

        Alert::success('Success!', 'Tambah Metode Berhasil');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(MethodRequest $request, Method $method)
    {
        $method->update([
            'name' => $request->name
        ]);

        Alert::success('Success!', 'Ubah Metode Berhasil');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        $method->delete();
        Alert::success('Success!', 'Hapus Metode Berhasil');
        return redirect('/');
    }
}
