<?php

namespace App\Http\Controllers;

// use Request;
use Validator;
use Illuminate\Http\Request;
use DB;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To limit the number of hits to the db, I'll query all posts and filter by user and active status in blade template
        $posts = DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->select('posts.id', 'posts.active', 'posts.title', 'posts.body', 'posts.published_at', 'users.name')
                        ->whereNull('posts.deleted_at')
                        ->orderBy('posts.published_at', 'desc')
                        ->get();
        return view('home')->with('posts', $posts);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create')->with('user_id', \Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'body' => 'required'
        );
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('posts/create')->withErrors($validator)->withInput();
        }
        else {
            $input = $request->all();
            $input['active'] = isset($input['active']) ? 1 : 0;
            Post::create($input);

            // redirect
            \Session::flash('message', 'Successfully created post');
            return redirect('posts');
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->select('posts.id', 'posts.title', 'posts.body', 'posts.published_at', 'users.name')
                        ->where('posts.id', '=', $id)
                        ->first();

        return view('posts')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->select('posts.id', 'posts.active', 'posts.title', 'posts.body', 'posts.published_at', 'users.name')
                        ->where('posts.id', '=', $id)
                        ->first();

        return view('edit')->with('post', $post);
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
        $rules = array(
            'title' => 'required',
            'body' => 'required',
        );
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('posts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $post = Post::findOrFail($id);
            $input = $request->all();

            $input['active'] = isset($input['active']) ? 1 : 0;
            $post->update($input);

            // redirect
            \Session::flash('message', 'Successfully updated post');
            return redirect('posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete($id);

        return redirect('posts');
    }

    public function search()
    {
        $query = \Request::get('query');
        $results = DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->select('posts.id', 'posts.active', 'posts.title', 'posts.body', 'posts.published_at', 'users.name')
                        ->where('posts.title', 'like', '%'.$query.'%')
                        ->whereNull('posts.deleted_at')
                        ->orderBy('posts.published_at', 'desc')
                        ->get();
        return view('results')->with('results', $results); 


    }
}
