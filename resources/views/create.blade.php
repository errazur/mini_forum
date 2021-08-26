{{-- Création des Salons --}}
@extends('home')

@section('content')

<form action="/forum" method="POST">
    @csrf
    <input type="text" placeholder="Titre du Salon" name="Titre">
    <textarea placeholder="Description du Salon" name="Description"></textarea>
    <input type="submit" value="Creer">
</form>

@endsection
