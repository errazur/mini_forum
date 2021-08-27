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
|
*/

route::get('/', function () {
    $salons = Salon::paginate(20);
    return view('salon_list', [
        'salons' => $salons
    ]);
})->name('Accueil');

Route::middleware(['auth'])->group(function () {

    Route::post('/forum/create', function (){

        $data = request()->validate([
            'Titre' => 'min:4|required',
            'Description' => 'required'
        ]);

        $Salon = Salon :: create($data);
        // $Salon->Titre = request()->input('titre');
        // $Salon->Description = request()->input('description');
        // $Salon->save();
        return redirect('/');
    })->name('Create_salon');

    route::get('/forum/create', function () {
        return view('create');
    })->name('Create_form');

    route::get('/forum/{salon}', function (Salon $salon){

        $discussion = Discussion::where('id_salon', $salon->id)
        ->paginate(20);

        return view('salon', [
            'discussion' => $discussion ,
            'nbSalon' => $salon->id
        ]);
    })->name('Salon');

    Route::post('/forum/{salon}/disc_create', function (Salon $salon) {

        $data = request()->validate([
            'Titre' => 'required|min:4',
            'Message' => 'required|min:4',
            'auteur_de_discussion' => 'required',
            'id_salon' => 'exists:salons,id'
        ]);

        $Disc = Discussion :: create($data);
        // $Disc->Titre = request()->input('titre_disc');
        // $Disc->Message = request()->input('message_disc');
        // $Disc->auteur_de_discussion = request()->input('auteur_disc');
        // $Disc->id_salon = $salon->id;
        // $Disc->save();
        return redirect("/forum/$salon->id");
    })->name('disc_form');

    route::get('/forum/{salon}/disc_create', function (Salon $salon) {
        return view('disc_create',[
            'nbSalon' => $salon->id
        ] );
    })->name('disc_form');

    route::get('/forum/{salon}/{discussion}/message_list', function (Salon $salon, Discussion $discussion) {

        $message = Message::where('id_discussion', $discussion->id)
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        return view('message_list', [
            'nbDisc' => $discussion->id,
            'nbSalon' => $salon->id,
            'message' => $message
        ]);
    })->name('message_list');

    route::post('/forum/{salon}/{discussion}/mess_create', function (Salon $salon, Discussion $discussion) {

        $data = request()->validate([
            'text_du_message' => 'required|min:4',
            'auteur_message' => 'required',
            'id_discussion' => 'exists:discussions,id'
        ]);

        $Mess = Message :: create($data);
        // $Mess->text_du_message = request()->input('Message_contenu');
        // $Mess->auteur_message = request()->input('Auteur_mess');
        // $Mess->	id_discussion = $discussion->id;
        // $Mess->save();

        return redirect("/forum/$salon->id/$discussion->id/message_list");
    })->name('mess_form');

    route::get('/forum/{salon}/{discussion}/mess_create', function (Salon $salon, Discussion $discussion) {
        return view('mess_create', [
            'nbDisc' => $discussion->id,
            'nbSalon' => $salon->id,
        ]);
    })->name('');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
