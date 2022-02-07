<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolpress</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>

    <div id="app">

        @include('components.header')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @auth

        @yield('content')

        @else

        <h1>You need to Login to see the posts</h1>

        <form action="{{ route('login') }}" method="POST">

            @method('POST')
            @csrf

            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="E-mail"> <br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"> <br>
            <input type="submit" value="LOGIN">

        </form>

        <h2>If you aren't registered yet, you can do it here.</h2>

        <form action="{{ route('register') }}"  method="POST">

            @method('POST')
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Nome"> <br>
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="E-mail"> <br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"> <br>
            <label for="password_confirmation">Password confirm:</label>
            <input type="password" name="password_confirmation" placeholder="Password again"> <br>
            
            <input type="submit" value="REGISTER">

        </form>

        @endauth

        @include('components.footer')

    </div>
    
</body>
</html>