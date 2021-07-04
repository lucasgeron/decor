    {{-- flash messages --}}
    @if (session()->has('flash'))
        <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
            <div class="w-full  bg-white text-gray-700  rounded-lg shadow-md px-4 py-4">
                <p> <span class="uppercase  text-{{ session('flash')['color'] }}-500 font-bold">
                        {{ session('flash')['title'] }} </span> - {!! session('flash')['message'] !!}
                </p>
            </div>
        </div>
    @endif