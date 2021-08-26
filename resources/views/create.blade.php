{{-- Création des Salons --}}
@extends('home')

@section('content')

<form action="/forum" method="POST">
    @csrf
    <input type="text" placeholder="Titre du Salon" name="titre">
    <textarea placeholder="Description du Salon" name="description"></textarea>
    <input type="submit" value="Creer">
</form>

@endsection
