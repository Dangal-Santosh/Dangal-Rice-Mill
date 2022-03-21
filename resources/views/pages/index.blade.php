<x-guest-layout >
    <div class="flex items-center min-h-screen p-6 bg-teal-900  dark:bg-gray-900"> 
        <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-gray-200 rounded-3xl shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">                    
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('images/field.jpeg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class=" ml-12 mb-4 text-3xl font-size-10 font-bold text-red-900 dark:text-red-200">
                            <span class="text-6xl">WELCOME</span> 
                            <br><span class=" ml-16 text-2xl">{{ Auth::user()->name }}</span>
                        </h1>
                        <button>
                            <a href="{{route('orderindex')}}" class="block w-60 px-4 py-2  ml-20 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-900 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Buy Products</a>
                        </button> 
                        <button class="block w-60 px-4 py-2  ml-20 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-900 border border-transparent rounded-lg active:bg-red-900 hover:bg-red-500 focus:outline-none focus:shadow-outline-red" href="{{ route('logout') }}" onclick="event.preventDefault()
                        document.getElementById('logout-form-a').submit()">Logout
                        </button>
                        <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                             @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>



