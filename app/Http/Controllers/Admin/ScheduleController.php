<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\CClass;
use App\Schedule;
use App\Traits\CommonTrait;

class ScheduleController extends Controller
{
    use CommonTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yesterday = date("Ymd", strtotime("-1 days"));        
        $sql="select scheduleid, schedule.classid, date_format(scheduledate, '%W %d %M %y') as date2,
            date_format(scheduledate, '%W') as dayname, classname, full, bookings, classseats, daynight, discount, discount_price, discountclassprice, scheduleseats 
            from schedule, classes where schedule.classid=classes.classid and scheduledate > ".$yesterday." order by scheduledate, daynight" ;
        $classes = DB::select($sql);
        //dd($sql);        
        return view('admin.schedule.index')->withData($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get Classes Data 

        $data = [];
        $data['classes'] = CClass::orderBy('classname')->get();        
        $data['rendered_classdate'] = $this->DateSelectBox("date",date("d"), date("m"), date("Y"), 50, 65, 70);
        return view('admin.schedule.create')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Do Validation Check of Incomming Request

        $this->validate($request, array(
            'classid'       => 'required|numeric',
            'classdate'     => 'required|max:191',
            'daynight'      => 'required',
            'starttime'     => 'required',
            'maxseats'      => 'required'
        ));

        $schedule = new Schedule;
        $schedule->classid = $request->classid;
        $schedule->classdate = $request->classdate;
        $schedule->daynight = $request->daynight;
        $schedule->starttime = $request->starttime;
        $schedule->maxseats = $request->maxseats;
        $schedule->save();

        Session::flash('success', 'Schedule added successfully');
        return redirect()->route('admin.classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}