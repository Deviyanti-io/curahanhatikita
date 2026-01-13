<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Kita - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse 2s ease-in-out infinite;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .hearts-bg {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
        }

        .heart {
            position: absolute;
            font-size: 20px;
            opacity: 0.1;
            animation: floatHeart 15s infinite;
        }

        @keyframes floatHeart {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.1;
            }
            90% {
                opacity: 0.1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 min-h-screen relative overflow-x-hidden">
    
    <div class="hearts-bg">
        <div class="heart" style="left: 10%; animation-delay: 0s;">💖</div>
        <div class="heart" style="left: 20%; animation-delay: 2s;">💝</div>
        <div class="heart" style="left: 30%; animation-delay: 4s;">💗</div>
        <div class="heart" style="left: 40%; animation-delay: 6s;">💓</div>
        <div class="heart" style="left: 50%; animation-delay: 8s;">💕</div>
        <div class="heart" style="left: 60%; animation-delay: 10s;">💖</div>
        <div class="heart" style="left: 70%; animation-delay: 12s;">💝</div>
        <div class="heart" style="left: 80%; animation-delay: 14s;">💗</div>
    </div>

    @if(session('logged_in'))
    <header class="glass shadow-lg sticky top-0 z-50 animate-fadeIn">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3 animate-pulse-slow">
                <div class="relative">
                    <i class="fas fa-heart text-pink-500 text-4xl animate-float"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-pink-400 rounded-full animate-ping"></div>
                </div>
                <div>
                    <h1 class="text-3xl font-bold gradient-text">Cerita Kita</h1>
                    <p class="text-xs text-gray-500">Berbagi Cerita, Berbagi Hati</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 bg-gradient-to-r from-pink-100 to-purple-100 px-4 py-2 rounded-full">
                    <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(session('username'), 0, 1)) }}
                    </div>
                    <span class="text-gray-700 font-semibold">{{ session('username') }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-all transform hover:scale-105">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden md:inline">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <nav class="glass border-b border-gray-200 sticky top-[73px] z-40 animate-fadeIn">
        <div class="container mx-auto px-4">
            <div class="flex gap-2 overflow-x-auto">
                <a href="{{ route('mutiara') }}" class="flex items-center gap-2 px-6 py-4 whitespace-nowrap transition-all relative group {{ request()->routeIs('mutiara') ? 'text-pink-500' : 'text-gray-600 hover:text-pink-500' }}">
                    <i class="fas fa-book-open text-xl {{ request()->routeIs('mutiara') ? 'animate-pulse-slow' : '' }}"></i>
                    <span class="font-semibold">Kata Mutiara</span>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-purple-500 transform transition-transform {{ request()->routeIs('mutiara') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></div>
                </a>
                <a href="{{ route('insight') }}" class="flex items-center gap-2 px-6 py-4 whitespace-nowrap transition-all relative group {{ request()->routeIs('insight') ? 'text-pink-500' : 'text-gray-600 hover:text-pink-500' }}">
                    <i class="fas fa-lightbulb text-xl {{ request()->routeIs('insight') ? 'animate-pulse-slow' : '' }}"></i>
                    <span class="font-semibold">Daily Insight</span>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-purple-500 transform transition-transform {{ request()->routeIs('insight') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></div>
                </a>
                <a href="{{ route('mood.index') }}" class="flex items-center gap-2 px-6 py-4 whitespace-nowrap transition-all relative group {{ request()->routeIs('mood.*') ? 'text-pink-500' : 'text-gray-600 hover:text-pink-500' }}">
                    <i class="fas fa-heart-pulse text-xl {{ request()->routeIs('mood.*') ? 'animate-pulse-slow' : '' }}"></i>
                    <span class="font-semibold">Mood Tracker</span>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-purple-500 transform transition-transform {{ request()->routeIs('mood.*') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></div>
                </a>
                <a href="{{ route('curahan.index') }}" class="flex items-center gap-2 px-6 py-4 whitespace-nowrap transition-all relative group {{ request()->routeIs('curahan.*') ? 'text-pink-500' : 'text-gray-600 hover:text-pink-500' }}">
                    <i class="fas fa-pen-fancy text-xl {{ request()->routeIs('curahan.*') ? 'animate-pulse-slow' : '' }}"></i>
                    <span class="font-semibold">Curahan Hati</span>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-purple-500 transform transition-transform {{ request()->routeIs('curahan.*') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></div>
                </a>
                <a href="{{ route('playlist') }}" class="flex items-center gap-2 px-6 py-4 whitespace-nowrap transition-all relative group {{ request()->routeIs('playlist') ? 'text-pink-500' : 'text-gray-600 hover:text-pink-500' }}">
                    <i class="fas fa-music text-xl {{ request()->routeIs('playlist') ? 'animate-pulse-slow' : '' }}"></i>
                    <span class="font-semibold">Playlist</span>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-purple-500 transform transition-transform {{ request()->routeIs('playlist') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></div>
                </a>
            </div>
        </div>
    </nav>
    @endif

    <main class="container mx-auto px-4 py-8 relative z-10">
        @if(session('success'))
        <div class="max-w-4xl mx-auto mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-lg animate-fadeInUp flex items-center gap-3">
            <i class="fas fa-check-circle text-2xl"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if(session('error'))
        <div class="max-w-4xl mx-auto mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg shadow-lg animate-fadeInUp flex items-center gap-3">
            <i class="fas fa-exclamation-circle text-2xl"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="max-w-4xl mx-auto mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg shadow-lg animate-fadeInUp">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-triangle text-2xl"></i>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    @if(session('logged_in'))
    <footer class="glass mt-12 py-8 border-t border-gray-200 relative z-10">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex justify-center items-center gap-2 mb-4">
                    <i class="fas fa-heart text-pink-500 text-2xl animate-pulse-slow"></i>
                    <h3 class="text-2xl font-bold gradient-text">Cerita Kita</h3>
                </div>
                <p class="text-gray-600 mb-4">Berbagi Cerita, Menyatukan Hati</p>
                <p class="text-sm text-gray-500">© 2026 Cerita Kita. Dibuat dengan <i class="fas fa-heart text-red-500 animate-pulse-slow"></i></p>
            </div>
        </div>
    </footer>
    @endif
</body>
</html>