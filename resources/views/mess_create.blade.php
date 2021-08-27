{{-- Creations des Messages --}}
@extends('layouts.app')

@section('content')

<form action="/forum/{{$nbSalon}}/{{$nbDisc}}/mess_create" method="POST">
    @csrf
    <textarea placeholder="Aa" name="text_du_message"></textarea>
    <input type="text" placeholder="Auteur du message" name="auteur_message">
    <input type="hidden" name="id_discussion" value="{{$nbDisc}}">
    <input type="submit" value="Creer">
</form>

@endsection
