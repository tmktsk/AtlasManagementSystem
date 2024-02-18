<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        // dd($request);
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            // dd($getPart, $getDate);
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            // dd($reserveDays);
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                // dd($reserve_settings);
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request){
        // dd($request);
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getDate;
            // dd($getDate);
            // $reserveDays = array_combine($getDate, $getPart);
            $reserveDays = [$getDate => $getPart];
            // dd($reserveDays);
            foreach($reserveDays as $key => $value){
                // dd($key, $value);
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                // dd($reserve_settings);
                $reserve_settings->increment('limit_users');
                $reserve_settings->users()->detach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }



}
