{{-- Creations des Messages --}}
@extends('home')

@section('content')

<form action="/forum/{{$nbSalon}}/{{$nbDisc}}/mess_create" method="POST">
    @csrf
    <textarea placeholder="Aa" name="Message_contenu"></textarea>
    <input type="text" placeholder="Auteur du message" name="Auteur_mess">
    <input type="submit" value="Creer">
</form>

@endsection
