<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Genre;

use App\Models\HistoryPar;
class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('works.search', ['genres'=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


      // SEARCH FUNCTIONs

    public function searchFunc(Request $request)
    {

        $genres = Genre::all();
        // ПОИСК ПО НАЗВАНИЮ
        if (!empty($request->title)) {
            // дополненный поиск
            if ($request->status == "Завершен") {
                $search = HistoryPar::where("status", "Завершен")->where("title", "like", "$request->title%")->get();
                return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
    
            }
            if ($request->status == "В процессе") {
                $search = HistoryPar::where("status", "В процессе")->where("title", "like", "$request->title%")->get();
                return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
    
            }
  
            // поиск без других кнопок
            $search = HistoryPar::where("title", "like", "$request->title%")->get();
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
          
        }

        // ПОИСК ПО ЖАНРУ
        if($request->genre) {
            $search = Genre::find($request->genre)->histories;
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
        // ПОИСК ПО СТАТУСУ
        if ($request->status == "Завершен") {
            $search = HistoryPar::where("status", "Завершен")->get();
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);

        }
        else  if ($request->status == "В процессе") {
          
            return view('works.search', ['genres'=>$genres], ['searchResults'=> HistoryPar::where("status", "В процессе")->get()]);

         }
        //  ПОИСК ПО ПОПУЛЯРНОСТИ
        if ($request->popular == 'more') {
            $search = HistoryPar::where('status', 'Завершен')->orderBy('likes', 'desc')->get();
            
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
        if ($request->popular == 'less') {
            $search = HistoryPar::where('status', 'Завершен')->orderBy('likes', 'asc')->get();
            
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
        //  ПОИСК ПО ДАТЕ
        if ($request->date_from) {
            $search = HistoryPar::where('created', '>', $request->date_from)->get();
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
        if ($request->date_to) {
            $search = HistoryPar::where('created', '<', $request->date_to)->get();
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
        if ($request->date_from && $request->date_to) {
            $search = HistoryPar::where('created', '<', $request->date_to)->where('created', '>', $request->date_from)->get();
            return view('works.search', ['genres'=>$genres], ['searchResults'=>$search]);
        }
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
