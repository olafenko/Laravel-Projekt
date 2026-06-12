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
                <a href='/'>Wyloguj</a>
            @endauth
            @guest()
                <a href='/'>Zarejestruj się</a>
                <a href='/'>Logowanie</a>
            @endguest
        </div>
</nav>

