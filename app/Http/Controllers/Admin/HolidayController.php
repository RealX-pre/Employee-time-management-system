<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\Http\Controllers\Controller;
use App\Rules\DateRange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HolidayController extends Controller
{

    public function index()
    {
        $data = [
            'holidays' => Holiday::all() // select * from holiday
        ];

        return view('admin.holidays.index')->with($data);
    }


    public function create()
    {
        return view('admin.holidays.create');
    }


    public function store(Request $request)
    {
        if($request->input('multiple-days') == "no") {
            $this->validate($request, [
                'name' => 'required',
            ]);
            Holiday::create([
                'name' => $request->name,
                'start_date' => Carbon::create($request->date)
            ]);

        } else {
            $this->validate($request, [
                'name' => 'required',
                'date_range' => new DateRange
            ]);
            [$start, $end] = explode(' - ', $request->date_range);
            Holiday::create([
                'name' => $request->name,
                'start_date' => $start,
                'end_date' => $end
            ]);
        }
        $request->session()->flash('success', 'Амжилттай бүртгэгдлээ');
        return redirect()->route('admin.holidays.index');
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);

        return view('admin.holidays.edit')->with('holiday', $holiday);
    }


    public function update(Request $request, $id)
    {
        $holiday = Holiday::findOrFail($id);
        if($request->input('multiple-days') == "no") {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $holiday->name = $request->name;
            $holiday->start_date = Carbon::create($request->date);
            $holiday->end_date = null;

        } else {
            $this->validate($request, [
                'name' => 'required',
                'date_range' => new DateRange
            ]);
            [$start, $end] = explode(' - ', $request->date_range);
            $holiday->name = $request->name;
            $holiday->start_date = $start;
            $holiday->end_date = $end;
        }
        $holiday->save();
        $request->session()->flash('success', 'Амжилттай өөрчлөгдлөө');
        return redirect()->route('admin.holidays.index');
    }


    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        request()->session()->flash('success', 'Амжилттай устгагдлаа');
        return back();
    }
}
