{{-- <div class="w-1/4 p-1">
    <div class=" text-center bg-gray-100 text-gray-700 rounded-lg">1</div>
  </div> --}}


<div class=" w-1/4 p-1">

    <div class="bg-gray-100 rounded-lg p-2 border">

        <div class="text-xs  uppercase font-light text-gray-700">
            {{ $index->local->title}}
        </div>

        <div class="flex flex-row items-center justify-between ">
                <div class="text-xl font-bold uppercase">
                    {{ $index->title }}
                </div>
                <div class="text-xl font-bold text-right">
                    {{ $index->products->count() }}
                </div>



        </div>

    </div>
</div>
