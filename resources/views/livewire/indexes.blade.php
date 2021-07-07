<div>

    {{-- page menu --}}
    @include('layouts.partials._navigation-menu', [
    'title' => 'Índices'
    ])

    {{-- flash messages --}}
    @include('layouts.partials._flash-message')

    {{-- content --}}
    <div class="main"> {{-- Main --}}
        <div class="container"> {{-- Container --}}
            {{ $local }}
        </div> {{-- end Container --}}
    </div> {{-- end Main --}}


<!--
    {{-- content --}}
    <div class="main"> {{-- Main --}}
        <div class="container"> {{-- Container --}}



            {{-- barra superior da tabela --}}
            <div class="flex">

                {{-- paginação --}}
                <div class="flex-grow mr-2 py-2">
                    @if ($locals->hasPages())
                        {{ $locals->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($locals->total() > 0)
                                    <span>Exibindo {{ $locals->total() }} @if ($locals->total() == 1) resultado. @else resultados.
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
                    @include('layouts.partials.locals._table-filter')
                </div>
            </div>

            {{-- separador --}}
            <hr class="my-2">

            {{-- corpo da tabela : vazio --}}
            @if (count($locals) == 0)
                <p class="text-center text-gray-500">
                    @if ($this->search)
                        A pesquisa não encontrou resultados.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Criar Local <b class="capitalize"> {{ $this->search }}</b>.
                        </button>
                    @else
                        Oops, nenhum <b> local </b> foi encontrado.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Clique para criar uma Novo Local.
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
                            <th class="w-3/12 text-left" wire:click="sortBy('title')" style="cursor: pointer">Local
                                @include('layouts.partials._sort-icon',['field'=>'title'])
                            </th>
                            {{-- 3 --}}
                            <th class="hidden lg:w-2/12 lg:table-cell text-left">Endereço</th>

                            {{-- 4 --}}
                            <th class="hidden md:w-1/12 md:table-cell text-left ">Telefones</th>

                            {{-- 5 --}}
                            <th class="w-1/12 md:w-2/12 text-center ">Ações</th>
                        </tr>
                    </thead>

                    {{-- tabela --}}
                    <tbody>
                        @foreach ($locals as $local)
                            <tr class=" h-12 align-middle hover:bg-gray-100">

                                {{-- title --}}
                                <td class="text-left ">
                                    <input type="checkbox" class="checkbox h-6 w-6 mr-2" @if ($local->status == 1) checked @endif disabled>

                                    {{ $local->title }}
                                </td>

                                {{-- address --}}
                                <td class="text-left text-xs hidden lg:table-cell">
                                    <span> {{ $local->address }}, {{ $local->number }},
                                        {{ $local->district }}.<br> {{ $local->city }} - CEP:
                                        {{ substr($local->cep, 0, 2) }}.{{ substr($local->cep, 2, 3) }}-{{ substr($local->cep, 5, 3) }}
                                    </span>
                                </td>


                                {{-- phones --}}
                                <td class="text-left text-xs hidden md:table-cell">
                                    @if ($local->phone1) <span>
                                            ({{ substr($local->phone1, 0, 2) }})
                                            {{ substr($local->phone1, 2, 4) }}-{{ substr($local->phone1, 6, 4) }}</span>
                                        <br> @endif
                                    @if ($local->phone2) <span> <a
                                                href="https://api.whatsapp.com/send?phone=55{{ $local->phone2 }}"
                                                target="_blank" class="hover:text-indigo-700">
                                                ({{ substr($local->phone2, 0, 2) }}) {{ substr($local->phone2, 2, 1) }}
                                                {{ substr($local->phone2, 3, 4) }}-{{ substr($local->phone2, 7, 4) }}
                                            </a></span> @endif
                                    @if (!$local->phone1 && !$local->phone2)
                                        <span>Indisponível</span> @endif
                                </td>

                                {{-- actions --}}
                                <td class="text-center">
                                    <div class="flex justify-between gap-1">

                                        {{-- actions for mobile --}}
                                        <button wire:click="showModal('actions', {{ $local->id }})"
                                            class="md:hidden btn-table-mobile-indigo">Ver</button>

                                        {{-- actions for md or more --}}
                                        <button wire:click="showModal('delete', {{ $local->id }})"
                                            class="hidden md:block btn-table-red">Remover</button>

                                        <button wire:click="showModal('edit', {{ $local->id }})"
                                            class="hidden md:block btn-table-indigo">Editar</button>

                                        <button wire:click="showModal('actions', {{ $local->id }})"
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
--> 
    {{-- modals --}}
    {{-- @include('layouts.partials.indexes._modals') --}}

</div>
