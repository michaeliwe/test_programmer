<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LearningActivityRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\LearningActivity;
use App\Method;
use DB;

class LearningActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Method::orderBy('id')->get();
        $learning_activities = LearningActivity::orderBy('id')->get();

        $months = DB::table('learning_activities')
            ->select(DB::raw("
                TO_CHAR(start_date, 'MONTH') as month,
                TO_CHAR(start_date, 'MM') as month_number
            "))
            ->distinct()
            ->orderBy('month_number')
            ->get();

        $data = [];

        foreach ($months as $month) {
            $trimed_month = trim($month->month);
            $data += [
                $trimed_month => []
            ];

            foreach ($methods as $method) {
                $data[$trimed_month] += [
                    $method->name => []
                ];
            }
        }

        foreach ($learning_activities as $learning_activity) {
            $method_name = $learning_activity->method->name;
            $month_name = strtoupper(date('F', strtotime($learning_activity->start_date)));
            array_push($data[$month_name][$method_name], $learning_activity);
        }

        return view('learning_activity', compact('methods', 'data', 'months'));
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
    public function store(LearningActivityRequest $request)
    {
        LearningActivity::create([
            'name' => $request->name,
            'method_id' => $request->method_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        Alert::success('Success!', 'Tambah Aktivitas Berhasil');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LearningActivity  $learningActivity
     * @return \Illuminate\Http\Response
     */
    public function show(LearningActivity $learningActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LearningActivity  $learningActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningActivity $learningActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LearningActivity  $learningActivity
     * @return \Illuminate\Http\Response
     */
    public function update(LearningActivityRequest $request,  $id)
    {
        LearningActivity::find($id)->update([
            'name' => $request->name,
            'method_id' => $request->method_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        Alert::success('Success!', 'Ubah Aktifitas Berhasil');
        return redirect('/');

        Alert::success('Success!', 'Ubah Aktifitas Berhasil');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LearningActivity  $learningActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LearningActivity::find($id)->delete();
        Alert::success('Success!', 'Hapus Aktifitas Berhasil');
        return redirect('/');
    }
}
