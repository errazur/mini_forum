{{-- Formulaire de création des discussions --}}
@extends('home')

@section('content')

<form action="/forum/{{$nbSalon}}/disc_create" method="POST">
    @csrf
    <input type="text" placeholder="Titre de la discussion" name="titre_disc">
    <textarea placeholder="Message de la discussion" name="message_disc"></textarea>
    <input type="text" placeholder="nom de l'auteur" name="auteur_disc">
    <input type="submit" value="Creer">
</form>

@endsection
