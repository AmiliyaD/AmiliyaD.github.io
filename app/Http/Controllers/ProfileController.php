<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\User;
use App\Models\HistoryPar;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $his = HistoryPar::where('user_id', Auth::user()->id)->get();
        if (Auth::user()->roleName == 'Admin') {
            $genres = Genre::all();
            return view('adminProfile.adminProfile', ['genre'=>$genres, 'history'=>$his]);
        }
    
        return view('profile.home', ['history'=>$his]);

  
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
        
        $user = User::find($request->userID);
        $user->user_avatar = $_FILES['userAvatar']['name'];
        $user->save();

      $let =  move_uploaded_file($_FILES['userAvatar']['tmp_name'], 'avatar/'.$_FILES['userAvatar']['name']);
      

        $request->session()->flash('ava', 'Аватарка успешно обновлена!');
        return redirect()->route('dashboard');
      
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
