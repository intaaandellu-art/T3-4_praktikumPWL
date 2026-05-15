<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Buku</h1>
            <a href="{{ route('books.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Buku
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Cover</th>
                        <th class="py-3 px-4">Judul</th>
                        <th class="py-3 px-4">Penulis</th>
                        <th class="py-3 px-4">Tahun</th>
                        <th class="py-3 px-4">Penerbit</th>
                        <th class="py-3 px-4">Rak</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $index => $book)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $books->firstItem() + $index }}</td>
                        <td class="py-3 px-4">
                            @if($book->cover)
                                <img src="{{ Storage::url($book->cover) }}" 
                                     alt="Cover" 
                                     class="w-16 h-24 object-cover rounded">
                            @else
                                <div class="w-16 h-24 bg-gray-300 rounded flex items-center justify-center">
                                    <span class="text-xs">No Cover</span>
                                </div>
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $book->title }}</td>
                        <td class="py-3 px-4">{{ $book->author }}</td>
                        <td class="py-3 px-4">{{ $book->year }}</td>
                        <td class="py-3 px-4">{{ $book->publisher }}</td>
                        <td class="py-3 px-4">{{ $book->bookshelf->name }}</td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('books.show', $book) }}" 
                                   class="text-blue-600 hover:text-blue-800">
                                    Detail
                                </a>
                                <a href="{{ route('books.edit', $book) }}" 
                                   class="text-yellow-600 hover:text-yellow-800">
                                    Edit
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-4 px-4 text-center text-gray-500">
                            Tidak ada data buku
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</body>
</html>