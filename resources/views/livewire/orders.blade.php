<div>

    {{-- page menu --}}
    @include('layouts.partials._navigation-menu', [
    'title' => 'Pedidos'
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
                    @if ($orders->hasPages())
                        {{ $orders->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($orders->total() > 0)
                                    <span>Exibindo {{ $orders->total() }} @if ($orders->total() == 1) resultado. @else resultados.
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
                    @include('layouts.partials.categories._table-filter' )
                </div>
            </div>

                {{-- separador --}}
                <hr class="my-2">

                {{-- corpo da tabela : vazio --}}
                @if (count($orders) == 0)
                    <p class="text-center text-gray-500">
                        @if ($this->search)
                            A pesquisa não encontrou resultados.
                            <button wire:click="showModal('create')"
                                class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                                Criar Pedido <b class="capitalize"> {{ $this->search }}</b>.
                            </button>
                        @else
                            Oops, nenhuma <b> categoria </b> foi encontrada.
                            <button wire:click="showModal('create')"
                                class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                                Clique para criar uma Nova Pedido.
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
                               
                                {{-- 2 --}}
                                <th class="w-2/12 text-left md:w-4/12 md:pl-2 lg:w-3/12" wire:click="sortBy('title')"
                                    style="cursor: pointer">Cliente
                                    @include('layouts.partials._sort-icon',['field'=>'title'])
                                </th>

                                 {{-- 1 --}}
                                 <th class="w-1/12 text-center cursor-pointer" wire:click="sortBy('status')">Status</th>

                                {{-- 3 --}}
                                <th class="w-1/12 text-center hidden md:table-cell ">Pedido</th>

                                {{-- 3 --}}
                                <th class="w-1/12 text-left hidden md:table-cell ">Data Evento</th>

                                {{-- 4 --}}
                                <th class="w-1/12 md:w-2/12 text-center ">Ações</th>
                            </tr>
                        </thead>

                        {{-- tabela --}}
                        <tbody>
                            @foreach ($orders as $order)
                                
                            
                            
                            <tr class=" h-12 align-middle hover:bg-gray-50">

                                    {{-- title --}}
                                    <td class="text-left md:pl-2 ">
                                        {{ $order->client->name }}
                                    </td>

                                   
 
                                     {{-- status --}}
                                     <td class="text-center ">
                                        <span class="uppercase text-xs font-bold 
                                        
                                        @switch($order->status)
                                            @case('Em Aberto')
                                                text-red-500 
                                                @break
            
                                            @case('Realizado')
                                                text-gray-700
                                                @break
            
                                            @case('Confirmado')
                                                text-indigo-700
                                                @break
            
                                            @case('Concluído')
                                                text-green-500
                                                @break
                                                
                                            @case('Cancelado')
                                                text-red-300
                                                @break
    
                                        @endswitch
                                        ">{{ $order->status }}</span>
                                     </td>

                                     
 

                                    {{-- order ID --}}
                                    <td class="text-center hidden md:table-cell">
                                        <span> {{ $order->id }} </span>
                                    </td>

                                      {{-- data --}}
                                      <td class="text-left  ">
                                        {{ $order->created_at->format('d-m-Y') }}
                                     </td>

                                    {{-- actions --}}
                                    <td class="text-center">
                                        <div class="flex justify-between gap-1">

                                            {{-- actions for mobile --}}
                                            <button wire:click="showModal('actions', {{ $order->id }})"
                                                class="md:hidden btn-table-mobile-indigo">Ver</button>

                                            {{-- actions for md or more --}}
                                            <button wire:click="showModal('delete', {{ $order->id }})"
                                                class="hidden md:block btn-table-red">Remover</button>

                                            <button wire:click="showModal('edit', {{ $order->id }})"
                                                class="hidden md:block btn-table-indigo">Editar</button>

                                            <button wire:click="showModal('actions', {{ $order->id }})"
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
        @include('layouts.partials.categories._modals')


    </div>
