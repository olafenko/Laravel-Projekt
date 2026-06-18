@extends("layout")

@section("content")
    <div class="messagesPage">

        <h2>Wiadomości ({{$messageCount}})</h2>
        <div class="messagesList">

            <div class="messagesHeader">
                <span>Ogłoszenie</span>
                <span>Od</span>
                <span>Data</span>
            </div>
               @foreach($models as $model)
                <a class="messageRow" href="/messages/details/{{$model->id}}">
                    <p class="msgTitle {{!$model->is_read ? "unread" : ""}}">{{$model->listing->title}}</p>
                    <p class="msgSender">{{$model->sender->username}}</p>
                    <div class="msgDate">{{$model->created_at}}</div>
                </a>
               @endforeach
        </div>
    </div>

@endsection
