<div class="bg-white h-64 shadow-md py-4 px-2 rounded-lg ">
    <div class="p-2">

        <div class="flex justify-between">
            <p class=" text-lg font-semibold">Categorias </p>
            <p class=" text-lg font-semibold text-gray-300 pr-4">{{ $total  }} </p>
        </div>

        <div class="border-t my-2"></div>

        <div class="relative">

            <form method="post" wire:submit.prevent="create" class="w-full max-w-lg">

                <div class="flex flex-wrap w-full">
                    <div class="w-5/6 pr-1">
                        <input type="text" id="name" wire:model="search" class=" w-full   border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Pesquisar">
                    </div>
                    <div class="w-1/6 ">
                        <button class="w-full p-2 bg-green-500 rounded-lg text-white hover:bg-green-600 font-black text-lg" type="submit">+</button>
                    </div>
                </div>

            </form>

        </div>

        
        <div class="h-32 mt-2 overflow-auto scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-gray-100 hover:scrollbar-thumb-gray-700">

            @isset($categories)
            <ul class="list-disc list-inside pt-2">
                @foreach ($categories as $category)
                <li> {{ $category->name }}</li>
                @endforeach
            </ul>
            @endisset

        </div>

    </div>
</div>