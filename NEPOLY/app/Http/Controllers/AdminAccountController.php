<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Models\AdminAccount;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
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
            'name' => 'required|bail',
        ]);
        $addGenre = new Genre;
        $addGenre->name = $request->name;
        $addGenre->colorBack = $request->colorBack;
        $addGenre->colorText = $request->colorText;
        $addGenre->save();

        $request->session()->flash('info', "Новый жанр успешно добавлен");
        return redirect()->route('dashboard');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminAccount  $adminAccount
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAccount  $adminAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAccount  $adminAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminAccount  $adminAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AdminAccount $adminAccount)
    {
        $validated = $request->validate([
            'checkedGenres' => 'required|bail',
        ]);
        for ($i = 0;  $i < count($request->checkedGenres); $i++) {
          $delGenre = Genre::where('id', (int)$request->checkedGenres[$i]);
          $delGenre->delete();
         
        }
        $request->session()->flash('info', "Жанры успешно удалены");
        return redirect()->route('dashboard');
    }
}
