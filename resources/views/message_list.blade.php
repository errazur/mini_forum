{{-- Liste des Message dans la discussion --}}
@extends('layouts.app')

@section('content')

<div>
    <p>Voici la conversation :</p>
    <a href="/forum/{{$nbSalon}}/{{$nbDisc}}/mess_create">Envoyer un message</a>
</div>

<div>
@foreach ($message as $mess)
    <div class="list-group">
        <div class="titre_disc">
            {{ $mess->text_du_message	 }}
        </div>
        <div class="description_disc">
            {{ $mess->created_at }}
        </div>
        <div class="auteur_disc">
            {{$mess->auteur_message}}
        </div>
    </div>
{{ $message->links() }}
@endforeach
</div>
@endsection
