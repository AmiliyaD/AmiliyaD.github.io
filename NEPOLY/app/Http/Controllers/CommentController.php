<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentPar;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'commentText' => 'required|min:1',
            'authId' => 'required',
        ]);


        $addComment = new Comment;
        $addComment->user_id = $request->authId;
        $addComment->post_id = $request->historyId;
        $addComment->comment_text = $request->commentText;
        $addComment->commentAuthor = $request->author;
        $addComment->save();
         $request->session()->flash('info', 'Комментарий успешно добавлен!');
        return redirect()->route('showWork', ['id'=> $request->historyId]);
    }

    public function storePar(Request $request)
    {
        $addCommentPar = new CommentPar;
        $addCommentPar->user_id = $request->authId;
        $addCommentPar->history_parId = $request->historyId;
        $addCommentPar->commentText = $request->commentText;
        $addCommentPar->commentAuthor = $request->author;
        $addCommentPar->save();

        $request->session()->flash('info', 'Комментарий к главе успешно добавлен');
        return redirect()->route('showWorkPar', ['par_id'=>$request->historyId]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
