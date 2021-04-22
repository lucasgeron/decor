<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-center">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

                    <!-- 1 card -->
                    <div class=" bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                        <a href="{{ route('categorias') }}" class="text-xl font-semibold my-2 hover:text-blue-500 ">Categorias</a>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <p>Total: 2 / 2</p>
                        </div>
                    </div>

                    <!-- 2 card -->
                    <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                        <a href="{{ route('categorias') }}" class="text-xl font-semibold my-2 hover:text-blue-500 ">Produtos</a>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <p>Total: 175 / 179</p>
                        </div>
                    </div>


                    <!-- 3 card -->
                    <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                        <a href="{{ route('categorias') }}" class="text-xl font-semibold my-2 hover:text-blue-500 ">Pedidos</a>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <p>Total: 00037</p>
                        </div>
                    </div>


                    <!-- 4 card -->
                    <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                        <a href="{{ route('categorias') }}" class="text-xl font-semibold my-2 hover:text-blue-500 ">Usuários</a>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <p>Total: 17</p>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>




</x-app-layout>