<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Model\WhiteList\Validation;
use App\Model\WhiteList\ActiveVATPayer;
use Illuminate\Http\Response;

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


Route::post('/validate', function (Request $request) {
    
    $validation = new Validation($request->get('nip'), $request->get('iban'));
    if (!$validation->validate()) {
        return new Response([
            'exception' => [
                'code' => '400',
                'message' => 'Invalid params provide to method [nip:required, iban] required',
            ],
        ],400);
    }
    $isActive = ActiveVATPayer::check($validation);
    
    return new Response(['vatPayer' => $isActive]);
    
});
