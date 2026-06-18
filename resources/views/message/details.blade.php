@extends("layout")

@section("content")


    <div class="messageFormPage">
        <div class="messageCard">
            <h2>Wiadomość</h2>

            <div class="msgMeta">
                <p><a class="senderLink" href="/user/profile/{{$model->sender->id}}"><strong>Od: {{$model->sender->username}}</strong></a></p>
                <p><strong>Ogłoszenie: {{$model->listing->title}}</strong></p>
                <p><strong>Data: {{$model->created_at}}</strong></p>

            </div>
            <p><strong>Treść:</strong></p>
            <div class="msgContent">
                {{$model->message_content}}
            </div>

            <div class="msgActions">
                <form method="post" action="">
                    <button type="submit" class="msgBtn">Odpowiedz</button>
                </form>
                <a class="cancelBtn" href="/messages/{{auth()->id()}}">Wróć</a>
            </div>



        </div>

    </div>




@endsection
