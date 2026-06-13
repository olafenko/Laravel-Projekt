<nav class="mainNavbar">

        <div>
            <h1>
                <a href='/listings'>Serwis ogłoszeniowy </a>
            </h1>
        </div>

        <div>
            <a href='/listings'>Wszystkie ogłoszenia</a>
            @auth()
                <a href='/listings'>Dodaj ogłoszenie</a>
                <a href='/listings'>Ulubione</a>
                <a href='/listings'>Wiadomości</a>
                <a href='/listings'>Konto</a>
            <form method="post" action="/auth/logout" class="d-inline">
                @csrf
                <button type="submit" class="logoutLink">Wyloguj</button>
            </form>

            @endauth
            @guest()
                <a href='/auth/register'>Zarejestruj się</a>
                <a href='/auth/login'>Logowanie</a>
            @endguest
        </div>
</nav>

