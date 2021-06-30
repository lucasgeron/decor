<div>

    {{-- page menu --}}
    @include('layouts.partials._navigation-menu', [
        'title' => 'Categorias'
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
                    @if ($categories->hasPages())
                        {{ $categories->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($categories->total() > 0)
                                    <span>Exibindo {{ $categories->total() }} @if ($categories->total() == 1) resultado. @else resultados.
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
            @if (count($categories) == 0)
                <p class="text-center text-gray-500">
                    @if ($this->search)
                        A pesquisa não encontrou resultados.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Criar Categoria <b class="capitalize"> {{ $this->search }}</b>.
                        </button>
                    @else
                        Oops, nenhuma <b> categoria </b> foi encontrada.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Clique para criar uma Nova Categoria.
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
                            <th class="w-2/12 text-center md:text-left md:w-4/12 md:pl-2 lg:w-6/12" wire:click="sortBy('title')"
                                style="cursor: pointer">Categorias
                                @include('layouts.partials._sort-icon',['field'=>'title'])
                            </th>
                            {{-- 3 --}}
                            <th class="w-2/12 text-center hidden md:table-cell ">Produtos</th>
                            {{-- 4 --}}
                            <th class="w-1/12 md:w-3/12 text-center ">Ações</th>
                        </tr>
                    </thead>

                    {{-- tabela --}}
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class=" h-12 align-middle hover:bg-gray-100">

                                {{-- status --}}
                                <td class="text-center ">
                                    @if ($category->status)
                                        <button wire:click="toogle({{ $category->id }})"
                                            class="px-3 rounded-lg bg-green-100 border border-green-300 text-green-500 hover:bg-green-200 focus:outline-none">ON</button>
                                    @else
                                        <button wire:click="toogle({{ $category->id }})"
                                            class="px-2 rounded-lg bg-red-100 border border-red-300 text-red-500 hover:bg-red-200  focus:outline-none">OFF</button>
                                    @endif
                                </td>

                                {{-- title --}}
                                <td class="text-center md:text-left md:pl-2 ">
                                    {{ $category->title }}
                                </td>

                                {{-- ammount --}}
                                <td class="text-center hidden md:table-cell">
                                    <span> {{ count($category->products) }} </span>
                                </td>

                                {{-- actions --}}
                                <td class="text-center">
                                    <div class="flex justify-between gap-1">

                                        {{-- actions for mobile --}}
                                        <button wire:click="showModal('actions', {{ $category->id }})"
                                            class="md:hidden text-center p-2 w-1/2 mx-auto rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none">Ver</button>

                                        {{-- actions for md or more --}}
                                        <button wire:click="showModal('delete', {{ $category->id }})"
                                            class="hidden md:block text-center p-1 rounded-lg bg-gray-100 border hover:border-red-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-red-700 text-xs font-bold align-middle focus:outline-none ">Remover</button>

                                        <button wire:click="showModal('edit', {{ $category->id }})"
                                            class="hidden md:block text-center p-1 rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none">Editar</button>

                                        <button wire:click="showModal('actions', {{ $category->id }})"
                                            class="hidden md:block text-center p-1 rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none">Ver</button>

                                        {{-- <a href="#"
                                        class="hidden md:block  text-center p-1 rounded-lg bg-gray-100 border hover:border-indigo-700 flex-1 uppercase tracking-wide text-gray-500  hover:text-indigo-700 text-xs font-bold align-middle focus:outline-none ">Ver</a> --}}

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

    {{-- CREATE MODAL --}}
    <x-jet-dialog-modal wire:model="modals.create">
        <x-slot name="title">
            Nova Categoria
        </x-slot>

        <x-slot name="content">
            <form method="post" wire:submit.prevent="create" autocomplete="off" class="w-full ">

                @error('obj.title')
                    <div class="p-2 bg-red-100 rounded-lg w-full mt-2">
                        <p class=" text-sm text-red-500 "> {!! $message !!} </p>
                    </div>
                @enderror

                <div class="flex flex-wrap -mx-3">
                    <div class=" w-full px-3 py-3 space-y-2">
                        <div>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="titler">
                                Status
                            </label>
                            @if ($obj->status)

                                <button wire:click.prevent="$set('obj.status', false)"
                                    class="px-3 rounded-lg bg-green-100 border border-green-300 text-green-500 hover:bg-green-200 focus:outline-none">ON</button>
                            @else
                                <button wire:click.prevent="$set('obj.status', true)"
                                    class="px-2 rounded-lg bg-red-100 border border-red-300 text-red-500 hover:bg-red-200 focus:outline-none">OFF</button>
                            @endif
                        </div>
                        <div>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="titler">
                                Título
                            </label>
                            <input wire:model="obj.title"
                                class="w-full input"
                                type="text" placeholder="Categoria">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end  w-full py-2 ">
                    <button wire:click="hideModal('create')"
                        class="flex-1 max-w-xs bg-gray-100 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-gray-700 hover:text-white p-2 mr-2 rounded-lg"
                        type="button">
                        Cancelar
                    </button>

                    <button
                        class=" flex-1 max-w-xs bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white  p-2 rounded-lg"
                        type="submit">
                        Salvar
                    </button>
                </div>

            </form>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- DELETE MODAL --}}
    <x-jet-dialog-modal wire:model="modals.delete">
        <x-slot name="title">
            Remover Categoria
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-wrap -mx-3">
                <div class=" w-full px-3 py-3 space-y-2">
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="titler">
                            Status
                        </label>
                        @if ($obj->status)

                            <button disabled
                                class="cursor-default px-3 rounded-lg bg-green-100 border border-green-300 text-green-500  focus:outline-none">ON</button>
                        @else
                            <button disabled
                                class="cursor-default px-2 rounded-lg bg-red-100 border border-red-300 text-red-500  focus:outline-none">OFF</button>
                        @endif
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titler">
                            Título
                        </label>
                        <input wire:model="obj.title" disabled
                            class=" w-full input-disabled"
                            type="text" placeholder="Categoria">
                    </div>
                </div>
            </div>

            <div class="flex justify-end  w-full py-2 ">
                <button wire:click="hideModal('delete')"
                    class="flex-1 max-w-xs bg-gray-100 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-gray-700 hover:text-white p-2 mr-2 rounded-lg"
                    type="button">
                    Cancelar
                </button>

                <button wire:click="delete()"
                    class=" flex-1 max-w-xs bg-red-500 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white  p-2 rounded-lg">Remover</button>

            </div>

            </form>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- EDIT MODAL --}}
    <x-jet-dialog-modal wire:model="modals.edit">
        <x-slot name="title">
            Editar Categoria
        </x-slot>

        <x-slot name="content">

            @error('obj.title')
                <div class="p-2 bg-red-100 rounded-lg w-full mt-2">
                    <p class=" text-sm text-red-500 "> {!! $message !!} </p>
                </div>
            @enderror

            <div class="flex flex-wrap -mx-3">
                <div class=" w-full px-3 py-3 space-y-2">
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="titler">
                            Status
                        </label>
                        @if ($obj->status)
                            <button wire:click.prevent="$set('obj.status', false)"
                                class="px-3 rounded-lg bg-green-100 border border-green-300 text-green-500 hover:bg-green-200 focus:outline-none">ON</button>
                        @else
                            <button wire:click.prevent="$set('obj.status', true)"
                                class="px-2 rounded-lg bg-red-100 border border-red-300 text-red-500 hover:bg-red-200 focus:outline-none">OFF</button>
                        @endif
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titler">
                            Título
                        </label>
                        <input wire:model="obj.title"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" placeholder="Categoria">
                    </div>
                </div>
            </div>


            <div class="flex justify-end  w-full py-2 ">
                <button wire:click="hideModal('edit')"
                    class="flex-1 max-w-xs bg-gray-100 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-gray-700 hover:text-white p-2 mr-2 rounded-lg"
                    type="button">
                    Cancelar
                </button>

                <button wire:click="update({{ $obj->id }})"
                    class=" flex-1 max-w-xs bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white  p-2 rounded-lg"
                    type="submit">
                    Salvar
                </button>
            </div>

        </x-slot>

    </x-jet-dialog-modal>

    {{-- OPTIONS FOR MOBILE --}}
    <x-jet-dialog-modal wire:model="modals.actions">
        <x-slot name="title">
            Ações
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-wrap -mx-3">
                <div class=" w-full px-3 py-3 space-y-2">
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="titler">
                            Status
                        </label>
                        @if ($obj->status)

                            <button disabled
                                class="cursor-default px-3 rounded-lg bg-green-100 border border-green-300 text-green-500  focus:outline-none">ON</button>
                        @else
                            <button disabled
                                class="cursor-default px-2 rounded-lg bg-red-100 border border-red-300 text-red-500  focus:outline-none">OFF</button>
                        @endif
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titler">
                            Título
                        </label>
                        <input wire:model="obj.title" disabled
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg p-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" placeholder="Categoria">
                    </div>
                </div>
            </div>


            <div class="mt-4 flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titler">
                        Selecione para continuar
                    </label>
                </div>
            </div>

            <div class=" justify-end gap-y-2 w-full py-2 ">
                <button wire:click="showModal('delete', {{ $obj->id }})"
                    class="mt-2 w-full  text-center  bg-red-500 hover:bg-red-700 focus:shadow-outline text-white  p-3 rounded-lg focus:outline-none  uppercase tracking-wide font-bold text-xs">Remover</button>

                <button wire:click="showModal('edit', {{ $obj->id }})"
                    class="mt-2 w-full  text-center  bg-indigo-500 hover:bg-indigo-700 focus:shadow-outline text-white  p-3 rounded-lg focus:outline-none  uppercase tracking-wide font-bold text-xs">Editar</button>

                <button wire:click="hideModal('actions')"
                    class="mt-2 w-full  text-center  bg-gray-100 hover:bg-gray-500 focus:shadow-outline text-gray-700 hover:text-white  p-3 rounded-lg focus:outline-none  uppercase tracking-wide font-bold text-xs">Cancelar</button>

            </div>


        </x-slot>

    </x-jet-dialog-modal>

</div>
