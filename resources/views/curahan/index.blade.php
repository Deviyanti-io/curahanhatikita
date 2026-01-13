@extends('layouts.app')

@section('title', 'Curahan Hati')

@section('content')
<div class="max-w-6xl mx-auto animate-fadeIn">
    <!-- Header -->
    <div class="text-center mb-12 animate-fadeInUp">
        <div class="inline-block mb-4">
            <i class="fas fa-pen-fancy text-6xl text-pink-500 animate-float"></i>
        </div>
        <h2 class="text-5xl font-bold gradient-text mb-3">Curahan Hati</h2>
        <p class="text-gray-600 text-lg">Berbagi cerita, menyatukan hati</p>
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-20 h-1 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full"></div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0s;">
            <i class="fas fa-heart text-4xl text-red-500 mb-3 animate-pulse-slow"></i>
            <p class="text-3xl font-bold gradient-text">{{ $curahans->count() }}</p>
            <p class="text-gray-600 text-sm">Total Curahan</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.1s;">
            <i class="fas fa-users text-4xl text-blue-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">{{ $curahans->pluck('author')->unique()->count() }}</p>
            <p class="text-gray-600 text-sm">Kontributor</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.2s;">
            <i class="fas fa-comment text-4xl text-green-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">{{ $curahans->sum(fn($c) => $c->commentsCount()) }}</p>
            <p class="text-gray-600 text-sm">Komentar</p>
        </div>
        <div class="glass rounded-2xl p-6 text-center card-hover animate-fadeInUp" style="animation-delay: 0.3s;">
            <i class="fas fa-thumbs-up text-4xl text-purple-500 mb-3"></i>
            <p class="text-3xl font-bold gradient-text">{{ $curahans->sum(fn($c) => $c->likesCount()) }}</p>
            <p class="text-gray-600 text-sm">Likes</p>
        </div>
    </div>
    
    <!-- Form Create -->
    <div class="glass rounded-3xl shadow-2xl p-8 mb-12 card-hover animate-fadeInUp relative overflow-hidden">
        <!-- Decorative background -->
        <div class="absolute top-0 right-0 text-pink-100 text-9xl opacity-10">
            <i class="fas fa-feather-alt"></i>
        </div>

        <div class="relative z-10">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold gradient-text">Tulis Curahan Hati Baru</h3>
                    <p class="text-gray-500 text-sm">Ekspresikan perasaanmu dengan bebas</p>
                </div>
            </div>

            <form action="{{ route('curahan.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <textarea
                        name="content"
                        placeholder="✍️ Tulis curahan hatimu di sini... Apa yang ingin kamu bagikan hari ini?"
                        rows="6"
                        class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all resize-none text-lg"
                        required
                    ></textarea>
                </div>
                
                <!-- Checkbox Anonim -->
                <div class="flex items-center justify-between mb-6 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl">
                    <div class="flex items-center gap-3">
                        <input 
                            type="checkbox" 
                            name="is_anonymous" 
                            id="is_anonymous" 
                            class="w-5 h-5 text-pink-500 border-gray-300 rounded focus:ring-pink-500 cursor-pointer"
                        >
                        <label for="is_anonymous" class="cursor-pointer flex items-center gap-2">
                            <i class="fas fa-user-secret text-gray-600 text-xl"></i>
                            <span class="text-gray-700 font-semibold">Posting sebagai Anonim</span>
                        </label>
                    </div>
                    <span class="text-xs text-gray-500 bg-white px-3 py-1 rounded-full">🔒 Nama Anda akan disembunyikan</span>
                </div>
                
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white py-4 rounded-2xl font-bold text-lg hover:from-pink-600 hover:via-purple-600 hover:to-blue-600 transition-all transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3"
                >
                    <i class="fas fa-paper-plane"></i>
                    Posting Curahan Hati
                    <i class="fas fa-heart animate-pulse-slow"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- List Curahan Hati -->
    <div class="mb-6 flex justify-between items-center animate-fadeInUp">
        <div class="flex items-center gap-3">
            <i class="fas fa-stream text-2xl text-pink-500"></i>
            <h3 class="text-2xl font-bold text-gray-800">Cerita dari Semua Orang</h3>
        </div>
        <div class="glass px-6 py-3 rounded-full">
            <span class="text-sm text-gray-600 font-semibold">📝 {{ $curahans->count() }} cerita dibagikan</span>
        </div>
    </div>
    
    <div class="grid gap-8">
        @forelse($curahans as $index => $curahan)
        <div class="glass rounded-3xl shadow-xl p-8 card-hover animate-fadeInUp relative overflow-hidden group" style="animation-delay: {{ $index * 0.1 }}s;">
            <!-- Hover gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-pink-500/0 to-purple-500/0 group-hover:from-pink-500/5 group-hover:to-purple-500/5 transition-all pointer-events-none"></div>

            <div class="relative z-10">
                <!-- Header -->
                <div class="flex justify-between items-start mb-6">
                    <!-- Avatar + Nama -->
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="w-14 h-14 rounded-2xl {{ $curahan->is_anonymous ? 'bg-gradient-to-br from-gray-400 to-gray-600' : 'bg-gradient-to-br from-pink-500 to-purple-500' }} flex items-center justify-center text-white font-bold text-xl shadow-lg transform group-hover:scale-110 transition-transform">
                                @if($curahan->is_anonymous)
                                    <i class="fas fa-user-secret"></i>
                                @else
                                    {{ strtoupper(substr($curahan->author, 0, 1)) }}
                                @endif
                            </div>
                            @if(!$curahan->is_anonymous)
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                {{ $curahan->display_name }}
                                @if($curahan->is_anonymous)
                                <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full">🔒 Anonim</span>
                                @endif
                            </h3>
                            <p class="text-sm text-gray-500 flex items-center gap-2">
                                <i class="far fa-clock"></i>
                                {{ $curahan->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <!-- Tombol Edit/Delete -->
                    @if(method_exists($curahan, 'isOwnedBy') && $curahan->isOwnedBy(session('username')))
                    <div class="flex gap-2">
                        <a href="{{ route('curahan.edit', $curahan) }}" class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl hover:bg-blue-200 transition-all flex items-center justify-center transform hover:scale-110">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('curahan.destroy', $curahan) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-10 h-10 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 transition-all flex items-center justify-center transform hover:scale-110">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="mb-6 bg-gradient-to-r from-pink-50 to-purple-50 rounded-2xl p-6">
                    <p class="text-gray-800 leading-relaxed whitespace-pre-wrap text-lg">{{ $curahan->content }}</p>
                </div>
                
                <!-- Interaksi -->
                <div class="border-t-2 border-gray-100 pt-6">
                    <div class="flex items-center gap-6 mb-6">
                        <button 
                            onclick="toggleLike({{ $curahan->id }})" 
                            class="flex items-center gap-3 px-6 py-3 rounded-xl transition-all transform hover:scale-105 {{ $curahan->isLikedBy(session('username')) ? 'bg-pink-100 text-pink-600' : 'bg-gray-100 text-gray-600 hover:bg-pink-100 hover:text-pink-600' }}"
                            id="like-btn-{{ $curahan->id }}"
                        >
                            <i class="fas fa-heart text-xl {{ $curahan->isLikedBy(session('username')) ? 'animate-pulse-slow' : '' }}" id="like-icon-{{ $curahan->id }}"></i>
                            <span class="font-bold" id="likes-count-{{ $curahan->id }}">{{ $curahan->likesCount() }}</span>
                        </button>
                        
                        <button 
                            onclick="toggleComments({{ $curahan->id }})" 
                            class="flex items-center gap-3 px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-purple-100 hover:text-purple-600 transition-all transform hover:scale-105"
                        >
                            <i class="fas fa-comment text-xl"></i>
                            <span class="font-bold" id="comments-count-{{ $curahan->id }}">{{ $curahan->commentsCount() }}</span>
                        </button>

                        <button class="flex items-center gap-3 px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-blue-100 hover:text-blue-600 transition-all transform hover:scale-105">
                            <i class="fas fa-share-alt text-xl"></i>
                            <span class="font-bold">Bagikan</span>
                        </button>
                    </div>
                    
                    <!-- Form Comment -->
                    <div id="comment-section-{{ $curahan->id }}" class="hidden animate-fadeInUp">
                        <div class="mb-6 bg-white rounded-2xl p-6 shadow-inner">
                            <textarea 
                                id="comment-input-{{ $curahan->id }}"
                                placeholder="💭 Tulis komentar kamu..."
                                rows="3"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all resize-none"
                            ></textarea>
                            <button 
                                onclick="addComment({{ $curahan->id }})"
                                class="mt-3 bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-xl hover:from-pink-600 hover:to-purple-600 transition-all transform hover:scale-105 flex items-center gap-2 font-semibold"
                            >
                                <i class="fas fa-paper-plane"></i>
                                Kirim Komentar
                            </button>
                        </div>
                        
                        <!-- List Comments -->
                        <div id="comments-list-{{ $curahan->id }}" class="space-y-4">
                            @foreach($curahan->comments as $comment)
                            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-5 shadow-sm" id="comment-{{ $comment->id }}">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-purple-400 rounded-xl flex items-center justify-center text-white font-bold">
                                                {{ strtoupper(substr($comment->username, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-800">{{ $comment->username }}</p>
                                                <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-700 ml-13 mb-3">{{ $comment->comment }}</p>
                                        
                                        <!-- Tombol Reply -->
                                        <button 
                                            onclick="showReplyBox({{ $comment->id }})"
                                            class="ml-13 text-xs text-pink-500 hover:text-pink-700 font-semibold flex items-center gap-2 transition-all transform hover:scale-105"
                                        >
                                            <i class="fas fa-reply"></i> Balas
                                        </button>
                                        
                                        <!-- Form Reply -->
                                        <div id="reply-box-{{ $comment->id }}" class="hidden mt-4 ml-13 pl-6 border-l-4 border-pink-300 animate-fadeInUp">
                                            <textarea 
                                                id="reply-input-{{ $comment->id }}"
                                                placeholder="💬 Tulis balasan..."
                                                rows="2"
                                                class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-100 transition-all resize-none text-sm"
                                            ></textarea>
                                            <div class="flex gap-2 mt-2">
                                                <button 
                                                    onclick="addReply({{ $curahan->id }}, {{ $comment->id }})"
                                                    class="bg-pink-500 text-white px-4 py-2 rounded-lg text-xs hover:bg-pink-600 transition-all transform hover:scale-105 flex items-center gap-2 font-semibold"
                                                >
                                                    <i class="fas fa-paper-plane"></i> Kirim
                                                </button>
                                                <button 
                                                    onclick="hideReplyBox({{ $comment->id }})"
                                                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-xs hover:bg-gray-400 transition-all transform hover:scale-105"
                                                >
                                                    <i class="fas fa-times"></i> Batal
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Replies List -->
                                        <div id="replies-{{ $comment->id }}" class="mt-4 ml-13 pl-6 border-l-4 border-pink-200 space-y-3">
                                            @foreach($comment->replies as $reply)
                                            <div class="bg-white rounded-xl p-4 shadow-sm" id="comment-{{ $reply->id }}">
                                                <div class="flex justify-between items-start">
                                                    <div class="flex-1">
                                                        <div class="flex items-center gap-2 mb-2">
                                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-400 rounded-lg flex items-center justify-center text-white font-bold text-xs">
                                                                {{ strtoupper(substr($reply->username, 0, 1)) }}
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold text-sm text-gray-800">{{ $reply->username }}</p>
                                                                <p class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                        <p class="text-gray-700 text-sm">{{ $reply->comment }}</p>
                                                    </div>
                                                    @if($reply->username === session('username'))
                                                    <button 
                                                        onclick="deleteComment({{ $reply->id }})"
                                                        class="text-red-500 hover:text-red-700 text-sm ml-2 transform hover:scale-110 transition-all"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    @if($comment->username === session('username'))
                                    <button 
                                        onclick="deleteComment({{ $comment->id }})"
                                        class="text-red-500 hover:text-red-700 ml-3 transform hover:scale-110 transition-all"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="glass rounded-3xl shadow-xl p-16 text-center animate-fadeInUp">
            <i class="fas fa-inbox text-8xl text-gray-300 mb-6"></i>
            <h3 class="text-2xl font-bold text-gray-600 mb-3">Belum Ada Curahan Hati</h3>
            <p class="text-gray-500 mb-6">Jadilah yang pertama berbagi cerita!</p>
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-3 rounded-xl hover:from-pink-600 hover:to-purple-600 transition-all transform hover:scale-105">
                <i class="fas fa-pen"></i> Tulis Sekarang
            </button>
        </div>
        @endforelse
    </div>
</div>

<script>
const csrfToken = '{{ csrf_token() }}';

// [Sisipkan semua JavaScript function yang sudah ada: toggleLike, toggleComments, addComment, deleteComment, showReplyBox, hideReplyBox, addReply]
// Saya skip untuk menghemat space, gunakan JavaScript yang sudah ada sebelumnya
</script>
@endsection