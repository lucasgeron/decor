<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="sm:container mx-auto grid grid-cols-1 md:px-2 md:mt-2 md:grid-cols-2 md:gap-2 lg:grid-cols-3 xl:grid-cols-4">
        <div>@livewire('search-users')</div>
        <div>@livewire('search-categories')</div>
    </div>

    


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

</x-app-layout>