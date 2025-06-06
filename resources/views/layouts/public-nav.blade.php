<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('veranstaltungen.index')" :active="request()->routeIs('veranstaltungen.index')">
                        {{ __('Veranstaltungen') }}
                    </x-nav-link>
                    <x-nav-link :href="route('board')" :active="request()->routeIs('board')">
                        {{ __('Vorstand') }}
                    </x-nav-link>
                    
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
            <a href="login" class="btn bg-info-content text-base-100">Login</a>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('veranstaltungen.index')" :active="request()->routeIs('veranstaltungen.index')">
                        {{ __('Veranstaltungen') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('board')" :active="request()->routeIs('board')">
                        {{ __('Vorstand') }}
            </x-responsive-nav-link>
        </div>
        <div class="py-1 border-t border-gray-200 dark:border-gray-600 bg-info-content text-base-100">
            <div class="space-y-1">

                
                <a href="/login" class="block w-full ps-3 pe-4 py-2 bg-info-content text-base-100">
                    {{ __('Login') }}
                </a>                
            </div>
        </div>
        
    </div>
</nav>
