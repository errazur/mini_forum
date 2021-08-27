{{-- Création des Salons --}}
@extends('layouts.app')

@section('content')

<form action="{{route('Create_form')}}" method="POST">
    @csrf
    <input type="text" placeholder="Titre du Salon" name="Titre">
    <textarea placeholder="Description du Salon" name="Description"></textarea>
    <input type="submit" value="Creer">
</form>

@endsection
