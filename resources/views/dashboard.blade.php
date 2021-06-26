<x-app-layout>

    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- start -->
                <div class="flex-1 self-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex"> {{ __('Dashboard') }}
                    </h2>
                </div>

                <!-- end -->
                <div class="flex-1 flex-wrap w-full">
                </div>

            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-4 md:px-6 lg:px-6">
        <div class="w-full bg-white rounded-lg shadow-md px-4 py-4">

            
            <div class="grid grid-cols-1 gap-2 justify-items-stretch sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">

                
                {{-- card with icon --}}
                <a class="h-32   py-7 md:h-40 lg:h-52 lg:py-18 w-full rounded-lg text-center text-lg text-gray-700 bg-gray-100 lg:py-12 hover:bg-indigo-500 hover:shadow-md hover:text-white" href="{{ route('categories.index')}}">                
                    <div class="grid">
                        <i class="fa-tags hidden md:block fa-4x mb-4 fas "></i>
                        <p class="py-6 sm:py-6 md:py-0 uppercase tracking-wide font-bold ">  Categorias </p>
                    </div>
                 </a>
                
                {{-- card with icon --}}
                <a class="h-32   py-7 md:h-40 lg:h-52 lg:py-18 w-full rounded-lg text-center text-lg text-gray-700 bg-gray-100 lg:py-12 hover:bg-indigo-500 hover:shadow-md hover:text-white" href="{{ route('locales.index')}}">                
                    <div class="grid">
                        <i class="fa-warehouse hidden md:block fa-4x mb-4 fas "></i>
                        <p class="py-6 sm:py-6 md:py-0 uppercase tracking-wide font-bold ">  Locais </p>
                    </div>
                 </a>
                 
                 
                 @for ($i=0; $i< 9; $i++) 
                 {{-- card with icon --}}
                 <a class="h-32  bg-yellow-500 py-7 md:h-40 lg:h-52 lg:py-18 w-full rounded-lg text-center text-lg text-gray-700 bg-gray-200 lg:py-12 hover:bg-indigo-500 hover:shadow-md hover:text-white" href="#">                
                     <div class="grid">
                         <i class="fa-icons hidden md:block fa-4x mb-4 fas "></i>
                         <p class="py-6 sm:py-6 md:py-0 uppercase tracking-wide font-bold ">  . . .  </p>
                     </div>
                  </a>
                @endfor

                 {{-- card with icon --}}
                 <a class="h-32   py-7 md:h-40 lg:h-52 lg:py-18 w-full rounded-lg text-center text-lg text-gray-700 bg-gray-100 lg:py-12 hover:bg-indigo-500 hover:shadow-md hover:text-white" href="{{ route('tests.index')}}">                
                    <div class="grid">
                        <i class="fa-code hidden md:block fa-4x mb-4 fas "></i>
                        <p class="py-6 sm:py-6 md:py-0 uppercase tracking-wide font-bold ">  Testes </p>
                    </div>
                 </a>

            </div>

        </div>
    </div>


</x-app-layout>