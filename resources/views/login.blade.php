@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 relative">
    <!-- Decorative elements -->
    <div class="absolute top-20 left-10 text-pink-200 text-9xl opacity-20 animate-float">
        <i class="fas fa-heart"></i>
    </div>
    <div class="absolute bottom-20 right-10 text-purple-200 text-9xl opacity-20 animate-float" style="animation-delay: 1s;">
        <i class="fas fa-heart"></i>
    </div>

    <div class="glass rounded-3xl shadow-2xl p-10 w-full max-w-md transform hover:scale-105 transition-all duration-300 animate-fadeInUp relative overflow-hidden">
        <!-- Shimmer effect -->
        <div class="absolute inset-0 shimmer pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="inline-block mb-4 animate-pulse-slow">
                <div class="relative">
                    <i class="fas fa-heart text-pink-500 text-7xl animate-float"></i>
                    <div class="absolute top-0 right-0 w-4 h-4 bg-pink-400 rounded-full animate-ping"></div>
                </div>
            </div>
            <h1 class="text-5xl font-bold gradient-text mb-3">Cerita Kita</h1>
            <p class="text-gray-600 text-lg">Ruang untuk berbagi cerita dan perasaan</p>
            <div class="flex justify-center gap-2 mt-4">
                <div class="w-2 h-2 bg-pink-400 rounded-full animate-ping"></div>
                <div class="w-2 h-2 bg-purple-400 rounded-full animate-ping" style="animation-delay: 0.2s;"></div>
                <div class="w-2 h-2 bg-blue-400 rounded-full animate-ping" style="animation-delay: 0.4s;"></div>
            </div>
        </div>
        
        @if($errors->any())
        <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg animate-fadeInUp" role="alert">
            <div class="flex items-start">
                <i class="fas fa-exclamation-circle text-2xl mr-3"></i>
                <div>
                    <p class="font-bold mb-1">Oops! Ada masalah:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg animate-fadeInUp" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-2xl mr-3"></i>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" id="loginForm" class="relative z-10">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <i class="fas fa-user text-pink-500"></i>
                    Nama Anda
                </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Masukkan nama Anda (min. 3 karakter)"
                    value="{{ old('username') }}"
                    class="w-full px-5 py-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all text-lg"
                    required
                    autocomplete="off"
                    maxlength="50"
                />
                
                <div class="flex justify-between items-center mt-2">
                    <p id="error-message" class="text-xs text-red-500 hidden"></p>
                    <p id="char-counter" class="text-xs text-gray-400">0 / 50 karakter</p>
                </div>

                <div id="validation-hints" class="mt-3 space-y-2">
                    <div id="hint-length" class="flex items-center gap-2 text-xs text-gray-400">
                        <i class="fas fa-circle text-gray-300"></i>
                        <span>Minimal 3 karakter</span>
                    </div>
                    <div id="hint-chars" class="flex items-center gap-2 text-xs text-gray-400">
                        <i class="fas fa-circle text-gray-300"></i>
                        <span>Hanya huruf, angka, underscore, dan spasi</span>
                    </div>
                    <div id="hint-spaces" class="flex items-center gap-2 text-xs text-gray-400">
                        <i class="fas fa-circle text-gray-300"></i>
                        <span>Tidak boleh hanya berisi spasi</span>
                    </div>
                </div>
            </div>
            
            <button
                type="submit"
                id="submitBtn"
                class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white py-4 rounded-xl font-bold text-lg hover:from-pink-600 hover:via-purple-600 hover:to-blue-600 transition-all transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
            >
                <i class="fas fa-sign-in-alt"></i>
                Masuk ke Cerita Kita
                <i class="fas fa-arrow-right animate-pulse"></i>
            </button>
        </form>

        <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl relative z-10">
            <div class="flex items-start gap-3">
                <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                <div class="text-sm text-gray-600">
                    <p class="font-semibold mb-1">Tips:</p>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        <li>Gunakan nama yang mudah diingat</li>
                        <li>Nama akan ditampilkan saat Anda posting</li>
                        <li>Anda bisa posting secara anonim nanti</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-pink-300 to-transparent rounded-br-full opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-purple-300 to-transparent rounded-tl-full opacity-50"></div>
    </div>
</div>

<script>
const usernameInput = document.getElementById('username');
const submitBtn = document.getElementById('submitBtn');
const errorMessage = document.getElementById('error-message');
const charCounter = document.getElementById('char-counter');
const hintLength = document.getElementById('hint-length');
const hintChars = document.getElementById('hint-chars');
const hintSpaces = document.getElementById('hint-spaces');

const validCharsRegex = /^[a-zA-Z0-9_\s]*$/;

usernameInput.addEventListener('input', function(e) {
    const value = this.value;
    const length = value.length;
    
    charCounter.textContent = `${length} / 50 karakter`;
    
    errorMessage.classList.add('hidden');
    submitBtn.disabled = false;
    this.classList.remove('border-red-500', 'border-green-500');
    
    resetHint(hintLength);
    resetHint(hintChars);
    resetHint(hintSpaces);
    
    if (length === 0) {
        charCounter.classList.remove('text-green-500', 'text-red-500');
        charCounter.classList.add('text-gray-400');
        return;
    }
    
    let hasError = false;
    
    if (length < 3) {
        setHintError(hintLength, 'Minimal 3 karakter!');
        hasError = true;
    } else {
        setHintSuccess(hintLength);
    }
    
    if (!validCharsRegex.test(value)) {
        setHintError(hintChars, 'Karakter tidak valid!');
        hasError = true;
    } else {
        setHintSuccess(hintChars);
    }
    
    if (value.trim().length === 0 && length > 0) {
        setHintError(hintSpaces, 'Tidak boleh hanya spasi!');
        hasError = true;
    } else if (length > 0) {
        setHintSuccess(hintSpaces);
    }
    
    if (hasError) {
        this.classList.add('border-red-500');
        submitBtn.disabled = true;
        charCounter.classList.remove('text-gray-400', 'text-green-500');
        charCounter.classList.add('text-red-500');
    } else {
        this.classList.add('border-green-500');
        charCounter.classList.remove('text-gray-400', 'text-red-500');
        charCounter.classList.add('text-green-500');
    }
});

function resetHint(element) {
    const icon = element.querySelector('i');
    icon.className = 'fas fa-circle text-gray-300';
    element.classList.remove('text-red-500', 'text-green-500');
    element.classList.add('text-gray-400');
}

function setHintError(element, message) {
    const icon = element.querySelector('i');
    icon.className = 'fas fa-times-circle text-red-500';
    element.classList.remove('text-gray-400', 'text-green-500');
    element.classList.add('text-red-500');
}

function setHintSuccess(element) {
    const icon = element.querySelector('i');
    icon.className = 'fas fa-check-circle text-green-500';
    element.classList.remove('text-gray-400', 'text-red-500');
    element.classList.add('text-green-500');
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
    const username = usernameInput.value.trim();
    
    if (username.length < 3 || !validCharsRegex.test(username) || username.length === 0) {
        e.preventDefault();
        return false;
    }
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
    submitBtn.disabled = true;
});

window.addEventListener('load', () => {
    usernameInput.focus();
});

usernameInput.addEventListener('focus', () => {
    errorMessage.classList.add('hidden');
});
</script>

<style>
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
}

.border-red-500 {
    animation: shake 0.3s;
}
</style>
@endsection