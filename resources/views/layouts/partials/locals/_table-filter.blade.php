<div x-data="{ open: false }" x-on:keydown.escape.stop="open = false" x-on:mousedown.away="open = false"
    class="relative block md:inline-block text-left">
    <div>
        <button type="button" {{-- class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo" --}}
            class="inline-flex justify-center w-full rounded-lg border px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-indigo-700 focus:ring-2 "
            id="filters-menu" x-on:click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open">

            <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                </path>
            </svg>
        </button>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right fixed  right-4 md:absolute md:right-0 mt-2 w-56  rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50"
        role="menu" aria-orientation="vertical" aria-labelledby="filters-menu" style="display: none;">
        <div class="py-1" role="none">
            <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                <label for="filter-verified" class="block text-sm font-bold uppercase tracking-wide text-gray-700">
                    Filtrar Resultados
                </label>
                <div class="mt-1 relative rounded-md ">
                    <input wire:model="onlyActives" type="checkbox" wire:change="gotoPage(0)"
                        class="transition-all duration-200 ease-in-out h-6 w-6 rounded-lg my-auto bg-gray-200 border-transparent text-indigo-700 focus:border-transparent focus:bg-gray-200  focus:ring-0 focus:ring-offset-0">
                    Exibir Somente Ativos
                </div>
                
            </div>
        </div>


        {{-- paginação --}}
        <div class="py-1" role="none">
            <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                <label for="filter-active" class="block text-sm font-bold uppercase tracking-wide text-gray-700">
                    Exibição
                </label>

                <div class="mt-1 relative rounded-md shadow-sm">
                    <select wire:model="perPage" wire:change="gotoPage(0)" {{-- class="rounded-lg block w-full pl-3 pr-10 py-2 text-base border-none bg-gray-100 focus:outline-none focus:border-indigo-700 sm:text-sm sm:leading-5"> --}}
                        class="rounded-lg bg-gray-100 border-transparent focus:border-indigo-500 focus:bg-white focus:outline-none block w-full pl-3 pr-10 py-2 text-sm ">
                        <option value="10">10 por Página</option>
                        <option value="25">25 por Página</option>
                        <option value="50">50 por Página</option>
                        <option value="100">100 por Página</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>
