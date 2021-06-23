<x-app-layout>

    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- start -->
                <div class="flex-1 self-center py-1.5">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ __('Dashboard') }}
                    </h2>
                    {{-- <button wire:click="show('create')" class="focus:outline-none px-3 rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">Criar</;button>     --}}
                </div>

                <!-- end -->
                <div class="flex-1 flex-wrap w-full">
                    {{-- <input wire:model="search" class=" max-w-sm float-right appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Pesquisar"> --}}
                </div>

            </div>
        </div>
    </div>





    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
        <div class="w-full bg-white rounded-lg shadow-md px-4 py-4">

            
            <div class="grid grid-cols-1 gap-2 justify-items-stretch sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">

                <a href="{{ route('categories.index' ) }}" class="h-32 py-14 md:h-40 md:py-18 lg:h-52 lg:py-24 w-full rounded-md align-middle text-center text-lg bg-gray-200 hover:bg-indigo-500 hover:shadow-md hover:text-white"> Categorias </a>
                @for ($i=0; $i< 11; $i++) 
                <a href="{{ route('categories.index' ) }}" class="h-32 py-14 md:h-40 md:py-18 lg:h-52 lg:py-24 w-full rounded-md align-middle text-center text-lg bg-gray-200 hover:bg-indigo-500 hover:shadow-md hover:text-white"> . . . </a>
                @endfor

            </div>

        </div>
    </div>


</x-app-layout>