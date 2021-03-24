<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryText;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\HistoryPar;
class HistoryTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('profile.addWorks',['genres'=>Genre::all()]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);
        $store = new HistoryPar;
        $store->user_id = $request->user_id;
        $store->genre_id = $request->genre;
        $store->title = $request->title;
        $store->text = $request->text;
        $store->save();

        $request->session()->flash('info', 'Новая история успешно добавлена!');
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryText $historyText, $id)
    {
        //
        return view('profile.showText', ['par'=>HistoryPar::find($id)]);
    }

    public function showWork($id)
    {
        return view('works.showWork', ['work'=>HistoryPar::find($id), 'comments'=>Comment::where('post_id', $id)->get()]);
        # code...
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryText $historyText,Request $request)
    {
        //
        $add = new HistoryText;
        $add->history_title = $request->title;
        $add->history_text = $request->text;
        $add->history_id = $request->history_id;
        $add->save();
        
   $request->session()->flash('info', 'Новая глава успешно добавлена!');
        return redirect()->route('addPar', ['id'=> $request->history_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function openPar( $ed_id)
    {
        return view('profile.editPar', ['edit'=>HistoryText::where('history_id', $ed_id)->first()]);
        # code...
    }
    public function update(Request $request, HistoryText $historyText)
    {
        //
        $edPar = HistoryText::find($request->history_id);
        // $request->validate([
        //     'title' => 'required',
        //     'text' => 'required',
        // ]);
        $edPar->history_title = $request->title;
        $edPar->history_text = $request->text;
   
        $edPar->save();
         
        $request->session()->flash('info', 'Глава успешно обновлена!');
        return redirect()->route('addPar', ['id'=> $request->his_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryText $historyText, Request $request)
    {

        $delPar = HistoryText::find($request->his_id);
        $delPar->delete();
                 
        $request->session()->flash('info', 'Глава успешно удалена!');
        return redirect()->route('addPar', ['id'=> $request->history]);
        //
    }
}
