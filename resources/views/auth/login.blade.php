@extends("layout")


@section("content")

    <div class="authContainer">

        @if($errors->any())
            <div class="formErrors my-3">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li class="text-center">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
