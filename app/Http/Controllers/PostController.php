<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\MagicCard;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(8);
        return view('posts', ['posts'=>$posts]);
    }

    public function random()
    {
        $random = Post::inRandomOrder()->first();
        return view('home', ['post'=>$random]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cards = MagicCard::doesntHave('post')->get();
        return view('posts.create',['cards'=>$cards]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $validatedData = $request->validate([
            'post_title' => 'required | max:255',
            'post_text' => 'required',
            'card_name' => 'required'
        ]);
        $card_id = DB::table('magic_cards')->where('card_name', $request->card_name)->value('id');
        $new_post = new Post;
        $new_post->post_title = $validatedData['post_title'];
        $new_post->post_text = $validatedData['post_text'];
        $new_post->magic_card_id = $card_id;
        $new_post->user_id = $user_id;
        $new_post->save();

        session()->flash('message','Post created');
        return redirect()->route('posts.index');
    }

    public function show_comments($id){
        $post = Post::FindOrFail($id);
        $original = $post->comments;
        $converted_comments =  (array) null;
        foreach($original as $comment){
            $comment = Comment::with('user')->FindOrFail($comment->id);
            array_push($converted_comments,$comment);
        }
        return $converted_comments;
    }

    public function new_comment(Request $request){
        $validatedData = $request->validate([
            'comment_text' => 'required',
            'post_id' => 'required',
            'user_id' => 'required'
        ]);
        $p = new Comment;
        $p->comment_text = $validatedData['comment_text'];
        $p->post_id = $validatedData['post_id'];
        $p->user_id = $validatedData['user_id'];
        $p->save();
        return $p::with('user')->FindOrFail($p->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::FindOrFail($id);
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::FindOrFail($id);
        return view('posts.edit', ['post'=>$post]);
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
        $validatedData = $request->validate([
            'post_title' => 'required',
            'post_text' => 'required',
        ]);
        $post = Post::FindOrFail($id);
        $post->post_title = $validatedData['post_title'];
        $post->post_text = $validatedData['post_text'];
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::FindOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message','Post deleted');
    }
}
