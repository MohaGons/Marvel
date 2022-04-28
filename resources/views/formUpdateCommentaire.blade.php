<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Welcome on the Wall
                   <br><br>
                    <form method="post" action="{{ route('updatecommentaire') }}">
                        <input type="hidden" name="id" value="{{ $commentairePersonnage->id }}">
                        <input type="text" name="commentaire" value="{{ $commentairePersonnage->content }}">
                        <input type="submit" value="Update message">
                        @csrf
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>