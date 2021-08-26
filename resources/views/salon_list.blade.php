{{-- La liste des Salons affiché dans le Home --}}
@extends('home')

@section('content')

    <div class="flex">
        <p>Ici tu peux trouver la liste des Salons :</p>
        <a href="/forum/create">Creer un Salon</a>
    </div>

    <div class="container">
        <div class="bg-black text-white list-group">
            @foreach ($salons as $salon)
                <div class="list-group-item hover:bg-blue-500">
                    <a href="/forum/{{ $salon->id }}">
                        <div class="titre_salon">
                            {{ $salon->Titre }}
                        </div>
                        <div class="description_salon">
                            {{ $salon->Description }}
                        </div>
                    </a>
                </div>
                {{ $salons->links() }}
            @endforeach
        </div>
    </div>
@endsection