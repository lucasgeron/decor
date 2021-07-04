    {{-- Header --}}
    <div class="bg-white shadow ">
        <div class="main ">
            <div class="flex justify-between items-center  px-2">
                <!-- start -->
                <div class="flex-1 self-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ $title }}
                    </h2>
                    <button wire:click="showModal('create')"
                        class="focus:outline-none px-3 rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">Criar</button>
                </div>

                <!-- end -->
                <div class="flex-1 flex-wrap w-full">
                    <div
                        class="flex -m-2 -p-3 max-w-sm float-right appearance-none w-full bg-gray-200 text-gray-700 border-gray-200 rounded-lg  focus:outline-none border-0 focus:ring-0 focus:ring-offset-0">
                        @if ($search)
                            <i class="fas fa-search my-auto ml-4 text-indigo-700"></i>
                        @else
                            <i class="fas fa-search my-auto ml-4"></i>
                        @endif
                        <input wire:model="search"
                            class=" max-w-sm float-right appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded-lg p-2 focus:outline-none border-0 focus:ring-0 focus:ring-offset-0"
                            type="text" placeholder=" Pesquisar">
                    </div>
                </div>
            </div>
        </div>
    </div>