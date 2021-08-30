{{-- La liste des Salons affiché dans le Home --}}
@extends('layouts.app')

@section('content')

    <div>
        <a class="ml-8" href="{{ route('Create_form') }}">Creer un Salon</a>
    </div>

    <div class="flex mt-7 mb-7 shadow">
        <div class="container">
            <div class="bg-white text-white flex flex-wrap justify-around">
                @foreach ($salons as $salon)
                    <div class="hover:bg-blue-500 m-4 text-center shadow bg-gray-100 mt-auto w-24 text-black">
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

    </div>




@endsection
