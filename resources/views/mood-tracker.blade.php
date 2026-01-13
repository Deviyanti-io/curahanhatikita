@extends('layouts.app')

@section('title', 'Mood Tracker')

@section('content')
<div class="max-w-7xl mx-auto animate-fadeIn">
    <div class="text-center mb-12 animate-fadeInUp">
        <div class="inline-block mb-4">
            <i class="fas fa-heart-pulse text-6xl text-pink-500 animate-float"></i>
        </div>
        <h2 class="text-5xl font-bold gradient-text mb-3">Mood Tracker</h2>
        <p class="text-gray-600 text-lg">Lacak dan pahami perasaanmu setiap hari</p>
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-20 h-1 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0s;">
            <i class="fas fa-calendar-check text-4xl text-blue-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">{{ $stats['total_entries'] }}</p>
            <p class="text-gray-600 text-sm">Total Catatan</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.1s;">
            <i class="fas fa-smile text-4xl text-yellow-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">{{ $stats['average_mood'] }}</p>
            <p class="text-gray-600 text-sm">Semua Mood</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.2s;">
            <i class="fas fa-fire text-4xl text-orange-500 mb-3 animate-pulse-slow"></i>
            <p class="text-3xl font-bold gradient-text">{{ $stats['current_streak'] }}</p>
            <p class="text-gray-600 text-sm">Streak Hari</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.3s;">
            <i class="fas fa-trophy text-4xl text-purple-500 mb-3"></i>
            <p class="text-lg font-bold gradient-text">{{ $stats['best_month'] }}</p>
            <p class="text-gray-600 text-sm">Bulan Terbaik</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="glass rounded-3xl shadow-2xl p-8 card-hover animate-fadeInUp">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                        <i class="fas fa-face-smile"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold gradient-text">Bagaimana Perasaanmu Hari Ini?</h3>
                        <p class="text-gray-500 text-sm">{{ Carbon\Carbon::today()->format('l, d F Y') }}</p>
                    </div>
                </div>

                @if($todayMood)
                <div class="bg-gradient-to-r from-green-100 to-blue-100 rounded-2xl p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="text-6xl">{{ $todayMood->mood_emoji }}</div>
                            <div>
                                <p class="text-2xl font-bold text-gray-800">{{ $todayMood->mood_label }}</p>
                                <p class="text-sm text-gray-600">Sudah dicatat hari ini</p>
                            </div>
                        </div>
                        <button onclick="showMoodForm()" class="bg-white text-blue-600 px-6 py-3 rounded-xl hover:bg-blue-50 transition-all font-semibold flex items-center gap-2">
                            <i class="fas fa-edit"></i> Ubah
                        </button>
                    </div>
                    @if($todayMood->note)
                    <div class="mt-4 pt-4 border-t border-white/50">
                        <p class="text-sm text-gray-700"><span class="font-semibold">Catatan:</span> {{ $todayMood->note }}</p>
                    </div>
                    @endif
                </div>
                @endif

                <form action="{{ route('mood.store') }}" method="POST" id="moodForm" class="{{ $todayMood ? 'hidden' : '' }}">
                    @csrf
                    <div class="mb-6">
                        <p class="text-center text-gray-700 font-semibold mb-4">Pilih mood kamu:</p>
                        <div class="flex justify-center gap-4 flex-wrap">
                            @for($i = 1; $i <= 5; $i++)
                                @php
                                    $config = App\Models\Mood::getMoodConfig($i);
                                @endphp
                                <label class="cursor-pointer transform hover:scale-110 transition-all">
                                    <input type="radio" name="mood_level" value="{{ $i }}" class="hidden mood-radio" required>
                                    <div class="mood-option text-center p-4 rounded-2xl border-4 border-transparent hover:border-pink-300 transition-all">
                                        <div class="text-6xl mb-2">{{ $config['emoji'] }}</div>
                                        <p class="text-sm font-semibold text-gray-700">{{ $config['label'] }}</p>
                                    </div>
                                </label>
                            @endfor
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-sticky-note text-purple-500"></i> Catatan (Opsional)
                        </label>
                        <textarea
                            name="note"
                            placeholder="Ceritakan lebih detail tentang perasaanmu hari ini..."
                            rows="3"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all resize-none"
                            maxlength="500"
                        ></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white py-4 rounded-xl font-bold text-lg hover:from-pink-600 hover:via-purple-600 hover:to-blue-600 transition-all transform hover:scale-105 flex items-center justify-center gap-3">
                        <i class="fas fa-save"></i>
                        Simpan Mood Hari Ini
                    </button>
                </form>
            </div>

            <div class="glass rounded-3xl shadow-2xl p-8 card-hover animate-fadeInUp">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold gradient-text">Pola Perasaanmu</h3>
                        <p class="text-gray-500 text-sm">Geser ke samping jika data banyak</p>
                    </div>
                </div>

                <div class="w-full overflow-x-auto pb-4 custom-scrollbar">
                    <div style="min-width: 100%; width: {{ max(count($chartData), 7) * 80 }}px; height: 350px;">
                        <canvas id="moodChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="glass rounded-3xl shadow-2xl p-8 card-hover animate-fadeInUp">
                <h3 class="text-2xl font-bold gradient-text mb-6 text-center">Mood Meter Minggu Ini</h3>
                
                <div class="relative w-64 h-64 mx-auto">
                    <svg class="transform -rotate-90" viewBox="0 0 200 200">
                        <circle cx="100" cy="100" r="80" fill="none" stroke="#e5e7eb" stroke-width="20"/>
                        @php
                            $weeklyAvg = $moodHistory->where('date', '>=', Carbon\Carbon::now()->subDays(7))->avg('mood_level') ?? 0;
                            $percentage = ($weeklyAvg / 5) * 100;
                            $circumference = 2 * 3.14159 * 80;
                            $offset = $circumference - ($percentage / 100) * $circumference;
                        @endphp
                        <circle 
                            cx="100" 
                            cy="100" 
                            r="80" 
                            fill="none" 
                            stroke="url(#gradient)" 
                            stroke-width="20"
                            stroke-dasharray="{{ $circumference }}"
                            stroke-dashoffset="{{ $offset }}"
                            stroke-linecap="round"
                            class="transition-all duration-1000"
                        />
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color:#ec4899;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#8b5cf6;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                    
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <p class="text-5xl font-bold gradient-text">{{ number_format($weeklyAvg, 1) }}</p>
                        <p class="text-sm text-gray-500 mt-2">Rata-rata</p>
                        <p class="text-3xl mt-2">
                            @if($weeklyAvg >= 4.5) 😄
                            @elseif($weeklyAvg >= 3.5) 😊
                            @elseif($weeklyAvg >= 2.5) 😐
                            @elseif($weeklyAvg >= 1.5) 😔
                            @else 😢
                            @endif
                        </p>
                    </div>
                </div>
                
                <div class="grid grid-cols-5 gap-2 mt-8">
                    @for($i = 1; $i <= 5; $i++)
                        @php $config = App\Models\Mood::getMoodConfig($i); @endphp
                        <div class="text-center p-2 rounded-lg {{ $weeklyAvg >= $i - 0.5 && $weeklyAvg < $i + 0.5 ? 'bg-pink-100' : 'bg-gray-50' }}">
                            <div class="text-2xl">{{ $config['emoji'] }}</div>
                            <p class="text-xs text-gray-600 mt-1">{{ $i }}</p>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="glass rounded-3xl shadow-2xl p-8 card-hover animate-fadeInUp sticky top-24">
                <div class="flex items-center gap-3 mb-6">
                    <i class="fas fa-history text-2xl text-pink-500"></i>
                    <h3 class="text-xl font-bold text-gray-800">Riwayat Mood</h3>
                </div>

                <div class="space-y-4 max-h-[600px] overflow-y-auto pr-2">
                    @forelse($moodHistory as $mood)
                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3 flex-1">
                                <div class="text-4xl">{{ $mood->mood_emoji }}</div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-800">{{ $mood->mood_label }}</p>
                                    <p class="text-xs text-gray-500">{{ $mood->date->format('d F Y') }}</p>
                                    @if($mood->note)
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $mood->note }}</p>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('mood.destroy', $mood) }}" method="POST" class="inline" onsubmit="return confirm('Hapus mood ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 transition-colors">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12">
                        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">Belum ada riwayat mood</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Style tambahan untuk scrollbar agar lebih rapi */
.custom-scrollbar::-webkit-scrollbar {
    height: 8px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #ec4899;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #be185d;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Mood selection logic
document.querySelectorAll('.mood-radio').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.mood-option').forEach(opt => {
            opt.classList.remove('bg-pink-100', 'border-pink-500', 'scale-110');
        });
        if(this.checked) {
            this.closest('label').querySelector('.mood-option').classList.add('bg-pink-100', 'border-pink-500', 'scale-110');
        }
    });
});

