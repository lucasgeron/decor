<x-slot name="header">
    <div class="inline-flex">

        <h2 class="flex-auto  font-semibold text-xl text-gray-800 leading-tight"> {{ __('Categorias') }} </h2>
        
        <form method="post" wire:submit.prevent="create" autocomplete="off" class=" flex-auto">

            <div class="flex-auto"> 
                <input type="text" id="name" wire:model="search" class=" border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Pesquisar">
            </div>

            <div class="flex-auto">     
                <button class=" p-2 bg-blue-500 rounded-lg text-white hover:bg-blue-700 font-black text-lg" type="submit">+</button>
            </div>
             

        </form>
     
    </div>
</x-slot>

    <div class="flex-1 ">
        
            <div class=" w-full">
                <div class="w-5/6 pr-1">
                  


                </div>
                <div class="w-1/6 ">
                  
                </div>
            </div>

       

    </div>



<div class="container mx-auto mt-2 space-y-2">

    <div class="w-full bg-white rounded-lg shadow-md p-2">
    <table class="w-full table-auto text-left ">
        <thead>
          <tr>
            <th class="text-center">Status</th>
            <th>Categorias</th>
            <th class="text-center">Produtos</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
          <tr class="hover:bg-gray-100">
            <td class="text-center py-1">   
                @if ($category->status)
                    <span class="px-2 rounded-lg bg-green-100  text-green-500 font-bold"> ON </span>
                @else
                    <span class="px-2 rounded-lg bg-red-100  text-red-500 font-bold"> OFF </span>
                @endif
            </td>
            <td class="w-3/5">{{ $category->name }}</td>
            <td class="text-center">00</td>
            <td class="text-center">
                <a href="#" class="px-2 mr-1 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white"><i class="fas fa-arrow-right fa-sm"></i><a/>
                <a href="#" class="px-2 mr-1 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white"><i class="fas fa-edit fa-sm"></i><a/>
                <a href="#" class="px-2 rounded-lg bg-gray-100 hover:bg-red-500 hover:text-white"><i class="fas fa-trash-alt fa-sm"></i> <a/>
            </td>
          </tr>

          @endforeach
         
        </tbody>
      </table>    
    </div>
          

    
   


</div>
