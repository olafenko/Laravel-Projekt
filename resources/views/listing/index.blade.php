@extends("layout")


@section("content")
    <div class="listingsPage">

        <form class="searchAndFilters" method="get" action="/listings">
            <div class="searchBar">
                <input type="text" name="searchFragment" placeholder="Wyszukaj po nazwie">
                <button type="submit">Szukaj</button>
            </div>
            <div class="filtersRow">
                <div class="filterSelect">
                    <label>Kategoria: </label>
                    <select name='category_id'>
                        <option value="" selected>Wszystkie</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filterSelect">
                    <label>Cena: </label>
                    <select name='priceSort'>
                        <option value="" >Domyślnie</option>
                        <option value="asc"> Od najniższej</option>
                        <option value="desc">Od najwyższej</option>
                    </select>
                </div>
                <div class="filterSelect">
                    <label>Data dodania: </label>
                    <select name='publishDate'>
                        <option value="" >Domyślnie</option>
                        <option value="desc"> Najnowsze</option>
                        <option value="asc">Najstarsze</option>
                    </select>
                </div>
            </div>


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
                        <p class="price">Cena: {{$model->price}} zł</p>
                        <p class="metaData">Dodano przez: {{$model->author->username}}</p>
                        <p class="metaData">Data dodania: {{$model->created_at->format("d.m.Y")}}</p>
                    </div>
                    <div class="listingCard-actions">
                        <a class="detailsBtn" href='/listings/{{$model->id}}'> Pokaż szczegóły</a>
                        @auth
                            @can("update",$model)
                                <a class="editBtn" href='/listings/edit/{{$model->id}}'>Edytuj</a>
                                <form method='post' action='/listings/delete/{{$model->id}}'>
                                    @csrf
                                    <button type='submit' class="iconBtn delete">❌</button>
                                </form>
                            @endcan
                            @can("guest-actions",$model)
                                <form method='post' action='/listings/favourites/toggle/{{$model->id}}'>
                                    @csrf
                                    <button type='submit' class="iconBtn {{auth()->user()->favourites->contains($model->id) ? 'inFavs' : 'fav'}}">❤</button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
