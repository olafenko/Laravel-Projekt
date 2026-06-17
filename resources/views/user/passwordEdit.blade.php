@extends("layout")

@section("content")

    <div class="userProfilePage">

        <form class="profileCard" method="post" action="/user/profile/password-change/{{$model->id}}">
            @csrf
            <h2>{{$page_title}}</h2>

            @if($errors->any())
                <div class="formErrors my-3">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li class="text-center">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="editProfileInput">
                <label>Stare hasło: </label>
                <input type="password" name="oldPassword"  required>
            </div>
            <div class="editProfileInput">
                <label>Nowe hasło: </label>
                <input type="password" name="newPassword"  required>
            </div>
            <div class="editProfileInput">
                <label>Powtórz nowe hasło: </label>
                <input type="password" name="newPasswordRepeat">
            </div>

            <div class="formActions">
                <input class="saveBtn" type="submit" value="Zmień hasło">
                <a class="cancelBtn" href="/user/profile/{{$model->id}}">Anuluj</a>
            </div>
        </form>

    </div>



@endsection
