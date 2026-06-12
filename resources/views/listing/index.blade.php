@extends("layout")


@section("content")

    @foreach($models as $model)
        <div class="card" style="width: 18rem;">
            <img src="/public/{{$model->photoUrl}}" class="card-img-top" >
            <div class="card-body">
                <h5 class="card-title">{{$model->title}}</h5>
                <p class="card-text">{{$model->category}}</p>
                <p class="card-text">{{$model->location}}</p>
                <p class="card-text">{{$model->price}}</p>
                <p class="card-text">{{$model->author}}</p>
                <p class="card-text">{{$model->createdAt}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach

@endsection
