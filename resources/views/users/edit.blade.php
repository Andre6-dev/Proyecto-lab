@extends('layouts.app')

@section('content')


<form action="{{ route('users.update', $user) }}" method="post" >
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title" class="col-sm-12 col-form-label">
            {{ __('Nombre') }}
        </label>
        <div class="col-sm-12">
            <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}"  autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-12 col-form-label">
            {{ __('Correo Electronico')}}
        </label>
        <div class="col-sm-12">
            <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}" autofocus>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">
                {{__('Editar')}}
            </button>
        </div>
    </div>
</form>
@endsection