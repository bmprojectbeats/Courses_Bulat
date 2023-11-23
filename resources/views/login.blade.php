<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <x-header />
    <div class="mb-3" style="text-align: center; margin-top: 30vh">
        <div class="container">
            <form action="/signin_valid" method="POST">
            @csrf
            @if (session("error"))
                {{session("error")}}                
            @endif
            <h1>Вход</h1>
            <h5>Email</h5>
            <input type="text" name="email">
            @error('email')
            <div class="alert alert-danger" role="alert">
               {{$message}}
              </div>    
            @enderror
            <h5>Пароль</h5>
            <input type="password" name="password">
            @error('password')
            <div class="alert alert-danger" role="alert">
               {{$message}}
              </div>    
            @enderror
            <br>
            <input type="submit" value="Войти" style="margin-top: 10px">
        </form>
        </div>
    </div>
</body>
</html>