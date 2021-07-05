<div>

    {{-- page menu --}}
    @include('layouts.partials._navigation-menu', [
        'title' => 'Locais'
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
                    @if ($locales->hasPages())
                        {{ $locales->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($locales->total() > 0)
                                    <span>Exibindo {{ $locales->total() }} @if ($locales->total() == 1) resultado. @else resultados.
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
                    {{-- paginação --}}
                    <div class="col form-inline">
                        <select wire:model="perPage" wire:change="gotoPage(0)"
                            class="form-control rounded-md border-gray-300 focus:ring-0 font-extralight text-xs py-1 pr-6 ">
                            <option value="10">10 por Página</option>
                            <option value="25">25 por Página</option>
                            <option value="50">50 por Página</option>
                            <option value="100">100 por Página</option>
                        </select>
                    </div>
                    {{-- somente ativos --}}
                    <label class="w-1/16 flex radio cursor-pointer font-extralight text-xs mt-1">
                        <input wire:model="onlyActives" type="checkbox" wire:change="gotoPage(0)"
                            class="rounded my-auto bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-0 focus:ring-offset-0">
                        <div class="ml-2">Somente Ativos</div>
                    </label>
                </div>
            </div>

            {{-- separador --}}
            <hr class="my-2">

            {{-- corpo da tabela : vazio --}}
            @if (count($locales) == 0)
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
                            {{-- 1 --}}
                            <th class="w-1/12 text-center cursor-pointer" wire:click="sortBy('status')">Status
                                @if (!$onlyActives)
                                    @include('layouts.partials._sort-icon',['field'=>'status']) @endif
                            </th>
                            {{-- 2 --}}
                            <th class="w-2/12 text-center md:text-left md:w-2/12 md:pl-2 lg:w-4/12" wire:click="sortBy('title')"
                                style="cursor: pointer">Locais
                                @include('layouts.partials._sort-icon',['field'=>'title'])
                            </th>
                            {{-- 3 --}}
                            <th class="w-6/12 text-left hidden md:table-cell ">Endereço</th>

                           
                            {{-- 4 --}}
                            <th class="w-2/12 text-left hidden md:table-cell ">Telefones</th>

                            {{-- 5 --}}
                            <th class="w-1/12 md:w-3/12 text-center ">Ações</th>
                        </tr>
                    </thead>

                    {{-- tabela --}}
                    <tbody>
                        @foreach ($locales as $local)
                            <tr class=" h-12 align-middle hover:bg-gray-100">

                                {{-- status --}}
                                <td class="text-center ">
                                    <input type="checkbox" class="checkbox h-6 w-6"  @if ($local->status == 1) checked @endif disabled>
                                </td>

                                {{-- title --}}
                                <td class="text-center md:text-left md:pl-2 ">
                                    {{ $local->title }}
                                </td>

                                {{-- address --}}
                                <td class="text-left text-xs hidden md:table-cell">
                                    <span> {{ $local->address }}, {{ $local->number }}, {{ $local->district }}.<br> {{ $local->city }} - CEP: {{substr($local->cep,0,2)}}.{{substr($local->cep,2,3)}}-{{substr($local->cep,5,3)}} </span>
                                </td>

                               

                                {{-- phones --}}
                                <td class="text-left text-xs hidden md:table-cell">
                                    <span> ({{substr($local->phone1,0,2)}}) {{substr($local->phone1,2,4)}}-{{substr($local->phone1,6,4)}}</span> <br>
                                    <span> <a href="https://api.whatsapp.com/send?phone=55{{$local->phone2}}" target="_blank" class="hover:text-indigo-700"> ({{substr($local->phone2,0,2)}}) {{substr($local->phone2,2,1)}} {{substr($local->phone2,3,4)}}-{{substr($local->phone2,6,4)}} </a></span> 
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

    {{-- modals --}}
    @include('layouts.partials.locals._modals')

</div>
