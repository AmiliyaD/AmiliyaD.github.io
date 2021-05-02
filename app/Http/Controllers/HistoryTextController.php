<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryText;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\HistoryPar;
use PDF;


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
        $history = HistoryText::where('id', $ed_id)->first();

        return view('profile.editPar', ['edit'=> $history]);
       
    }



    
    public function update(Request $request, HistoryText $historyText)
    {
    
        $edPar = HistoryText::find($request->history_id);

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

    //  УДАЛЯЕМ РАБОТУ
    public function destroy(HistoryText $historyText, Request $request)
    {

        $delPar = HistoryText::find($request->his_id);
        $delPar->delete();
                 
        $request->session()->flash('info', 'Глава успешно удалена!');
        return redirect()->route('addPar', ['id'=> $request->history]);
        
    }


    // СКАЧИВАЕМ ФАЙЛ В PDF
    public function downloadPdf(Request $request)
    {
        $his = HistoryPar::where('id', $request->history_id)->get();
        $historyText = HistoryText::where('history_id', $his[0]->id)->get();
        $mass = [$his, $historyText];
        $name = $his[0]->title;
 
        view()->share('text', $his);
        view()->share('text', $historyText);
        $pdf = PDF::loadView('pdfView', ['historyPar'=> $his, 'historyTexts'=>$historyText]);
        return $pdf->download("\'$name\'.pdf");
       
    }
}
