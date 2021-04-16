<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\HistoryPar;
use App\Models\HistoryText;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/v1/historyPar/getLike', function (Request $request) {
   
   
    // Выводим ID конкретной работы
    $request_body = file_get_contents('php://input');
    $n = json_decode($request_body);
    // Находим работу с переданным ID в базе
    $par = HistoryPar::find($n);
    $par->likes = $par->likes + 1;
    $par->save();

    $par2 = HistoryPar::where('id', $n)->first();


     return [$par2->likes];
        // return redirect()->route('showWork', ['id'=> $request->historyId, 'userIdButton' => $request->authId]);
})->name('getLike');