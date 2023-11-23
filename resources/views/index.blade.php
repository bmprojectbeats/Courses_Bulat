<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">    
<title>Document</title>
</head>
<body>
  <x-header />

      <main>
        <section class="hero">
            <div class="card text-bg-dark">
                <img src="images/1.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h5 class="card-title">Special title treatment</h5>
                </div>
              </div>
        </section>
        <section id="about">
            <div class="container" >
                <h2 class="m-3">О нас</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                      <div class="card">
                        
                        <div class="card-body">
                          <h5 class="card-title">Преимущество 1</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card">
                       
                        <div class="card-body">
                          <h5 class="card-title">Преимущество 2</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card">
                    
                        <div class="card-body">
                          <h5 class="card-title">Преимущество 3</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </section>

                {{session()->get('alert')}}
                    


                <section id="courses">
                    <div class="container">
                        <h2 class="m-3">Наши курсы</h2>
                        <div class="d-flex">
                        @foreach ($courses as $item)
                        <div class="card" style="width: 18rem;">
                          <img src="storage/image/{{$item->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$item->title}}</h5>
                              <p class="card-text">{{$item->description}}</p>
                              <p class="card-text">Цена: {{$item->cost}} р.</p>
                              <p class="card-text">Длительность: {{$item->duration}}</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                          
                        @endforeach
                      </div>
                    </div>
                    <div class="container">
                    {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                    
                </section>



<section id="enroll">
    <div class="container">
        <h2 class="m-3">Оставить заявку</h2>
<form method="POST" action="/enroll">
  @csrf
 
    <div class="mb-3">
        <label for="email" class="form-label">Ваш email</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div>
        @enderror
        
    </div>
    
    <div class="mb-3">
        <label for="name" class="form-label">Ваше имя</label>
        <input type="name" class="form-control" id="name" name="name">
        @error('name')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
        
    </div>
    
    <div class="mb-3">
    <label for="name" class="form-label">Выберите курс</label>
    <select class="form-control" name="course">
      @foreach ($courses as $item)
      <option value="{{$item->id}}">{{$item->title}}</option>
      @endforeach
    </select>
  </div>
      <button class="btn btn-primary" type="submit">Отправить
  </form>
</div>
</section>
            
      </main>
</body>
</html>