@extends("layout")

@section("content")
    <div class="listingFormPage">

        @if($errors->any())
            <div class="formErrors mb-3">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li class="text-center">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="formCard">

            <h2>{{$page_title}}</h2>

            <form method="POST" action="{{$model == null ? "/listings/create" : "/listings/edit/" . $model->id}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="formInput">
                    <label>Tytuł</label>
                    <input type="text" name="title" value="{{old('title',$model->title ?? null)}}" required>
                </div>
                <div class="formInput">
                    <label>Kategoria</label>
                    <select name='category_id' required>
                        <option value="" selected disabled hidden>Wybierz kategorie...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($model != null && $model->category_id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="formInput">
                    <label>Lokalizacja</label>
                    <input type="text" name="location" list="cities" value="{{old("location",$model->location)}}" required>
                    <datalist id="cities">
                        @foreach($cities as $city)
                            <option value="{{$city->name}}"></option>
                        @endforeach
                    </datalist>
                </div>

                <div class="formInput">
                    <label>Cena</label>
                    <input type="number" name="price" value="{{old('price',$model->price ?? null)}}"
                           step="0.01">
                </div>

                <div class="formInput">
                    <label>Zdjęcie (URL)</label>
                    <input type="file" name="photo_url" accept=".jpg, .jpeg, .png">
                </div>

                <div class="formInput">
                    <label>Opis</label>
                    <textarea name="description">{{old('description',$model->description ?? null)}}</textarea>
                </div>

                <div class="formActions">
                    <input class="saveBtn" type="submit" value="Zapisz">
                    <a class="cancelBtn" href="/listings">Anuluj</a>
                </div>
            </form>
        </div>
    </div>
@endsection
