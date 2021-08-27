{{-- Formulaire de création des discussions --}}
@extends('layouts.app')

@section('content')

<form action="/forum/{{$nbSalon}}/disc_create" method="POST">
    @csrf
    <input type="text" placeholder="Titre de la discussion" name="Titre">
    <textarea placeholder="Message de la discussion" name="Message"></textarea>
    <input type="text" placeholder="nom de l'auteur" name="auteur_de_discussion">
    <input type="hidden" name="id_salon" value="{{$nbSalon}}">
    <input type="submit" value="Creer">
</form>

@endsection
