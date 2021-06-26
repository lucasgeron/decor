{{-- Header --}}
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- start -->
                <div class="flex-1 self-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ __('Área de Testes') }}
                    </h2>
                    {{-- <button wire:click="showModal('create')"
                        class="focus:outline-none px-3 rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">Criar</button> --}}
                </div>

                <!-- end -->
                <div class="flex-1 flex-wrap w-full">
                    <input wire:model="search"
                        class=" max-w-sm float-right appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text" placeholder="Pesquisar">
                </div>

            </div>
        </div>
    </div>

    {{-- notifications --}}
    @if (session()->has('flash'))
        <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
            <div class="w-full  bg-white text-gray-700  rounded-lg shadow-md px-4 py-4">
                <p> <span class="uppercase  text-{{ session('flash')['color'] }}-500 font-bold">
                        {{ session('flash')['title']  }} </span> - {!! session('flash')['message']  !!}
                </p>
            </div>
        </div>
    @endif

{{-- content --}}
<div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6 pb-4"> {{-- Main --}}
    <div class="w-full bg-white rounded-lg shadow-md px-4 py-4 "> {{-- Container --}}

        Seja bem Vindo a Área de Testes. 



{{-- badges numbers --}}
        <span class="inline-block w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">9</span>
        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">99+</span>

{{-- bardes notifications  --}}
    <span class="relative inline-block">
        <svg class="w-6 h-6 text-gray-700 fill-current" viewBox="0 0 20 20"><path d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99</span>
    </span>
    <span class="relative inline-block ml-8">
        <svg class="w-6 h-6 text-gray-700 fill-current" viewBox="0 0 20 20"><path d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
    </span>



    <div class="flex -m-2 -p-3 max-w-sm float-right appearance-none w-full bg-gray-200 text-gray-700 border-gray-200 rounded-lg  focus:outline-none border-0 focus:ring-0 focus:ring-offset-0">
        <i class="fas fa-search my-auto ml-4"></i>
        <input wire:model="search"
         class=" max-w-sm float-right appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded-lg p-2 focus:outline-none border-0 focus:ring-0 focus:ring-offset-0" type="text" placeholder=" Pesquisar">
    </div>




    </div> {{-- end Container --}}
</div> {{-- end Main --}}

