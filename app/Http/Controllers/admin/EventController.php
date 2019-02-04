<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\User;
class EventController extends Controller
{
    /**
     * Display a listing of the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::latest()->paginate(10);
        if($events)
        	return view('dashboard.admin.events',compact('events'));
        return view('dashboard.admin.events')->flash('error', 'هیچ رویدادی یافت نشد');
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.admin.addEvent');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        	'title' => 'required|string|max:250',
        	'location' => 'required|string|max:250',
        	'date' => 'required',
        	'cost' => 'required|numeric|min:0',
        	'capacity' => 'required|numeric|min:0',
        	'poster' => 'required|image|mimes:jpg,jpeg,gif,png|max:1024',
        	'describtion' => 'required'
        ]);

        $date = date_create();
        date_timestamp_set($date, $request->get('date'));
		
		if($date < now())
			return back()->with('msg','تاریخ انتخابی باید در پیش رو باشد');
		
		$event = new Event();
		$event->title = $request->get('title');
		$event->location = $request->get('location');
		$event->date = $date;
		$event->cost = $request->get('cost');
		$event->capacity = $request->get('capacity');
		$event->describtion = $request->get('describtion');

		if($request->hasFile('poster')){
			$poster = Input::file('poster');
    		$posterName = $poster->getClientOriginalName();
    		$path = 'uploads/posters/'.date('Y-m-d').'/';
    		// $dir = $path.'/'.$posterName;
    		// if(Storage::disk('public')->put($path.'/'.$posterName, File::get($poster))){
    		// 	$event->poster = $dir;
    		// }
             if($poster->move($path, $posterName)){
                $event->poster = $path.''.$posterName;
            }
		}
		if($event->save())
			return back()->with('error','رویداد با موفقیت ایجاد شد');
		return back()->with('error','ایجاد رویداد ناموفقیت آمیز بود');
    }

    /**
     * Display the specified event.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($event = Event::findOrFail($id)){
            return view('dashboard.admin.updateEvent',compact('event'));
        }
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required|string|max:250',
            'location' => 'required|string|max:250',
            'date' => 'required',
            'cost' => 'required|numeric|min:0',
            'capacity' => 'required|numeric|min:0',
            'poster' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:1024',
            'describtion' => 'required'
        ]);

        $event = Event::findOrFail($id);

        $date = date_create();
        date_timestamp_set($date, $request->get('date'));
        
        if($date < now())
            return back()->with('error','تاریخ اناخابی اشتباه می باشد');
        
        $event->title = $request->get('title');
        $event->location = $request->get('location');
        $event->date = $date;
        $event->cost = $request->get('cost');
        $event->capacity = $request->get('capacity');
        $event->describtion = $request->get('describtion');

        if($request->hasFile('poster')){
            $poster = Input::file('poster');
            $posterName = $poster->getClientOriginalName();
            $path = 'uploads/posters/'.date('Y-m-d').'/';
            // $dir = $path.'/'.$posterName;
            // if(Storage::disk('public')->put($path.'/'.$posterName, File::get($poster))){
            //  $event->poster = $dir;
            // }
             if($poster->move($path, $posterName)){
                $event->poster = $path.''.$posterName;
            }
        }
        if($event->save())
            return back()->with('error','رویداد با موفقیت ایجاد شد');
        return back()->with('error','ایجاد رویداد ناموفقیت آمیز بود');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Event::destroy($id))
            return back();
        return back()->with('error','عملیات نا موفق بود');
    }

    /**
     * set the specified resource to full capacity.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function users($id)
    {
        //
        $ida[]='';
        $id = DB::table('event_user')->select('user_id')->where('event_id',$id)->get();
        foreach($id as $ids)
            $ida[] = $ids->user_id;
        $users = User::find($ida);
        return view('dashboard.admin.eventUser',compact('users'));
        
    }
}
