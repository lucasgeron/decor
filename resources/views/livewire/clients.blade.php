<div>

    {{-- page menu --}}
    @include('layouts.partials._navigation-menu', [
        'title' => 'Clientes'
    ])

    {{-- flash messages --}}
    @include('layouts.partials._flash-message')

    {{-- content --}}
    <div class="main"> {{-- Main --}}
        <div class="container"> {{-- Container --}}

            {{-- barra superior da tabela --}}
            <div class="flex">

                {{-- paginação --}}
                <div class="flex-grow mr-2 py-2">
                    @if ($clients->hasPages())
                        {{ $clients->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($clients->total() > 0)
                                    <span>Exibindo {{ $clients->total() }} @if ($clients->total() == 1) resultado. @else resultados.
                                            @endif</span>
                                    @else
                                        <span>Nenhum resultados para exibir.</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- filtros --}}
                <div class="my-auto py-1">
                    @include('layouts.partials.clients._table-filter')
                </div>
            </div>

            {{-- separador --}}
            <hr class="my-2">

            {{-- corpo da tabela : vazio --}}
            @if (count($clients) == 0)
                <p class="text-center text-gray-500">
                    @if ($this->search)
                        A pesquisa não encontrou resultados.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Criar Cliente <b class="capitalize"> {{ $this->search }}</b>.
                        </button>
                    @else
                        Oops, nenhum <b> Cliente </b> foi encontrado.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Clique para criar uma Novo Cliente.
                        </button>
                    @endif
                </p>
                {{-- corpo da tabela : data --}}
            @else
                {{-- corpo da tabela --}}
                <table class="w-full table-fixed justify-between">
                    {{-- cabeçalhos --}}
                    <thead>
                        <tr>
                            
                            {{-- 1 --}}
                            <th class="w-2/12  text-left" wire:click="sortBy('name')"
                                style="cursor: pointer">Nome
                                @include('layouts.partials._sort-icon',['field'=>'name'])
                            </th>
                            {{-- 2 --}}
                            <th class="hidden lg:w-2/12 lg:table-cell text-left">Endereço</th>
                           
                            {{-- 3 --}}
                            <th class="hidden md:w-1/12 md:table-cell text-left">Telefones</th>

                            {{-- 4 --}}
                            <th class="w-1/12 text-center">Pedidos
                                    
                            </th>
                            {{-- 5 --}}
                            <th class="w-1/12 md:w-2/12 text-center ">Ações</th>
                        </tr>
                    </thead>

                    {{-- tabela --}}
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class=" h-12 align-middle hover:bg-gray-100">

                              

                                {{-- title --}}
                                <td class="text-left ">
                                    {{ $client->name }}
                                </td>

                                {{-- address --}}
                                <td class="text-left text-xs hidden lg:table-cell">
                                    <span> {{ $client->address }}, {{ $client->number }}, {{ $client->district }}.<br> {{ $client->city }} - CEP: {{substr($client->cep,0,2)}}.{{substr($client->cep,2,3)}}-{{substr($client->cep,5,3)}} </span>
                                </td>


                                {{-- phones --}}
                                <td class="text-left text-xs hidden md:table-cell">
                                   @if($client->phone1) <span> ({{substr($client->phone1,0,2)}}) {{substr($client->phone1,2,4)}}-{{substr($client->phone1,6,4)}}</span> <br> @endif
                                   @if($client->phone2) <span> <a href="https://api.whatsapp.com/send?phone=55{{$client->phone2}}" target="_blank" class="hover:text-indigo-700"> ({{substr($client->phone2,0,2)}}) {{substr($client->phone2,2,1)}} {{substr($client->phone2,3,4)}}-{{substr($client->phone2,7,4)}} </a></span> @endif
                                   @if(! ($client->phone1) && !($client->phone2))<span>Indisponível</span> @endif 
                                </td>

                                {{-- status --}}
                                <td class="text-center ">
                                    <span> {{ count($client->orders) }} </span>
                                </td>

                                {{-- actions --}}
                                <td class="text-center">
                                    <div class="flex justify-between gap-1">

                                        {{-- actions for mobile --}}
                                        <button wire:click="showModal('actions', {{ $client->id }})"
                                            class="md:hidden btn-table-mobile-indigo">Ver</button>

                                        {{-- actions for md or more --}}
                                        <button wire:click="showModal('delete', {{ $client->id }})"
                                            class="hidden md:block btn-table-red">Remover</button>

                                        <button wire:click="showModal('edit', {{ $client->id }})"
                                            class="hidden md:block btn-table-indigo">Editar</button>

                                        <button wire:click="showModal('actions', {{ $client->id }})"
                                            class="hidden md:block btn-table-indigo">Ver</button>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif

        </div> {{-- end Container --}}
    </div> {{-- end Main --}}

    {{-- modals --}}
    @include('layouts.partials.clients._modals')

</div>