function showMoodForm() {
    document.getElementById('moodForm').classList.remove('hidden');
    window.scrollTo({ top: document.getElementById('moodForm').offsetTop - 100, behavior: 'smooth' });
}

// Mood Chart Logic
const chartData = @json($chartData);
const ctx = document.getElementById('moodChart').getContext('2d');

const gradient = ctx.createLinearGradient(0, 0, 0, 300);
gradient.addColorStop(0, 'rgba(236, 72, 153, 0.4)');
gradient.addColorStop(1, 'rgba(147, 51, 234, 0.0)');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartData.map(d => d.date),
        datasets: [{
            label: 'Level Mood',
            data: chartData.map(d => d.level),
            borderColor: 'rgb(236, 72, 153)',
            backgroundColor: gradient,
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointRadius: 6,
            pointBackgroundColor: 'white',
            pointBorderColor: 'rgb(236, 72, 153)',
            pointBorderWidth: 2,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 20,
                top: 10,
                bottom: 10
            }
        },
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const emoji = chartData[context.dataIndex].emoji;
                        return emoji + ' Level: ' + context.parsed.y;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 5,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        const moods = ['', '😢', '😔', '😐', '😊', '😄'];
                        return moods[value];
                    },
                    font: { size: 18 }
                },
                grid: { color: 'rgba(0, 0, 0, 0.05)' }
            },
            x: {
                ticks: {
                    autoSkip: false, // Penting: agar semua tanggal muncul meski panjang
                    maxRotation: 45,
                    minRotation: 45
                },
                grid: { display: false }
            }
        }
    }
});
</script>
@endsection