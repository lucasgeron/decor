<div x-data="{ config: false }" x-on:keydown.escape.stop="config = false" x-on:mousedown.away="config = false"
    class="relative flex md:inline-block justify-end text-left">
    <div>
        <button type="button"
            class=" justify-center w-full rounded-lg border px-4 py-2 bg-gray-100 text-sm font-bold text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-indigo-700 focus:ring-2 "
            x-on:click="config = !config" aria-haspopup="true" x-bind:aria-expanded="config">
            <i class="fas fa-angle-down px-1"></i>
        </button>

    </div>

    <div x-show="config" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-left absolute right-0 top-12 w-56 rounded-lg shadow-md bg-white  divide-y divide-gray-100 focus:outline-none z-50"
        role="menu" aria-orientation="vertical" aria-labelledby="filters-menu" style="display: none;">

        
        <div class="py-1" role="none">
            <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">

                <label for="filter-verified" class="block text-xs font-bold uppercase tracking-wide text-gray-700">
                    Configurações
                </label>

                <div class="space-y-2">
                    <div class="mt-1 relative rounded-md ">
                        <button wire:click="showModal('edit', {{ $index->id }} )"
                            class=" w-full  btn-dropdown-indigo">Editar</button>
                    </div>
                    <div class="mt-1 relative rounded-md ">
                        <button wire:click="showModal('delete', {{ $index->id }})"
                            class=" w-full  btn-dropdown-red">Remover</button>
                    </div>
                </div>

            </div>
        </div>



    </div>
</div>
