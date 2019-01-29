<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Post;
class NewsController extends Controller
{
    //
    public function index(){
    	$posts = Post::latest()->paginate(10);
    	return view('dashboard.admin.news',compact('posts'));
    }

    public function create(){
    	return view('dashboard.admin.addNews');
    }

    public function store(Request $request){

    	$this->validate($request,[ 
    		'title' => 'required|string|max:250',
    		'content' =>'required',
    		'thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png'
    	]);
    	$post = new Post();
    	$post->title =$request->get('title');
    	$post->content = $request->get('content');

    	if($request->hasFile('thumbnail')){
            $thumbnail = Input::file('thumbnail');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $path = 'uploads/thumbnail/'.date('Y-m-d').'/';
            // $dir = $path.'/'.$thumbnailName;
            // if(Storage::disk('public')->put($path.'/'.$thumbnailName, File::get($thumbnail))){
            //  $post->thumbnail = $dir;
            // }
            if($thumbnail->move($path, $thumbnailName)){
                $post->thumbnail = $path.''.$thumbnailName;
            }
		}
		if($post->save())
			return back()->with('error','رویداد با موفقیت ایجاد شد');
		return back()->with('error','ایجاد رویداد ناموفقیت آمیز بود');
    }

    public function delete($id){
    	if(Post::destroy($id))
            return back();
        return back()->with('error','عملیات نا موفق بود');
    }

    public function show($id){
    	$post = Post::findOrFail($id);
    	return view('dashboard.admin.editNews',compact('post'));
    }

    public function update(Request $request, $id){
    	$post = Post::find($id);
    	$this->validate($request,[ 
    		'title' => 'required|string|max:250',
    		'content' =>'required',
    		'thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png'
    	]);

    	$post->title =$request->get('title');
    	$post->content = $request->get('content');

    	if($request->hasFile('thumbnail')){
			$thumbnail = Input::file('thumbnail');
    		$thumbnailName = $thumbnail->getClientOriginalName();
            $path = 'uploads/thumbnail/'.date('Y-m-d').'/';
    		// $dir = $path.'/'.$thumbnailName;
    		// if(Storage::disk('public')->put($path.'/'.$thumbnailName, File::get($thumbnail))){
    		// 	$post->thumbnail = $dir;
    		// }
            if($thumbnail->move($path, $thumbnailName)){
                $post->thumbnail = $path.''.$thumbnailName;
            }
		}
		if($post->save())
			return back()->with('error','رویداد با موفقیت ایجاد شد');
		return back()->with('error','ایجاد رویداد ناموفقیت آمیز بود');

    }
}
