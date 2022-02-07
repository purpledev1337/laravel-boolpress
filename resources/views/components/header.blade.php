<header>

    <a href="{{ route('home') }}">
        <h1>Bool Press</h1>
    </a>

    @auth
        <div>
            <h1>Hello, {{ Auth::user() -> name }}!</h1>
            <h5>{{ Auth::user() -> email }}</h5>
            <h6>Member since: {{ Auth::user() -> created_at }}</h6>
            <a style="display: inline" class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>
        </div>
    @endauth
</header>