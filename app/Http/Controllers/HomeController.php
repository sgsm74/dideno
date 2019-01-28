<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Post;
use App\Contact;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events=Event::orderBy('date','asc')->where('date','>',now())->get();
        $posts=Post::latest()->take(2)->get();
        
        if($closeEvent=Event::orderBy('date','asc')->where('date','>',now())->first()){
         return view('welcome',compact(['closeEvent', 'events', 'posts']));      
        }
        return view('welcome',compact(['closeEvent', 'events', 'posts']));
    }

    //show events page with details
    public function events(){
        $events=Event::orderBy('date','desc')->get();
        // $days = Event::whereBetween('date', [now(), now()->addDays(7)])
        // ->orderBy('date')
        // ->get()
        // ->groupBy(function ($val) {
        //     return Carbon::parse($val->start_time)->format('d');
        // });

        // foreach ($days as $day => $appointments) {
        //     echo '<‌h2‌>'.$day.'<‌/h2‌><‌ul‌>';
        //     foreach ($appointments as $appointment) {
        //         echo '<‌li‌>'.$appointment->start_time.'<‌/li‌>';
        //     }
        //     echo '';
        // }
        return view('events',compact('events'));
    }

    //show about us page
    public function about(){
        return view('about');
    }

    //show blog page
    public function blog(){
        $posts = Post::latest()->paginate(10);
        return view('blog',compact('posts'));
    }

    //show contact us page
    public function contact(){
        return view('contact');
    }

    //send contact message
    public function sendMessage(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'subject' => 'required|string|max:250',
            'message' => 'required|string'
        ]);
        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        if($contact->save())
            return response()->json("success", 200);


    }

    //show event page
    public function showEvent($id){
        $event = Event::findOrFail($id);
        return view('singleEvent', compact('event'));
    }
}
