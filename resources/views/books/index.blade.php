<div>
    <h1>Data Buku</h1>

    @foreach($books as $book)
        <div style="border:1px solid #000; margin:10px; padding:10px;">
            <p>Judul: {{ $book->title }}</p>
            <p>Author: {{ $book->author }}</p>

            <p>Rak: {{ $book->bookshelf->name ?? '-' }}</p>
        </div>
    @endforeach
</div>