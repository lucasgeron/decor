<div>

    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- start -->
                <div class="flex-1 self-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ __('Categorias') }} </h2>
                    <button wire:click="show('create')" class="focus:outline-none px-3 rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">Criar</button>    
                </div>

                <!-- end -->
                <div class="flex-1 flex-wrap w-full">
                    <input wire:model="search" class=" max-w-sm float-right appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Pesquisar">
               </div>

            </div>
        </div>
    </div>


    @if($create)
        <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
            <div class="w-full bg-white rounded-lg shadow-md px-4 py-4">
               
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> Nova Categoria </h3>
                <button wire:click="hide('create')" class="focus:outline-none  text-gray-300  hover:text-gray-500 "><i class="fas fa-times"></i></button>         
            </div>
           
            @error('title')
                <div class="p-2 bg-red-100 rounded-lg w-full mb-4">
                    <p class=" text-sm text-red-500 "> {{ $message }} </p>
                </div>
            @enderror
            
            <form method="post" wire:submit.prevent="create" autocomplete="off" class="w-full ">

                <div class="flex flex-wrap -mx-3">
                  <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titler">
                        Título
                        </label>
                        <input wire:model="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Categoria">
                    </div>
                </div>

                <div class="flex justify-end  w-full py-2 ">
                    <button wire:click="hide('create')" class="flex-1 max-w-xs bg-gray-100 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-gray-700 hover:text-white p-2 mr-2 rounded" type="button" >
                        Cancelar
                    </button>

                    <button class=" flex-1 max-w-xs bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white  p-2 rounded" type="submit">
                        Salvar
                    </button>
                </div>
              
            </form>
            
            
            </div>
        </div>
    @endif

    @if (session()->has('flash'))
        <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
            <div class="w-full  bg-{{ session('flash')['color'] }}-100 text-{{ session('flash')['color'] }}-500 rounded-lg shadow-md px-4 py-4">
                <p> <span class="uppercase font-bold"> {{ session('flash')['title']  }} </span> - {{ session('flash')['message']  }}
                </p>
            </div>
        </div>  
    @endif

    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
        <div class="w-full bg-white rounded-lg shadow-md px-4 py-4">

        <div class="pl-2 pr-0 py-2">
            {{ $categories->links() }}
        </div>

        <hr class="my-2">

        @error('update')
        <div class="p-2 bg-red-100 rounded-lg w-full mb-4">
            <p class=" text-sm text-red-500 "> {{ $message }} </p>
        </div>
        @enderror

        <table class="w-full table-fixed justify-between">
            <thead>
                <tr>
                    <th class="w-1/12 text-center">Status</th>
                    <th class="w-2/12 md:w-4/12 lg:w-6/12 text-left">Categorias</th>
                    <th class="w-2/12 text-center">Produtos</th>
                    <th class="w-3/12 text-center hidden sm:table-cell  ">Ações</th>
                </tr>
            </thead>

            <tbody >
                @foreach ($categories as $category)
                <tr class=" h-12 align-middle @if($el===$category->id && $delete) bg-red-100 hover:bg-red-100 @elseif($el===$category->id && $edit)  hover:bg-white @else hover:bg-gray-100 @endif">

                    <td class="text-center "> {{-- status --}}
                        <form method="post" wire:submit.prevent="toogle( {{ $category->id }} )">
                            @if ($category->status)
                            <button type="submit" class="px-3 rounded-lg bg-green-100 border border-green-300 text-green-500 ">ON</button>
                            @else
                            <button type="submit" href="#" class="px-2 rounded-lg bg-red-100 border border-red-300 text-red-500 ">OFF</button>
                            @endif
                        </form>
                    </td>

                    
                    <td> {{-- title --}}
                        @if($el===$category->id && $edit)
                            <input wire:model="update" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Categoria">
                        @else
                            {{ $category->title }}
                        @endif
                    </td>

                    <td class="text-center"> {{-- ammount --}}
                        --
                    </td>
                    
                    <td class="text-center hidden sm:table-cell"> {{-- actions --}}

                        @if($el===$category->id && $delete)
                        <div class="flex justify-between gap-1">
                            <button wire:click="hide('delete')" class="flex-1 focus:outline-none rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-gray-500 hover:text-white hover:border-gray-500 text-xs font-bold uppercase tracking-wide p-1">Cancelar</button>
                            <button wire:click="delete({{ $category->id }})" class="flex-1 focus:outline-none rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-red-500 hover:text-white hover:border-red-500 text-xs font-bold uppercase tracking-wide p-1">Confirmar</button>
                        </div>
                        @elseif($el===$category->id && $edit)
                        <div class="flex justify-between gap-1">
                            <button wire:click="hide('edit')" class="flex-1 focus:outline-none rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-gray-500 hover:text-white hover:border-gray-500 text-xs font-bold uppercase tracking-wide p-1">Cancelar</button>
                            <button wire:click="update()" class="flex-1 focus:outline-none rounded-lg bg-gray-100 border border-gray-300 text-gray-500 hover:bg-indigo-700 hover:text-white hover:border-indigo-700 text-xs font-bold uppercase tracking-wide p-1">Confirmar</button>
                        
                        </div>
                        @else
                        <div class="flex justify-between gap-1">
                            <button wire:click="show('delete', {{ $category->id }})" class=" text-center p-1 rounded-lg bg-gray-100 border hover:border-red-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-red-700 text-xs font-bold align-middle focus:outline-none ">Remover</button>
                            <button wire:click="show('edit', {{ $category->id }})" class=" text-center p-1 rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none">Editar</button>
                            <a href="#" class=" text-center p-1 rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none ">Ver</a>
                        </div> 
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody> 
        </table>


        </div>
    </div> 

</div>