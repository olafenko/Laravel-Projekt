@extends("layout")


@section("content")

    <div class="listingsCards">

        @foreach($models as $model)
            <div class='listingCard'>
                <div class='listingCard-photo'>
                    <img src='{{$model->photo_url ?? 'uploads/no-image.jpg'}}'>
                </div>
                <div class="listingCard-body">
                    <h3>{{$model->title}}</h3>
                    <p>Kategoria: {{$model->category->name}}</p>
                    <p>Lokalizacja: {{$model->location}}</p>
                    <p class="price">Cena: {{$model->price}}zł</p>
                    <p class="metaData">Dodano przez: {{$model->author->username}}</p>
                    <p class="metaData">Data dodania: {{$model->created_at}}</p>
                </div>
                <div class="listingCard-actions">
                    <a class="detailsBtn" href=''> Pokaż szczegóły</a>
                    <a class="editBtn" href=''>Edytuj</a>
                    <form method='post' action=''>
                        <button type='submit' class="iconBtn delete">❌</button>
                    </form>
                    <form method='post' action=''>
                        <button type='submit' class="iconBtn fav">❤</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
