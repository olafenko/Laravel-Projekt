@extends("layout")

@section("content")


    <div class="messageFormPage">

        <div class="messageCard">


            <h2>Nowa wiadomość</h2>

            <div class="msgMeta">
                <p><strong>Ogłoszenie: {{$model->title}}</p>
                <p><strong>Odbiorca: {{$model->author->username}}</p>
            </div>

            @if($errors->any())
                <div class="formErrors my-3">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li class="text-center">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="/messages/send/{{$model->id}}">
                @csrf
                <p><strong>Nowa wiadomość:</strong></p>
                <textarea name="message_content" placeholder="Napisz wiadomość..." maxlength="200" required autofocus></textarea>
                <div class="msgActions">
                    <button class="detailsBtn" type="submit">Wyślij wiadomość</button>
                    <a class="cancelBtn" href="/listings/details/{{$model->id}}">Anuluj</a>
                </div>
            </form>


        </div>
    </div>


@endsection
