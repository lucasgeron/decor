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


        <div class="grid grid-cols-1 space-y-4 divide-y-2 border-t-2 mt-3">

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
            <div class="text-gray-700 md:flex md:items-center">
                <div class="w-full h-34 py-14 bg">
                    oi
              </div>
        </div>






        </div>
    </div> {{-- end Container --}}
</div> {{-- end Main --}}

