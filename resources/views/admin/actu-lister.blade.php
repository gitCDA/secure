<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Liste des actus") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                @forelse($listeactu as $listeactu)

                                    <!-- component -->
                <div class="h-content flex flex-col gap-y-4 items-center justify-center bg-white">

                <!-- Card 1 -->
                <a href="{{ route('admin-actu-modifier', $listeactu) }}" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

                <!-- Badge -->
                <p class="bg-sky-500 w-fit px-4 py-1 text-sm font-bold text-white rounded-tl-lg rounded-br-xl"> {{ $listeactu->created_at }} </p>

                <div class="grid grid-cols-7 p-5 gap-y-2">

                    <!-- Profile Picture -->
                    <div>

                    <!-- Détecte si il y a une image dans la bdd -->
                    @if (isset($listeactu->image))
                    <img src="{{ $listeactu->image }}" class="max-w-16 max-h-16 rounded-full" />
                    @endif
                    
                    </div>

                    <!-- Description -->
                    <div class="col-span-5 md:col-span-4 ml-4">

                    <p class="text-gray-500 font-bold"> {{ $listeactu->titre }} </p>

                    <p class="text-gray-400"> {{ $listeactu->description }} </p>

                    </div>

                    <form action="{{ route('supprimer', ['listeactu'=>$listeactu]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <button type="submit" class=" px-5 py-1 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">Supprimer Actualité</button>

                    </form>
                </div>

                </a>

                </div>

                @empty

                <h1>Il n'y a pas d'actualités</h1>

                @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>