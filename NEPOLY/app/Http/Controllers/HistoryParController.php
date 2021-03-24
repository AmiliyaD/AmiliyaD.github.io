<?php

namespace App\Http\Controllers;
use App\Models\HistoryPar;
use App\Models\HistoryText;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentPar;
use App\Models\Genre;

class HistoryParController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('works.allWorks', ['history'=>HistoryPar::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $par_id)
    {
        return view('works.showParWork', ['historyPar'=> HistoryText::find($par_id), 'comments'=> CommentPar::where('history_parid', $par_id)->get()] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryPar  $historyPar
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryPar $historyPar, $id)
    {
        //
        return view('profile.addPar', ['par'=>HistoryPar::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryPar  $historyPar
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryPar $historyPar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryPar  $historyPar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryPar $historyPar)
    {
        //
        $upd = HistoryPar::find($request->his_id);
        $upd->title = $request->par_title;

        $upd->text = $request->par_body;
        // $request->validate([
        //     'par_title' => 'required',
        //     'par_body' => 'required',
        // ]);

        $request->session()->flash('info', 'История обновлена!');
        return redirect()->route('addPar', ['id'=> $request->his_id]);
    }

    public function finishWork(Request $request)
    {
        $finish = HistoryPar::find($request->finish_id);
        $finish->status = 'Завершен';
        $finish->save();
        // if ($finish->status == 'Завершен') {
        //     $request->session()->flash('info', 'Вы уже завершили историю!');
        //     return redirect()->route('dashboard');
        // }
        $request->session()->flash('info', 'История завершена!');
        return redirect()->route('dashboard');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryPar  $historyPar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HistoryPar $historyPar)
    { 
        // $delComment = HistoryPar::where('id', $request->del_id)->comments->get();
        // return $delComment;
        // // ПОЛНОЕ УДАЛЕНИЕ ИСТОРИИ
        $commetn = Comment::where('post_id', $request->del_id);
        $commetn->delete();

        $delT = HistoryText::where('history_id', $request->del_id);
        $delT->delete();

        $del = HistoryPar::find($request->del_id);
        $del->delete();

       
        // после удаления
        $request->session()->flash('info', 'История удалена!');
        return redirect()->route('dashboard');

        //
    }



   
}
