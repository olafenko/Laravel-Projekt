<nav class="mainNavbar">

        <div>
            <h1>
                <a href='/listings'>Serwis ogłoszeniowy </a>
            </h1>
        </div>

        <div>
            <a href='/listings'>Wszystkie ogłoszenia</a>
            @auth()
                <a href='/listings/create'>Dodaj ogłoszenie</a>
                <a href='/listings/favourites/add'>Ulubione</a>
                <a href='/messages'>Wiadomości</a>
                <a href='/account'>Konto</a>
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

