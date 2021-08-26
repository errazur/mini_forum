<?php

use Illuminate\Support\Facades\Route;
use App\Models\Salon;
use App\Models\Discussion;
use App\Models\Message;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   Made by No L's
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/forum', function () {
    $salons = Salon::paginate(20);
    return view('salon_list', [
        'salons' => $salons
    ]);
});

Route::post('/forum', function (){
    $Salon = new Salon();
    $Salon->Titre = request()->input('titre');
    $Salon->Description = request()->input('description');
    $Salon->save();
    return redirect('/forum');
});

route::get('/forum/create', function () {
    return view('create');
});

route::get('/forum/{salon}', function (Salon $salon){

    $discussion = Discussion::where('id_salon', $salon->id)
    ->paginate(20);

    return view('salon', [
        'discussion' => $discussion ,
        'nbSalon' => $salon->id
    ]);
});

Route::post('/forum/{salon}/disc_create', function (Salon $salon) {
    $Disc = new Discussion();
    $Disc->Titre = request()->input('titre_disc');
    $Disc->Message = request()->input('message_disc');
    $Disc->auteur_de_discussion = request()->input('auteur_disc');
    $Disc->id_salon = $salon->id;
    $Disc->save();
    return redirect("/forum/$salon->id");
});

route::get('/forum/{salon}/disc_create', function (Salon $salon) {
    return view('disc_create',[
        'nbSalon' => $salon->id
    ] );
});

route::get('/forum/{salon}/{discussion}/message_list', function (Salon $salon, Discussion $discussion) {

    $message = Message::where('id_discussion', $discussion->id)
    ->paginate(20);

    return view('message_list', [
        'nbDisc' => $discussion->id,
        'nbSalon' => $salon->id,
        'message' => $message
    ]);
});

route::post('/forum/{salon}/{discussion}/mess_create', function (Salon $salon, Discussion $discussion) {
    $Mess = new Message();
    $Mess->text_du_message = request()->input('Message_contenu');
    $Mess->auteur_message = request()->input('Auteur_mess');
    $Mess->	id_discussion = $discussion->id;
    $Mess->save();

    return redirect("/forum/$salon->id/$discussion->id/message_list");
});

route::get('/forum/{salon}/{discussion}/mess_create', function (Salon $salon, Discussion $discussion) {
    return view('mess_create', [
        'nbDisc' => $discussion->id,
        'nbSalon' => $salon->id,
    ]);
});
