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
        Seja bem Vindo {{ $user->name }} a Área de Testes. 

        <ul class="list-disc pl-6">
          <li> <a href="https://tailwindcomponents.com/" target="_blank" class="text-gray-700 hover:text-indigo-700"> Ir para Tailwind Components </a> </li>
          <li> <a href="https://tailwindcomponents.com/cheatsheet/" target="_blank" class="text-gray-700 hover:text-indigo-700"> Ir para Tailwind CheatSheet </a> </li>
          <li> <a href="https://tailwindcomponents.com/gradient-generator/" target="_blank" class="text-gray-700 hover:text-indigo-700"> Ir para Tailwind Gradient Generator </a> </li>
        </ul>

        <div class="grid grid-cols-1 space-y-4 divide-y-2 border-t-2 mt-3">

        <!-- {{-- descrition --}} -->
        <!-- <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide"> NAME </h3>
            <div class="">
                      
            </div>
        </div> -->

        <!-- {{-- descrition --}} -->
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide"> Teste de Produto  </h3>
            <div class="">
                <div class="text-center max-w-lg mx-auto mt-6">
                    <div class="h-4 bg-gray-500 w-40 block mx-auto rounded-sm"></div>
                    <div class="h-2 bg-gray-400 w-64 mt-4 block mx-auto rounded-sm"></div>
                    <div class="h-2 bg-gray-400 w-48 mt-2 block mx-auto rounded-sm"></div>
                  </div>    

                  <div class="flex justify-center mt-4">
                    <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
                    <div class="rounded-sm h-8 w-20 px-4 bg-green-300"></div>
                  </div>

            </div>
        </div>


   
        <!-- {{-- descrition --}} -->
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide"> COLORS EXAMPLE </h3>
            <div class="">
            <div class="container mx-auto p-6">
            <div>
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-gray-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-gray-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-red-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-red-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-orange-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-orange-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-yellow-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-yellow-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-green-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-green-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-teal-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-teal-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-blue-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-blue-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-indigo-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-indigo-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-purple-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-purple-900</h2>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="grid gap-6 grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-9">
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-100"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-100</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-200"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-200</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-300"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-300</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-400"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-400</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-500"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-500</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-600"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-600</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-700"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-700</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-800"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-800</h2>
                </div>
                <div>
                    <div class="h-12 w-12 mx-auto rounded-md bg-pink-900"></div>
                    <h2 class="mt-3 text-gray-700 text-center font-semibold">bg-pink-900</h2>
                </div>
            </div>
        </div>
    </div> 
            </div>
        </div>


   
     
        </div>


        {{-- badges numbers --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Badges</h3>
            <span class="inline-block w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">9</span>
            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">99+</span>
        </div>
        
        {{-- Card Simples --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Card Simples</h3>
            <div class="max-w-xs overflow-hidden rounded-lg shadow-lg">
                <div class="px-6 py-4">
                  <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">This is the title</h4>
                  <p class="leading-normal text-gray-700">Lorem ipsum dolor, sit amet cons ectetur adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam tenetur laud.</p>
                </div>
              </div>
        </div>


        {{-- Card with top image --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Card with top image</h3>
            <div class="max-w-xs overflow-hidden rounded-lg shadow-lg">
                <img class="object-cover w-full h-48" src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Flower and sky"/>
                <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">This is the title</h4>
                    <p class="leading-normal text-gray-700">Lorem ipsum dolor, sit amet cons ectetur adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam tenetur laud.</p>
                </div>
                </div>
        </div>


        {{-- Card with left image --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Card with left image</h3>
            <div class="w-full max-w-lg overflow-hidden rounded-lg shadow-lg sm:flex">
                <div class="w-full sm:w-1/3">
                  <img class="object-cover w-full h-48" src="https://images.pexels.com/photos/853199/pexels-photo-853199.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Flower and sky"/>
                </div>
                <div class="flex-1 px-6 py-4">
                  <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">This is the title</h4>
                  <p class="leading-normal text-gray-700">Lorem ipsum dolor, sit amet cons ectetur adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam tenetur laud.</p>
                </div>
              </div>
        </div>

        {{-- label left --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">input a esquerda</h3>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/3">
                  <label for="forms-labelLeftInputCode">Full name</label>
                </div>
                <div class="md:w-2/3 md:flex-grow">
                  <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Regular input" id="forms-labelLeftInputCode"/>
                </div>
              </div>
        </div>



        {{-- form grid --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">form grid</h3>
            <form class="space-y-4 text-gray-700">
                <div class="flex flex-wrap">
                  <div class="w-full">
                    <label class="block mb-1" for="formGridCode_card">Card number</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_card"/>
                  </div>
                </div>
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                  <div class="w-full px-2 md:w-1/2">
                    <label class="block mb-1" for="formGridCode_name">First name</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_name"/>
                  </div>
                  <div class="w-full px-2 md:w-1/2">
                    <label class="block mb-1" for="formGridCode_last">Last name</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_last"/>
                  </div>
                </div>
                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                  <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1" for="formGridCode_month">Month</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_month"/>
                  </div>
                  <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1" for="formGridCode_year">Year</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_year"/>
                  </div>
                  <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1" for="formGridCode_cvc">CVC</label>
                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_cvc"/>
                  </div>
                </div>
              </form>
        </div>
       


      <style>
          .pattern {
            background-color: #f1f1f1;
background-image: url("data:image/svg+xml,%3Csvg width='24' height='40' viewBox='0 0 24 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 40c5.523 0 10-4.477 10-10V0C4.477 0 0 4.477 0 10v30zm22 0c-5.523 0-10-4.477-10-10V0c5.523 0 10 4.477 10 10v30z' fill='%23d3d3d3' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");}  
</style>

        {{-- pattern --}}
        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Pattern</h3>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="w-full h-34 py-14 pattern">
                    
              </div>
        </div>

        <div class="py-2">
            <h3 class="py-2 font-bold uppercase tracking-wide">Teste de TailwindConifig</h3>
            <div class="w-1/2 mx-auto">
  <div class="w-full shadow-2xl subpixel-antialiased rounded h-64 bg-black border-black mx-auto">
    <div class="flex items-center h-6 rounded-t bg-gray-100 border-b border-gray-500 text-center text-black" id="headerTerminal">
      <div class="flex ml-2 items-center text-center border-red-900 bg-red-500 shadow-inner rounded-full w-3 h-3" id="closebtn">
      </div>
      <div class="ml-2 border-yellow-900 bg-yellow-500 shadow-inner rounded-full w-3 h-3" id="minbtn">
      </div>
      <div class="ml-2 border-green-900 bg-green-500 shadow-inner rounded-full w-3 h-3" id="maxbtn">
      </div>
      <div class="mx-auto pr-16" id="terminaltitle">
        <p class="text-center text-sm">Terminal</p>
      </div>

    </div>
    <div class="pl-1 pt-1 h-auto  text-green-200 font-mono text-xs bg-black" id="console">
      <p class="pb-1">Last login: Wed Sep 25 09:11:04 on ttys002</p>
      <p class="pb-1">Laraben:Devprojects laraben$</p>
    </div>
  </div> 
</div>






        </div>
    </div> {{-- end Container --}}
</div> {{-- end Main --}}

