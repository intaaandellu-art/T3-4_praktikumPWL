<div>
    <h2>Data Peminjaman</h2>

    @foreach($loans as $loan)
        <div>
            <p>User NPM: {{ $loan->user_npm }}</p>

            @foreach($loan->loanDetails as $detail)
                <p>Buku: {{ $detail->book->title ?? '-' }}</p>
            @endforeach
        </div>
        <hr>
    @endforeach
</div>