<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if (isset($listeactu->id))
            {{ __("Modification d'une actu") }}
        @else
            {{ __("Ajout d'une actu") }}
        @endif
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    
        

            <!-- FORMULAIRE AJOUT -->

            @if (isset($listeactu->id))
            <form action="{{ route('modifier', $listeactu) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{ route('editer') }}" method="POST" enctype="multipart/form-data">
            @endif

            <div class="bg-indigo-50 min-h-screen md:px-20 pt-6">
                <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">Formulaire</h1>
                <div class="space-y-4">


                <!-- Liste déroulante de sélection -->
                    <div>
                        <label for="semaine">Sélectionner un jour</label>
                            <select name="semaine" id="semaine">

                                @foreach ($semaines as $joursdelasemaine)

                                    @if ($joursdelasemaine->id == $listeactu->semaine_id)

                                    <option value="{{ $joursdelasemaine->id }}" selected>
                                    {{ $joursdelasemaine->jours }}</option>

                                    @else

                                    <option value="{{ $joursdelasemaine->id }}">
                                    {{ $joursdelasemaine->jours }}</option>   

                                    @endif
                                
                                @endforeach

                            </select>
                    </div>




            <!-- TOUJOURS METTRE LE name="" POUR QUE LE REQUEST PRENNE EN COMPTE -->
                <div>
                <label for="title" class="text-lx font-serif">Titre:</label>
                <input type="text" value="{{ $listeactu->titre }}" name="titre" id= "titre" placeholder="Titre" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

                <div>
                <label for="description" class="block mb-2 text-lg font-serif">Description:</label>
                <textarea name="description" value="{{ isset($listeactu) ?? $listeactu->description }}" id= "description" cols="30" rows="10" placeholder="Description.." class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                </div>

                <div>
                <label for="name" class="text-lx font-serif">Image:</label>
                <input type="text" value="{{ isset($listeactu) ?? $listeactu->image }}" name="image" id= "image" placeholder="Image" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

                <label for="name" class="text-lx font-serif">Image:</label>
                <input type="file" name="ImageActu" id= "image" placeholder="image" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

                @csrf

                <br>
                @if (isset($listeactu->id))
                <button type="submit" class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-red-500  ">Modifier Actualité</button>                       
                @else
                <button type="submit" class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">Ajouter Actualité</button>                       
                @endif
                
            </div>
            </div>
            </div>

            </form>
            </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>