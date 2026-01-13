@extends('layouts.app')

@section('title', 'Edit Curahan Hati')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Curahan Hati</h2>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('curahan.update', $curahan) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea
                name="content"
                placeholder="Tulis curahan hatimu di sini..."
                rows="6"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:border-pink-500"
                required
            >{{ old('content', $curahan->content) }}</textarea>
            
            <!-- Checkbox Anonim -->
            <div class="flex items-center mb-4">
                <input 
                    type="checkbox" 
                    name="is_anonymous" 
                    id="is_anonymous" 
                    class="w-4 h-4 text-pink-500 border-gray-300 rounded focus:ring-pink-500"
                    {{ $curahan->is_anonymous ? 'checked' : '' }}
                >
                <label for="is_anonymous" class="ml-2 text-sm text-gray-700">
                    <i class="fas fa-user-secret text-gray-500"></i> Posting sebagai Anonim
                </label>
            </div>
            
            <div class="flex gap-2">
                <button
                    type="submit"
                    class="flex items-center gap-2 bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600"
                >
                    <i class="fas fa-save"></i>
                    Update
                </button>
                
                    href="{{ route('curahan.index') }}"
                    class="flex items-center gap-2 bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600"
                >
                    <i class="fas fa-times"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection