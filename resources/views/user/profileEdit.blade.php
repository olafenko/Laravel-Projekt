@extends("layout")

@section("content")

    <div class="userProfilePage">
        @if($errors->any())
            <div class="formErrors my-3">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li class="text-center">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="profileCard" method="post" enctype="multipart/form-data" action="/user/profile/edit/{{$model->id}}">
            @csrf
            <h2>{{$page_title}}</h2>

            <div class="editProfileInput">
                <label>Nazwa użytkownika: </label>
                <input type="text" name="username" value="{{old("username",$model->username)}}" required>
            </div>
            <div class="editProfileInput">
                <label>Email: </label>
                <input type="email" name="email" value="{{old("email",$model->email)}}"  required>
            </div>
            <div class="editProfileInput">
                <label>Numer telefonu: </label>
                <input type="text" name="phone_number" maxlength="15" minlength="9" value="{{old("phone_number",$model->phone_number)}}">
            </div>
            <div class="editProfileInput">
                <label>Awatar URL: </label>
                <input type="file" name="avatar_url" >
            </div>

            <div class="formActions">
                <input class="saveBtn" type="submit" value="Zapisz">
                <a class="cancelBtn" href="/user/profile/{{$model->id}}">Anuluj</a>
            </div>
        </form>

    </div>



@endsection
