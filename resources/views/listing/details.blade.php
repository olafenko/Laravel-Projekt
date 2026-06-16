@extends("layout")

@section("content")


    <div class="listingDetailsPage">
        <div class="listingDetailsContainer">
            <a class="backBtn" href="/listings">Powrót</a>
            <div class="detailsCard">

                <div class="detailsLeft">
                    <div class="detailsPhoto">
                        <img src="{{$model->photo_url != null ? asset("storage/" . $model->photo_url) : asset("uploads/no-image.jpg")}}">
                    </div>

                    <div class="detailsInfo">
                        <div class="detailsTitleAndPrice">
                            <h2>{{$model->title}}</h2>
                            <p class="detailsPrice">{{$model->price}} zł</p>
                        </div>
                        <p>Data dodania: {{$model->created_at}}</p>
                        <p>Lokalizacja: {{$model->location}}</p>
                        <p>Kategoria: {{$model->category->name}}</p>
                        <div class="detailsDescription">
                            <p>Opis: {{$model->description}}</p>
                        </div>
                    </div>
                </div>

                <div class="detailsRight">
                    <a class="authorLink" href="">Autor ogłoszenia: {{$model->author->username}}</a>
                    <div class="contactBox">
                        <h2>Kontakt </h2>
                        <p><strong>Email: {{$model->author->email}}</p>
                        <p><strong>Nr tel. {{$model->author->phone_number}}</p>
                    </div>
                    <a class="msgBtn" href="">Napisz wiadomość</a>
                </div>
            </div>

        </div>


    </div>

@endsection
