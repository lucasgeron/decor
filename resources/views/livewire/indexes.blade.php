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

            <div class="flex space-x-2">
                <div class="flex-initial">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1 " for="status">
                        Status
                    </label>
                    <input disabled @if ($local->status) checked @endif
                        type="checkbox" class="checkbox h-9 w-9 md:w-10 md:h-10" @if ($local->status == 1) checked @elseif(!$local->id) checked @endif>
                </div>
                <div class="flex-grow">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="title">
                        Local
                    </label>
                    {{-- <input disabled wire:model="local.title" class="w-full input" type="text" placeholder="--">      não há necessidade de data binding aqui --}}
                <input disabled value="@if ($local->id) {{ $local->title }} @else Todos @endif" class="text-gray-700 w-full input" type="text" placeholder="--">
                </div>

                <div class="flex-1">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="titler">
                        Índices
                    </label>
                    <input disabled value="{{ $indexes->count() }}" class="text-gray-700 w-full input" type="text"
                        placeholder="--">
                </div>

                <div class="flex-1">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="titler">
                        Produtos Alocados
                    </label>
                    <input disabled value="{{$hasManyProducts }} de {{ $totalProducts }}" class="text-gray-700 w-full input" type="text"
                        placeholder="--">
                </div>
            </div>


        </div> {{-- end Container --}}
    </div> {{-- end Main --}}


    {{-- content --}}
    <div class="main -mt-6"> {{-- Main --}}
        <div class="container"> {{-- Container --}}

            {{-- barra superior da tabela --}}
            <div class="flex">

                {{-- paginação --}}
                <div class="flex-grow mr-2 py-2">
                    @if ($indexes->hasPages())
                        {{ $indexes->links() }}
                    @else
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div class="mr-2 py-2">
                                <p class="text-sm text-gray-700 leading-5">
                                    @if ($indexes->total() > 0)
                                    <span>Exibindo {{ $indexes->total() }} @if ($indexes->total() == 1) resultado. @else resultados.
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
                    @include('layouts.partials.indexes._table-filter')
                </div>
            </div>

            {{-- separador --}}
            <hr class="my-2">

            {{-- corpo da tabela : vazio --}}
            @if (count($indexes) == 0)
                <p class="text-center text-gray-500">
                    @if ($this->search)
                        A pesquisa não encontrou resultados.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Criar Índice <b class="capitalize"> {{ $this->search }}</b>.
                        </button>
                    @else
                        Oops, nenhum <b> local </b> foi encontrado.
                        <button wire:click="showModal('create')"
                            class="focus:outline-none rounded-lg text-gray-500  hover:text-indigo-700 hover:border-gray-500">
                            Clique para criar uma Novo Índice.
                        </button>
                    @endif
                </p>

                {{-- inicio dos cards: --}}
            @else
            <div class="flex flex-wrap">
                    @foreach ($indexes as $index)
                        @include('layouts.partials.indexes._card')
                    @endforeach
                </div>
            @endif

        </div> {{-- end Container --}}
    </div> {{-- end Main --}}

    {{-- modals --}}
    {{-- @include('layouts.partials.indexes._modals') --}}

</div>
