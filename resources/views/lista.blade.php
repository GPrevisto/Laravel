
    <!-- @extends('layouts.app') -->
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="container">
        <div class="">
            <h1>Plants</h1>
        
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Scientific name</th>
      <th scope="col">Description</th>
      <th scope="col">Is Carnivora?</th>
      <th scope="col">Deletar</th>
      <th scope="col">Editar</th>
      <th scope="col">Mostrar</th>
    </tr>
  </thead>
  <tbody>
  @php
    $i=0;
@endphp
  @foreach ($plants as $plant)

    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{ $plant->name }}</td>
      <td>{{ $plant->scientific_name }}</td>
      <td>{{ $plant->description }}</td>
      <td>
      {{ $plant->isCarnivora == 1 ? 'Sim' : 'Não' }}
      </td>
      <td><a href="{{route('delete',$plant->id)}}"> D </a></td>
      <td><a href="{{route('edit',$plant->id)}}"> E </a></td>
      <td><button class="test" id="{{$i}}" data-id="{{$i}}" data-resource="{{$plant->id}}">Mostrar</button></td>
    </tr>
    
    @endforeach
  </tbody>
</table>
 

               
           
        </div>

        
    </div>
    <div class="div"> </div>
   
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('..\resources/js/tasks.js')}}" async="true" defer></script>