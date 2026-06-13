@extends("layout")


@section("content")

    <div class="authContainer">

        <div class="formErrors mb-3">
            @if($errors->any())
                {{ implode('', $errors->all()) }}
            @endif
        </div>

        <div class="authCard">
            <h1>Logowanie</h1>
            <form method="post" action="/auth/login">
                @csrf
                <div class="authInput">
                    <label>Nazwa użytkownika: </label>
                    <input type="text" name="username" value="{{old("username")}}" required>
                </div>

                <div class="authInput">
                    <label>Hasło: </label>
                    <input type="password" name="password" required>
                </div>
                <button class="authBtn" type="submit">Zaloguj się</button>
            </form>
        </div>
    </div>
@endsection
