<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supended</title>
     @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container my-5 ">
        <h2>You are suspended</h2>
        <p>You can still browse you profile and return book.</p>
        <p>If you think there was a mistake you can contact our admin.</p>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('profile') }}" class="btn btn-primary">
                Profile
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                 <button type="submit"  class="btn btn-danger">
                Logout
                 </button>
            </form>
           
        </div>

    </div>
</body>
</html>