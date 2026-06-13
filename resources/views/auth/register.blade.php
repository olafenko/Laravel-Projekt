
@extends("layout")

@section("content")

    <div class="authCard">
        <h1>Rejestracja</h1>
        <form method="post" action="/auth/register">
            @csrf
            <div class="authInput">
                <label>Nazwa użytkownika: </label>
                <input type="text" name="username" required>
            </div>
            <div class="authInput">
                <label>Email: </label>
                <input type="email" name="email" required>
            </div>

            <div class="authInput">
                <label>Hasło: </label>
                <input type="password" name="password" required>
            </div>
            <button class="authBtn" type="submit">Zarejestruj się</button>

        </form>


    </div>


@endsection
