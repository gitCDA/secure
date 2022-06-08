<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Actu Client</title>
</head>
<body>

<ul>
    @foreach ($semaines as $semaine)

    <li class= flex flex-col>{{ $semaine->jours }}</li>
        
    @endforeach
</ul>

@forelse ($listeactus as $listeactu)
                                                                      
<!-- Card 1 -->
<a href="{{ route('admin-actu-modifier', $listeactu) }}" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

<!-- component -->
<div class="mx-5">

    <div class="flex flex-col bg-white shadow-lg rounded lg:w-1/3  md:w-1/2 w-full p-5 mx-auto ">
        <!-- Item 1 -->
        <div class="odd:bg-gray-50 flex gap-3 items-center font-semibold text-gray-800 p-3 hover:bg-gray-100 rounded-md hover:cursor-pointer">
            <!-- Détecte si il y a une image dans la bdd -->
            @if (isset($listeactu->image))
            <img src="{{ $listeactu->image }}" class="max-w-16 max-h-16 rounded-full" />
            @endif
        <div class="flex flex-col">
                <div>
                {{ $listeactu->titre }}
                </div>
                <div class="text-gray-400 text-sm font-normal">
                {{ $listeactu->description }} {{ $listeactu->created_at }}
                </div>
            </div>
        </div>
    </div>

</div>

    <form action="{{ route('client_detail', ['listeactu'=>$listeactu]) }}" method="get" enctype="multipart/form-data">

    <button type="submit" class=" px-5 py-1 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">Détail Actualité</button>

    </form>
</div>

</a>

</div>

@empty

<h1>Il n'y a pas d'actualités</h1>

@endforelse

</body>
</html>