<div>
    <h2>Data Pengembalian</h2>

    @foreach($data as $item)
        <div>
            <p>Buku: {{ $item->book->title ?? '-' }}</p>

            <p>Denda: {{ $item->returns->amount ?? 'Tidak ada' }}</p>
        </div>
        <hr>
    @endforeach
</div>