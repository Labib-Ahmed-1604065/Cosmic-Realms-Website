<x-app-layout>
    <!-- Hero Section with Parallax -->
    <section
        id="hero"
        class="relative h-screen bg-cover bg-center"
        style="background-image: url('/images/hero-bg.jpg');"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div
            class="relative z-10 flex items-center justify-center h-full text-center"
        >
            <h1
                class="text-5xl md:text-7xl font-extrabold text-white drop-shadow-lg"
            >
                Cosmic Realms
            </h1>
        </div>
    </section>
    <!-- Play Section -->
    <section id="play" class="bg-gray-100 dark:bg-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-12">
                Choose Your Adventure
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Game Mode Card -->
                @php
                    $modes = [
                        ['name' => 'LifeSteal', 'image' => 'lifesteal.jpg', 'desc' => 'Fight to survive. Every kill steals hearts!', 'ip' => 'cosmicrealms.club:25653'],
                        ['name' => 'Survival', 'image' => 'survival.jpg', 'desc' => 'Classic Minecraft survival with land claiming.', 'ip' => 'cosmicrealms.club:25653'],
                        ['name' => 'SkyBlock', 'image' => 'skyblock.jpg', 'desc' => 'Build your island and rise to the top!', 'ip' => 'cosmicrealms.club:25653'],
                    ];
                @endphp

                @foreach ($modes as $mode)
                    <div class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('images/' . $mode['image']) }}" alt="{{ $mode['name'] }}" class="w-full h-56 object-cover">
                        
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $mode['name'] }}</h3>
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 bg-white dark:bg-gray-900 px-4 py-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $mode['desc'] }}</p>
                            <button 
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded"
                                onclick="copyIP('{{ $mode['ip'] }}')"
                            >
                                Play Now
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- rank description -->
    <div
    x-data="{
        current: 0,
        ranks: [
            { name: 'Eternal', image: 'eternal.jpg', desc: 'The eternal warrior of Cosmic Realms.' },
            { name: 'Knight', image: 'knight.jpg', desc: 'Valiant and brave – the defender of honor.' },
            { name: 'Titan', image: 'titan.jpg', desc: 'A colossal force among all ranks.' },
            { name: 'Supreme', image: 'supreme.jpg', desc: 'Supreme authority with unmatched might.' },
            { name: 'Immortal', image: 'immortal.jpg', desc: 'Transcend death and dominate realms.' },
        ],
        next() { this.current = (this.current + 1) % this.ranks.length },
        prev() { this.current = (this.current - 1 + this.ranks.length) % this.ranks.length },
    }"
    >
<!-- Rank Section -->
<section id="ranks" class="py-20 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-12">Ranks</h2>

        <div 
            x-data="{
                ranks: [
                    { name: 'Eternal', desc: 'Starter rank with enchanted gear.', img: '/images/ranks/eternal.jpg' },
                    { name: 'Knight', desc: 'Mid-tier with better gear and perks.', img: '/images/ranks/knight.jpg' },
                    { name: 'Titan', desc: 'Powerful combat-focused rank.', img: '/images/ranks/titan.jpg' },
                    { name: 'Supreme', desc: 'Elite rank with rare bonuses.', img: '/images/ranks/supreme.jpg' },
                    { name: 'Immortal', desc: 'Top-tier rank with all benefits.', img: '/images/ranks/immortal.jpg' },
                ],
                current: 0,
                previous: 0,
                direction: 'left',
                slideTo(dir) {
                    this.previous = this.current;
                    this.current = (this.current + dir + this.ranks.length) % this.ranks.length;
                    this.direction = dir === 1 ? 'left' : 'right';
                }
            }"
            class="relative flex flex-col md:flex-row items-center gap-8"
        >
            <!-- Image + Slide buttons -->
            <div class="relative w-full md:w-1/2 overflow-hidden h-64">
                <!-- Image Slides -->
                <template x-for="(rank, index) in ranks" :key="index">
                    <img
                        x-show="index === current"
                        x-transition:enter="transition duration-500 ease-out"
                        :x-transition:enter-start="direction === 'left' ? 'translate-x-full opacity-0' : '-translate-x-full opacity-0'"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition duration-500 ease-in absolute top-0 left-0"
                        x-transition:leave-start="translate-x-0 opacity-100"
                        :x-transition:leave-end="direction === 'left' ? '-translate-x-full opacity-0' : 'translate-x-full opacity-0'"
                        :src="rank.img"
                        class="rounded-xl shadow-lg w-full h-full object-cover absolute top-0 left-0"
                        alt=""
                    />
                </template>

                <!-- Left Button -->
                <button
                    @click="slideTo(-1)"
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-40 text-white p-2 rounded-full hover:bg-opacity-70 transition z-10"
                >
                    ‹
                </button>

                <!-- Right Button -->
                <button
                    @click="slideTo(1)"
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-40 text-white p-2 rounded-full hover:bg-opacity-70 transition z-10"
                >
                    ›
                </button>
            </div>

            <!-- Rank Info -->
            <div class="text-center md:text-left md:w-1/2">
                <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200" x-text="ranks[current].name"></h3>
                <p class="mb-6 text-gray-600 dark:text-gray-300" x-text="ranks[current].desc"></p>
                <a
                    href="/store"
                    class="inline-block px-6 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition"
                >
                    Buy Now
                </a>
            </div>
        </div>
    </div>
</section>

    </div>

    <!-- Discord Section -->
    <section
        id="discord"
        class="relative bg-center bg-cover py-24 px-4 text-center text-white"
        style="background-image: url('/images/discord-banner.jpg');"
    >
        <div class="bg-black bg-opacity-60 absolute inset-0"></div>
        
        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Join Discord for 50 Diamonds</h2>
            <a
                href="https://discord.gg/WJ4NQgUgsu" target="_blank"
                class="inline-block mt-6 px-6 py-3 text-lg font-semibold bg-indigo-600 hover:bg-indigo-700 rounded transition"
            >
                Join Discord
            </a>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 py-6 px-4">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm mb-2 md:mb-0">© {{ date('Y') }} Cosmic Realms. All rights reserved.</p>

            <a href="https://facebook.com/" target="_blank" class="text-blue-600 hover:text-blue-800 dark:hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                    <path d="M22.675 0h-21.35C.596 0 0 .595 0 1.326v21.348C0 23.406.596 24 1.325 24H12.82V14.706h-3.34v-3.62h3.34V8.412c0-3.304 2.015-5.097 4.957-5.097 1.41 0 2.621.105 2.973.152v3.448h-2.04c-1.6 0-1.91.761-1.91 1.875v2.46h3.823l-.498 3.62h-3.325V24h6.52C23.404 24 24 23.406 24 22.674V1.326C24 .595 23.404 0 22.675 0z"/>
                </svg>
            </a>
        </div>
    </footer>
</x-app-layout>