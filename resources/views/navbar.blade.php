<nav class="mainNavbar">

        <div>
            <h1>
                <a href='/'>Serwis ogłoszeniowy </a>
            </h1>
        </div>

        <div>
            <a href='/'>Wszystkie ogłoszenia</a>
            @auth()
                <a href='/'>Dodaj ogłoszenie</a>
                <a href='/'>Ulubione</a>
                <a href='/'>Wiadomości</a>
                <a href='/'>Konto</a>
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

