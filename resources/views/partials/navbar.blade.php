<nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 text-xl font-bold text-purple-600">
            Cosmic Realms
        </div>

        <!-- Nav links -->
<div class="hidden md:flex space-x-6 items-center">
    <a href="#play" class="hover:text-purple-500">Play</a>
    <a href="#vote" class="hover:text-purple-500">Vote</a>
    <a href="#ranks" class="hover:text-purple-500">Ranks</a>
    <a href="#store" class="hover:text-purple-500">Store</a>
    <a href="#discord" class="hover:text-purple-500">Discord</a>

    @guest
        <a href="{{ route('login') }}" class="hover:text-purple-500">Login</a>
        <a href="{{ route('register') }}" class="hover:text-purple-500">Register</a>
    @endguest

    @auth
    <!-- dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center gap-2 hover:text-purple-500">
            <span>{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 transform transition-transform duration-200"
                 :class="{ 'rotate-180': open }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="open" @click.outside="open = false"
             x-transition
             class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg z-50">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endauth


    <!-- Light/Dark toggle -->
    <button id="themeToggle" class="text-xl focus:outline-none">
        <span id="lightIcon" class="hidden">🌞</span>
        <span id="darkIcon">🌙</span>
    </button>
</div>


        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobileMenuBtn" class="text-2xl focus:outline-none">☰</button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-4 pb-4 space-y-2">
    <a href="#play" class="block">Play</a>
    <a href="#vote" class="block">Vote</a>
    <a href="#ranks" class="block">Ranks</a>
    <a href="#store" class="block">Store</a>
    <a href="#discord" class="block">Discord</a>

    @guest
        <a href="{{ route('login') }}" class="block">Login</a>
        <a href="{{ route('register') }}" class="block">Register</a>
    @endguest

    @auth
    <div class="text-sm font-medium">{{ Auth::user()->name }}</div>
    <a href="{{ route('profile.edit') }}" class="block">Profile</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="block text-left w-full">Logout</button>
    </form>
    @endauth

</div>

</nav>
