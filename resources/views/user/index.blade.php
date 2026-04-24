<div>
    <h2>Data User</h2>

    @foreach($users as $user)
        <div>
            <p>Nama: {{ $user->first_name }} {{ $user->last_name }}</p>

            @foreach($user->loans as $loan)
                <p>Pinjam: {{ $loan->loan_at }}</p>
            @endforeach
        </div>
        <hr>
    @endforeach
</div>