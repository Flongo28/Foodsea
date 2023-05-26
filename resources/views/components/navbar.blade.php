<nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <div class="logobox">
            <p class="samepos">Foodsea</p>
            <img class="samepos" src="{{ asset('img/logo.png') }}" alt="logo" ="100%">
        </div>

        <div class="buttonbox">
            <a class="navbar-brand" href="{{ route('search') }}">Recipes</a>
            <a class="navbar-brand" href="{{ route('concept') }}">Concept</a>

            @auth
                <!-- User is logged in -->
                <a class="navbar-brand" href="{{ route('favourites') }}">Favorites</a>
                <a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
            @else
                <!-- User is not logged in -->
                <a class="navbar-brand" href="{{ route('login') }}">Login</a>
                <a class="navbar-brand" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
  </div>
</nav>


