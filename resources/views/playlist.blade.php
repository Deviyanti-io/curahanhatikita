@extends('layouts.app')

@section('title', 'Playlist Spotify')

@section('content')
<div class="max-w-6xl mx-auto animate-fadeIn">
    <!-- Header -->
    <div class="text-center mb-12 animate-fadeInUp">
        <div class="inline-block mb-4">
            <i class="fas fa-music text-6xl text-green-500 animate-float"></i>
        </div>
        <h2 class="text-5xl font-bold gradient-text mb-3">Playlist Spotify</h2>
        <p class="text-gray-600 text-lg">Musik untuk menemani setiap momenmu</p>
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-blue-500 rounded-full"></div>
        </div>
    </div>

    <!-- Playlists Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Healing Playlist -->
        <div class="glass rounded-3xl shadow-2xl overflow-hidden card-hover animate-fadeInUp group" style="animation-delay: 0s;">
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 text-white/10 text-9xl transform rotate-12">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-spa text-4xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">Healing Playlist</h3>
                    <p class="text-white/80 mb-4">Musik untuk menenangkan hati</p>
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <i class="fas fa-headphones"></i>
                        <span>Cocok untuk relaksasi</span>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <iframe
                    src="https://open.spotify.com/embed/playlist/37i9dQZF1DX3rxVfibe1L0"
                    width="100%"
                    height="380"
                    frameBorder="0"
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"
                    class="rounded-2xl shadow-lg"
                ></iframe>
            </div>
        </div>

        <!-- Motivasi Pagi -->
        <div class="glass rounded-3xl shadow-2xl overflow-hidden card-hover animate-fadeInUp group" style="animation-delay: 0.2s;">
            <div class="bg-gradient-to-br from-orange-500 to-pink-600 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 text-white/10 text-9xl transform rotate-12">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-bolt text-4xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">Motivasi Pagi</h3>
                    <p class="text-white/80 mb-4">Bangkit dan bersemangat</p>
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <i class="fas fa-fire"></i>
                        <span>Energi untuk memulai hari</span>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <iframe
                    src="https://open.spotify.com/embed/playlist/37i9dQZF1DX0UrRvztWcAU"
                    width="100%"
                    height="380"
                    frameBorder="0"
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"
                    class="rounded-2xl shadow-lg"
                ></iframe>
            </div>
        </div>

        <!-- Malam Refleksi -->
        <div class="glass rounded-3xl shadow-2xl overflow-hidden card-hover animate-fadeInUp group" style="animation-delay: 0.4s;">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-700 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 text-white/10 text-9xl transform rotate-12">
                    <i class="fas fa-moon"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-moon text-4xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">Malam Refleksi</h3>
                    <p class="text-white/80 mb-4">Renungkan hari yang telah lewat</p>
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <i class="fas fa-star"></i>
                        <span>Untuk malam yang damai</span>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <iframe
                    src="https://open.spotify.com/embed/playlist/37i9dQZF1DWZd79rJ6a7lp"
                    width="100%"
                    height="380"
                    frameBorder="0"
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"
                    class="rounded-2xl shadow-lg"
                ></iframe>
            </div>
        </div>
    </div>

    <!-- Tips Section -->
    <div class="mt-16 glass rounded-3xl p-10 animate-fadeInUp">
        <div class="text-center mb-8">
            <i class="fas fa-lightbulb text-5xl text-yellow-500 mb-4 animate-pulse-slow"></i>
            <h3 class="text-3xl font-bold gradient-text mb-2">Tips Mendengarkan</h3>
            <p class="text-gray-600">Untuk pengalaman terbaik</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl card-hover">
                <i class="fas fa-headphones-alt text-4xl text-blue-500 mb-4"></i>
                <h4 class="font-bold text-gray-800 mb-2">Gunakan Headphone</h4>
                <p class="text-gray-600 text-sm">Nikmati kualitas audio terbaik</p>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-pink-50 to-orange-50 rounded-2xl card-hover">
                <i class="fas fa-volume-up text-4xl text-pink-500 mb-4"></i>
                <h4 class="font-bold text-gray-800 mb-2">Volume Nyaman</h4>
                <p class="text-gray-600 text-sm">Jaga kesehatan telinga Anda</p>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl card-hover">
                <i class="fas fa-couch text-4xl text-green-500 mb-4"></i>
                <h4 class="font-bold text-gray-800 mb-2">Ruang Nyaman</h4>
                <p class="text-gray-600 text-sm">Cari tempat yang tenang</p>
            </div>
        </div>
    </div>
</div>
@endsection