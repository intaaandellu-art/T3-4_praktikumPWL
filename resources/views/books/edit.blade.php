<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Buku</h1>

            <div class="bg-white rounded-lg shadow p-6">
                <form action="{{ route('books.update', $book) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul</label>
                        <input type="text" 
                               name="title" 
                               value="{{ old('title', $book->title) }}"
                               class="w-full px-3 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Penulis</label>
                        <input type="text" 
                               name="author" 
                               value="{{ old('author', $book->author) }}"
                               class="w-full px-3 py-2 border rounded-lg @error('author') border-red-500 @enderror"
                               required>
                        @error('author')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tahun</label>
                        <input type="number" 
                               name="year" 
                               value="{{ old('year', $book->year) }}"
                               class="w-full px-3 py-2 border rounded-lg @error('year') border-red-500 @enderror"
                               required>
                        @error('year')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Penerbit</label>
                        <input type="text" 
                               name="publisher" 
                               value="{{ old('publisher', $book->publisher) }}"
                               class="w-full px-3 py-2 border rounded-lg @error('publisher') border-red-500 @enderror"
                               required>
                        @error('publisher')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kota</label>
                        <input type="text" 
                               name="city" 
                               value="{{ old('city', $book->city) }}"
                               class="w-full px-3 py-2 border rounded-lg @error('city') border-red-500 @enderror"
                               required>
                        @error('city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Rak Buku</label>
                        <select name="bookshelf_id" 
                                class="w-full px-3 py-2 border rounded-lg @error('bookshelf_id') border-red-500 @enderror"
                                required>
                            <option value="">Pilih Rak</option>
                            @foreach($bookshelves as $bookshelf)
                                <option value="{{ $bookshelf->id }}" 
                                        {{ old('bookshelf_id', $book->bookshelf_id) == $bookshelf->id ? 'selected' : '' }}>
                                    {{ $bookshelf->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('bookshelf_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Cover Buku</label>
                        @if($book->cover)
                            <div class="mb-2">
                                <img src="{{ Storage::url($book->cover) }}" 
                                     alt="Cover Saat Ini" 
                                     class="w-32 h-48 object-cover rounded">
                                <p class="text-sm text-gray-600 mt-1">Cover saat ini</p>
                            </div>
                        @endif
                        <input type="file" 
                               name="cover" 
                               accept="image/*"
                               class="w-full px-3 py-2 border rounded-lg @error('cover') border-red-500 @enderror">
                        <p class="text-sm text-gray-600 mt-1">Kosongkan jika tidak ingin mengubah cover</p>
                        @error('cover')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                            Update
                        </button>
                        <a href="{{ route('books.index') }}" 
                           class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>