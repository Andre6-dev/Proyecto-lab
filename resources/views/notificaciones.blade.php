@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <p style="justify-content: center"><b>Mis notificaciones</b></p>
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Titulo del post</th>
                <th scope="col">Nombre del Usuario</th>
                <th scope="col">Titulo del comentario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notify as $notificacion)
                <tr>
                    <th> {{$notificacion->created_at}}</th>
                    <th> {{$notificacion->data['title'] }}</th>    
                    <th> {{$notificacion->data['user'] }}</th>  
                    <th> {{$notificacion->data['comment'] }}</th>  
                </tr>
                @php
                    $notificacion->markAsRead();
                @endphp
            @endforeach
        </tbody>
    </table>

</div>
@endsection