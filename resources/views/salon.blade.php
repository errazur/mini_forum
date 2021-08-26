{{-- La liste des discussions dans le Salon --}}
@extends('home')

@section('content')

<div>
    <p>Voici la liste des discussion :</p>
    <a href="/forum/{{$nbSalon}}/disc_create">Creer une discussion</a>
</div>

@foreach ($discussion as $disc)
<a href="/forum/{{$nbSalon}}/{{$disc->id}}/message_list">
    <div class="flex">
        <div class="titre_disc">
            {{ $disc->Titre }}
        </div>
        <div class="description_disc">
            {{ $disc->Message }}
        </div>
        <div class="auteur_disc">
            {{$disc->auteur_de_discussion}}
        </div>
        <div class="date_disc">
            {{$disc->created_at}}
        </div>
    </div>
</a>
{{ $discussion->links() }}
@endforeach

@endsection
