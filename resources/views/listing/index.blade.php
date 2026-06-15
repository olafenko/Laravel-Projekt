@extends("layout")


@section("content")
    <div class="listingsPage">

        <form class="searchBar" method="get" action="">
            <input type="text" name="searchFragment" placeholder="Wyszukaj po nazwie" value="">
            <button type="submit">Szukaj</button>
        </form>


        <div class='resultsCount'>
            <h3>Znalezione ogłoszenia: {{$listingsCount}}</h3>
        </div>

        <div class="listingsCards">

            @foreach($models as $model)
                <div class='listingCard'>
                    <div class='listingCard-photo'>
                        <img src='{{$model->photo_url != null ? asset("storage/" . $model->photo_url) : asset("uploads/no-image.jpg")}}'>
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
                        <a class="detailsBtn" href='{{ url()->current() }}/edit/{{$model->id}}'> Pokaż szczegóły</a>
                        @auth
                            @can("update",$model)
                                <a class="editBtn" href=''>Edytuj</a>
                                <form method='post' action='{{ url()->current() }}/delete/{{$model->id}}'>
                                    <button type='submit' class="iconBtn delete">❌</button>
                                </form>
                            @endcan
                            @can("add-as-favourite",$model)
                                <form method='post' action=''>
                                    <button type='submit' class="iconBtn fav">❤</button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
