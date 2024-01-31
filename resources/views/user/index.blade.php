<php
    $users = App\User::all();

    $users = DB::table('users')->get();



@if (count($users) > 0)
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>


@endif
