@extends("layout")

@section("content")

    <div class="userProfilePage">

        <div class="profileCard">
            <div class="profileCard-avatar">
                <img src="{{$model->avatar_url != null ? asset("storage/" . $model->avatar_url) : asset("uploads/no-image.jpg")}}">
            </div>
            <h2>{{$model->username}}</h2>
            <div class="profileMetaData">
                <p>Email: {{$model->email}}</p>
                <p>Nr tel.: {{$model->phone_number}}</p>
                <p>Konto założone: {{$model->created_at->format("d.m.Y")}}</p>

            </div>

            @can("update",$model)
                <div class="profileActions">
                    <a class="detailsBtn" href="/user/profile/edit/{{$model->id}}">Edytuj profil</a>
                    <a class="passwordBtn" href="/user/profile/password-change/{{$model->id}}">Zmień hasło</a>

                    <form method="post" action="/user/profile/deactivate/{{$model->id}}">
                        @csrf
                        <button class="deleteBtn">Dezaktywuj konto</button>
                    </form>
                </div>
            @endcan
        </div>
    </div>
@endsection
