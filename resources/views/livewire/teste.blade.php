{{-- <div>
    <button wire:click="checkout">Checkout</button>

    <div wire:loading>
        Processing Payment...
    </div>
    
    <div wire:loading.delay> acima de 200ms...</div> 


</div> --}}


<h2>User Details:</h2>
    Name: {{ $user->title }}
    Name: {{ $user->status }}


<div>
    <button wire:click="checkout">Checkout</button>
    <button wire:click="cancel">Cancel</button>

    <div wire:loading wire:target="checkout">
        Processing Payment...
    </div>

    <button wire:click="update('bob')">Update</button>

    <div wire:loading wire:target="update('bob')">
        Updating Bob...
    </div>


    <input wire:model="quantity">

    <div wire:loading wire:target="quantity">
        Updating quantity...
    </div>


    <button wire:click="checkout" wire:loading.class.remove="bg-blue-500" class="bg-blue-500">
        Checkout
    </button>


    <button wire:click="checkout" wire:loading.attr="disabled">
        Checkout
    </button>

    <div wire:poll>
        Current time: {{ now() }}
    </div>

    <div wire:poll.keep-alive>
        
        Current time: {{ now() }}
    </div>
    
    {{-- mantem vivo apenas se estiver visivel  --}}
    <div wire:poll.visible></div>



</div>