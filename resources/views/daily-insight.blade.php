@extends('layouts.app')

@section('title', 'Daily Insight')

@section('content')
<div class="max-w-5xl mx-auto animate-fadeIn">
    <!-- Header -->
    <div class="text-center mb-12 animate-fadeInUp">
        <div class="inline-block mb-4">
            <div class="relative">
                <i class="fas fa-lightbulb text-6xl text-yellow-500 animate-float"></i>
                <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-ping"></div>
            </div>
        </div>
        <h2 class="text-5xl font-bold gradient-text mb-3">Daily Insight</h2>
        <p class="text-gray-600 text-lg">Renungan harian untuk jiwa yang lebih tenang</p>
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-20 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full"></div>
        </div>
    </div>

    <!-- Today's Insight Card -->
    <div class="glass rounded-3xl shadow-2xl p-10 mb-12 card-hover animate-fadeInUp relative overflow-hidden">
        <!-- Animated background -->
        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10"></div>
        
        <!-- Content -->
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg animate-pulse-slow">
                        <i class="fas fa-sun"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Insight Hari Ini</h3>
                        <p class="text-sm text-gray-500">{{ now()->format('l, d F Y') }}</p>
                    </div>
                </div>
                <button onclick="showPopup()" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition-all transform hover:scale-105 flex items-center gap-2 shadow-lg">
                    <i class="fas fa-eye"></i>
                    Lihat Popup
                </button>
            </div>

            @if($randomInsight)
            <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 rounded-2xl shadow-2xl p-8 text-white relative overflow-hidden group">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 text-white/10 text-9xl">
                    <i class="fas fa-quote-right"></i>
                </div>
                
                <div class="relative z-10">
                    <div class="flex items-start gap-4 mb-4">
                        <i class="fas fa-quote-left text-3xl opacity-70"></i>
                    </div>
                    <p class="text-2xl leading-relaxed font-serif mb-4">{{ $randomInsight->insight }}</p>
                    <div class="flex items-center gap-4 mt-6">
                        <div class="h-px flex-1 bg-white/30"></div>
                        <button onclick="window.location.reload()" class="bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full hover:bg-white/30 transition-all flex items-center gap-2">
                            <i class="fas fa-redo"></i>
                            Insight Baru
                        </button>
                    </div>
                </div>

                <!-- Animated gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12 group-hover:translate-x-full transition-transform duration-1000"></div>
            </div>
            @else
            <div class="bg-gray-100 rounded-2xl p-8 text-center">
                <i class="fas fa-inbox text-6xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada insight tersedia.</p>
            </div>
            @endif

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500 flex items-center justify-center gap-2">
                    <i class="fas fa-info-circle"></i>
                    Insight berubah setiap kali Anda refresh halaman
                </p>
            </div>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-fadeInUp">
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-brain text-4xl text-purple-500 mb-3"></i>
            <p class="font-bold text-gray-800 text-xl mb-2">Renungan</p>
            <p class="text-gray-600 text-sm">Untuk jiwa yang lebih tenang</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-heart text-4xl text-pink-500 mb-3 animate-pulse-slow"></i>
            <p class="font-bold text-gray-800 text-xl mb-2">Inspirasi</p>
            <p class="text-gray-600 text-sm">Untuk hidup lebih bermakna</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover">
            <i class="fas fa-star text-4xl text-yellow-500 mb-3"></i>
            <p class="font-bold text-gray-800 text-xl mb-2">Motivasi</p>
            <p class="text-gray-600 text-sm">Untuk langkah lebih maju</p>
        </div>
    </div>
</div>

<!-- Popup Modal -->
<div id="insightPopup" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 transition-opacity duration-300">
    <div class="glass rounded-3xl shadow-2xl p-10 max-w-2xl w-full mx-4 transform transition-all duration-300 scale-95 animate-fadeInUp" id="popupContent">
        <div class="flex justify-between items-start mb-8">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white text-3xl shadow-lg animate-pulse-slow">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold gradient-text">Daily Insight</h3>
                    <p class="text-gray-500">Renungan Harian</p>
                </div>
            </div>
            <button onclick="closePopup()" class="text-gray-400 hover:text-gray-600 text-3xl transition-all transform hover:rotate-90">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        @if($randomInsight)
        <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 rounded-2xl p-8 text-white mb-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 text-white/10 text-9xl">
                <i class="fas fa-quote-right"></i>
            </div>
            <p class="text-xl leading-relaxed relative z-10 font-serif">{{ $randomInsight->insight }}</p>
        </div>
        @endif
        
        <div class="flex justify-center gap-4">
            <button onclick="window.location.reload()" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition-all transform hover:scale-105 flex items-center gap-2 shadow-lg">
                <i class="fas fa-redo"></i>
                Insight Baru
            </button>
            <button onclick="closePopup()" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all transform hover:scale-105 flex items-center gap-2">
                <i class="fas fa-times"></i>
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
// Show popup on page load
window.addEventListener('load', () => {
    @if($randomInsight)
    setTimeout(() => {
        showPopup();
    }, 1000);
    @endif
});

function showPopup() {
    const popup = document.getElementById('insightPopup');
    const popupContent = document.getElementById('popupContent');
    popup.classList.remove('hidden');
    popup.classList.add('flex');
    setTimeout(() => {
        popup.style.opacity = '1';
        popupContent.style.transform = 'scale(1)';
    }, 10);
}

function closePopup() {
    const popup = document.getElementById('insightPopup');
    const popupContent = document.getElementById('popupContent');
    popup.style.opacity = '0';
    popupContent.style.transform = 'scale(0.95)';
    setTimeout(() => {
        popup.classList.add('hidden');
        popup.classList.remove('flex');
    }, 300);
}

// Close popup when clicking outside
document.getElementById('insightPopup').addEventListener('click', (e) => {
    if (e.target.id === 'insightPopup') {
        closePopup();
    }
});

// Close with Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closePopup();
    }
});
</script>
@endsection