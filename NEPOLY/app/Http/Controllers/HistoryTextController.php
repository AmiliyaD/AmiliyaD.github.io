<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryText;
use Illuminate\Http\Request;

class HistoryTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::check()) {
        return view('addHistory');
       }
       else {
        return "не зареган";
       }
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
        //
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
