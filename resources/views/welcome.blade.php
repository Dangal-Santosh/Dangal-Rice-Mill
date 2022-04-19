<x-guest-layout>
    <div class="flex items-center min-h-screen p-6  welcome">
        <div class="flex-1 rounded-3xl h-full max-w-6xl mx-auto overflow-hidden bg-gray-800 dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row ">
                <div class="h-40 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('images/96.jpg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="ml-16 mb-5 text-3xl font-size-11 font-serif text-red-600 dark:text-red-200">
                            <img aria-hidden="true" class="object-cover ml-5 w-80 h-60 dark:hidden"
                            src="{{ asset('images/logo101.png') }}" alt="Office"/>
                        </h1>
                        @if (Route::has('login'))

                        @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block w-60 px-4 py-2  ml-24 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-900 border border-transparent rounded-lg active:bg-red-900 hover:bg-red-500 focus:outline-none focus:shadow-outline-red">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                        class="block w-60 px-4 py-3 ml-32 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-900 border border-transparent rounded-lg active:bg-red-900 hover:bg-red-500 focus:outline-none focus:shadow-outline-red">Log
                        in</a><br><br>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-60  py-3  ml-32  text-sm font-medium leading-1 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Register</a>
                        @endif
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>