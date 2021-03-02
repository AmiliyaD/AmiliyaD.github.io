<?php

namespace App\Http\Controllers;
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
    public function show(HistoryText $historyText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryText $historyText)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryText $historyText)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryText  $historyText
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryText $historyText)
    {
        //
    }
}
