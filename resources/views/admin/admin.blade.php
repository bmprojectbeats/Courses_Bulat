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
   <x-admin.header />
   <section>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">Дата подачи</th>
          <th scope="col">Дата обновления</th>
          <th scope="col">Статус</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($all_applications as $item)
        <tr>
          
          <td scope="row">{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          
          @if ($item->is_confirm == 0)
          <td>Отклонена</td>
          @else
          <td>Подтверждена</td>
          @endif

          @if ($item->is_confirm == 0)
          <td>
            <a href="/application/{{$item->id}}/confirm">
              <img src="" alt="Принять">
            </a>
          </td>
          @else

          @endif
      </tr>
        @endforeach
        
                        
      </tbody>
    </table>
    <form method="POST" action="/course/create" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Название курса</label>
        <input type="text" class="form-control" name="title">
        @error('title')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input type="text" class="form-control" name="description">
        @error('description')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="cost" class="form-label">Стоимость</label>
        <input type="text" class="form-control" name="cost">
        @error('cost')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="duration" class="form-label">Длительность</label>
        <input type="text" class="form-control" name="duration">
        @error('duration')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Изображение</label>
        <input type="file" class="form-control" name="image">
        @error('image')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <div class="mb-3">
        <select class="form-select" name="category">

          @foreach ($categories as $item)
          <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Создать курс</button>
    </form>

    <form method="POST" action="/category/create">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Название категории</label>
        <input type="text" class="form-control" name="title">
        @error('title')
        <div class="alert alert-danger" role="alert">
          {{$message}}
        </div> 
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Создать категорию</button>
    </form>
   </section>
</body>
</html>