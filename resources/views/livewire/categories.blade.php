<div>

    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-start">
                <!-- start -->
                <div class="self-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ __('Categorias 2') }} </h2>
                </div>

                <!-- center -->
                <div>
                    @error('search')
                    <div class="p-2 bg-red-100 rounded-lg w-full mt-2">
                        <p class=" text-sm text-red-500 "> {{ $message }} </p>
                    </div>
                    @enderror
                </div>
                <!-- end -->
                <div class="h-4 self-top">

                    <form method="post" wire:submit.prevent="create" class="inline-flex " autocomplete="off">

                        <div class="flex flex-wrap w-full">
                            <div class="w-5/6 pr-1">
                                <input type="text" id="search" wire:model="search" class=" w-full border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Pesquisar">
                            </div>
                            <div class="w-1/6 ">
                                <button class="w-full p-2 bg-blue-500 rounded-lg text-white hover:bg-blue-700 font-black text-lg" type="submit"><i class="fas fa-plus fa-sm"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-4 md:px-6 lg:px-6  ">
        <div class="w-full bg-white rounded-lg shadow-md p-2">

            <table class="w-full table-auto text-left ">
                <thead>
                    <tr>
                        <th class="text-center">Status</th>
                        <th>Categorias</th>
                        <th class="text-center">Produtos</th>
                        <th class="text-center hidden sm:block md:block ">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="hover:bg-gray-100">
                        <td class="text-center py-1">
                            <form method="post" wire:submit.prevent="toogle( {{ $category->id }} )">
                                @if ($category->status)
                                <button type="submit" class="px-3 rounded-lg bg-green-100 border border-green-300 text-green-500 ">ON</button>
                                @else
                                <button type="submit" href="#" class="px-2 rounded-lg bg-red-100 border border-red-300 text-red-500 ">OFF</button>
                                @endif
                            </form>
                        </td>

                        <td class="w-1/5">
                            @if($editing===$category->id)
                                <input type="text" wire:model="update" class=" w-full border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" >
                            @else
                             {{ $category->name }}
                            @endif
                        </td>
                        <td class="text-center">00</td>
                        <td class="text-center hidden sm:block md:block ">

                            @if($confirming===$category->id)
                            <div class="grid gap-2 grid-cols-2">
                                <button wire:click="cancel()" class="focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-gray-500 hover:text-white hover:border-gray-500"><i class="fas fa-times"></i></button>
                                <button wire:click="delete({{ $category->id }})" class=" focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-red-500 hover:text-white hover:border-red-500"><i class="fas fa-check"></i></button>
                            </div>
                            @elseif($editing===$category->id)
                            <div class="grid gap-2 grid-cols-2">
                                <button wire:click="cancel()" class="focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-gray-500 hover:text-white hover:border-gray-500"><i class="fas fa-times"></i></button>
                                <button wire:click="update()" class=" focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-green-500 hover:text-white hover:border-green-500"><i class="fas fa-check"></i></button>
                            </div>
                            @else
                            <div class="grid gap-2 grid-cols-3">
                                <a href="#" class="focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-blue-500 hover:text-white hover:border-white">VER</a>
                                <button wire:click="edit({{ $category->id }})" class="focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-blue-500 hover:text-white hover:border-blue-500">EDITAR</button>
                                <button wire:click="confirmDelete({{ $category->id }})" class="focus:outline-none px-3 rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-red-500 hover:text-white hover:border-red-500">REMOVER</button>
                            </div>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <hr class="mt-2">

            <div class="pl-2 pr-0 py-2">
                {{ $categories->links() }}
            </div>



        </div>

        
           
    </div>

</div>