    {{-- CREATE MODAL --}}
    <x-jet-dialog-modal wire:model="modals.create">
        <x-slot name="title">
            Novo Local
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
                                    class="btn-status-on focus:shadow-outline">ON</button>
                            @else
                                <button wire:click.prevent="$set('obj.status', true)"
                                    class="btn-status-off focus:shadow-outline">OFF</button>
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

                        <div class="flex space-x-2">

                            <div class="flex-grow">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="titler">
                                    Endereço
                                </label>
                                <input wire:model="obj.address"
                                    class="w-full input"
                                    type="text" placeholder="Categoria">
                            </div>

                            <div  class="flex-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="titler">
                                    Número
                                </label>
                                <input wire:model="obj.number"
                                    class="w-full input"
                                    type="text" placeholder="Categoria">
                            </div>

                            <div  class="flex-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="titler">
                                    Bairro
                                </label>
                                <input wire:model="obj.district"
                                    class="w-full input"
                                    type="text" placeholder="Categoria">
                            </div>


                        </div>


                        
                        <div class="flex space-x-2">

                            <div class="flex-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="titler">
                                    Cidade
                                </label>
                                <input wire:model="obj.cidade"
                                    class="w-full input"
                                    type="text" placeholder="Categoria">
                            </div>

                            <div  class="flex-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="titler">
                                    CEP
                                </label>
                                <input wire:model="obj.cep" wire:keyup="formatCep"
                                    class="w-full input"
                                    type="text" placeholder="Código Postal">
                            </div>

                            


                        </div>

                        <div>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="titler">
                                Telefone
                            </label>
                            <input wire:model="obj.phone" wire:keyup="formatPhone"
                                class="w-full input"
                                type="text" placeholder="Categoria">
                        </div>





                    </div>
                </div>

                <div class="flex justify-end  w-full gap-2 ">
                    <button wire:click="hideModal('create')"
                        class="btn-modal-gray"
                        type="button">
                        Cancelar
                    </button>

                    <button
                        class=" btn-modal-indigo"
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
                                class="cursor-default btn-status-on focus:shadow-outlinee">ON</button>
                        @else
                            <button disabled
                                class="cursor-default btn-status-off focus:shadow-outline">OFF</button>
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

            <div class="flex justify-end  w-full gap-2 ">
                <button wire:click="hideModal('delete')"
                    class="btn-modal-gray"
                    type="button">
                    Cancelar
                </button>

                <button wire:click="delete()"
                    class=" btn-modal-red">Remover</button>

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
                                class="btn-status-on focus:shadow-outline ">ON</button>
                        @else
                            <button wire:click.prevent="$set('obj.status', true)"
                                class="btn-status-off focus:shadow-outline">OFF</button>
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


            <div class="flex justify-end  w-full gap-2 ">
                <button wire:click="hideModal('edit')"
                    class="btn-modal-gray"
                    type="button">
                    Cancelar
                </button>

                <button wire:click="update({{ $obj->id }})"
                    class=" btn-modal-indigo"
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