<div class="bg-white h-64 shadow-md py-4 px-2 rounded-lg ">
    <div class="p-2">

        <div class="flex justify-between">
            <p class=" text-lg font-semibold">Usuários </p>
            <p class=" text-lg font-semibold text-gray-300">@isset($users) {{ count($users)  }} @endisset</p>
        </div>
        
        <div class="border-t my-2"></div>

        <div class="relative ">
            <input type="text" id="search" wire:model="search"
                class="w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors"
                placeholder="Pesquisar">
        </div>

        @isset($users)
            <ul class="list-disc list-inside pt-2">
                @foreach ($users as $user)
                    <li> {{ $user->name }}</li>
                @endforeach
            </ul>
        @endisset
        
    </div>
</div>