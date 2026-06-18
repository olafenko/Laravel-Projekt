@extends("layout")

@section("content")


    <div class="replyMessageForm">

        <div class="oldMessageCard">
            <h2>Wiadomość</h2>

            <div class="msgMeta">
                <p><strong>Od: {{$model->sender->username}}</strong></p>
                <p><strong>Ogłoszenie: {{$model->listing->title}}</strong></p>
                <p><strong>Data: {{$model->created_at}}</strong></p>

            </div>
            <p><strong>Treść:</strong></p>
            <div class="msgContent old">
                {{$model->message_content}}
            </div>

        </div>

        <div class="messageCard">


            <h2>{{$page_title}}</h2>

            <div class="msgMeta">
                <p><strong>Ogłoszenie: {{$model->listing->title}}</p>
                <p><strong>Odbiorca: {{$model->listing->author->username}}</p>
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

            <form method="post" action="/messages/reply/{{$model->id}}">
                @csrf
                <p><strong>Nowa wiadomość:</strong></p>
                <textarea name="message_content" placeholder="Napisz wiadomość..." maxlength="200" required autofocus></textarea>
                <div class="msgActions">
                    <button class="detailsBtn" type="submit">Wyślij wiadomość</button>
                    <a class="cancelBtn" href="/messages/{{auth()->id()}}">Anuluj</a>
                </div>
            </form>


        </div>
    </div>


@endsection
