<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un personnage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Formulaire d'ajout d'un personnage
                    <br><br>

                    <form method="post" action="{{ route('personnageadded') }}" enctype="multipart/form-data"><br>
                        Prénom: <input type="text" name="firstname"><span style="color:red">@error('firstname'){{$message}}@enderror</span><br>
                        Nom de famille: <input type="text" name="lastname"><span style="color:red">@error('lastname'){{$message}}@enderror</span><br>
                        Nom du personnage: <input type="text" name="charactername"><span style="color:red">@error('charactername'){{$message}}@enderror</span><br>
                        Image: <input type="file" name="image"><span style="color:red">@error('photo'){{$message}}@enderror</span><br>
                        Age: <input type="number" name="age"><span style="color:red">@error('age'){{$message}}@enderror</span><br>
                        Pouvoir: <input type="text" name="power"><span style="color:red">@error('power'){{$message}}@enderror</span><br>
                        Date de naissance: <input type="date" name="dateofbirth"><span style="color:red">@error('date'){{$message}}@enderror</span><br>
                        Film dans lequel il a joué: 
                        <select class="js-example-basic-single" name="filmsid">
                            @foreach($films as $film)
                                <option value="{{ $film->id }}">{{ $film->name }}</option>
                            @endforeach
                        </select><br>
                        <input type="submit" value="Ajouter un personnage">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>