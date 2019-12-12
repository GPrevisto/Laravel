<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    @extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="container">
        <div class="">
            <h1>Submit a Plant</h1>
            <form class="form" action="{{ action('PlantController@store') }}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
             
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('scientific_name') ? ' has-error' : '' }}">
                    <label for="scientific_name">Scientific Name</label>
                    <input type="text" class="form-control" id="scientific_name" name="scientific_name" placeholder="Scientific Name" value="{{ old('scientific_name') }}">
                    @if($errors->has('scientific_name'))
                        <span class="help-block">{{ $errors->first('scientific_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-check{{ $errors->has('isCarnivora') ? ' has-error' : '' }}">
                    <label for="isCarnivora">
                    <input type='hidden' value='0' name='isCarnivora'>
                    <input type="checkbox" class="form-check-input" id="isCarnivora" name="isCarnivora"  value="1">Is Carnivora</label>
                    @if($errors->has('isCarnivora'))
                        <span class="help-block">{{ $errors->first('isCarnivora') }}</span>
                    @endif
                </div>
         
 

                <button type="submit" id="Salvar" class="btn btn-primary">Submit</button>
            </form>

         <h4 class="modal-title">Plantas Cadastradas</h4>
       <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Scientific name</th>
      <th scope="col">Description</th>
      <th scope="col">Is Carnivora?</th>
      <th scope="col">Deletar</th>
      <th scope="col">Editar</th>
      
    </tr>
  </thead>
  <tbody id="lista">
  @php
    $i=0;
@endphp
  @foreach ($plants as $plant)

    <tr id="{{$plant->id}}">
      
      <td>{{ $plant->name }}</td>
      <td>{{ $plant->scientific_name }}</td>
      <td>{{ $plant->description }}</td>
      <td>
      {{ $plant->isCarnivora == 1 ? 'Sim' : 'Não' }}
      </td>
      <td><button id="delete" name="{{$plant->id}}"class="btn btn-primary" data-resource="{{$plant->id}}"> D </button></td>
      <td><button id="edit" name="{{$plant->id}}" class="btn btn-primary" data-resource="{{$plant->id}}"> E </button></td>
      
    </tr>
    
    @endforeach
  </tbody>
</table>
        </div>
    </div>  
    
@endsection
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('..\resources/js/lista.js')}}" async="true" defer></script>
</html>
