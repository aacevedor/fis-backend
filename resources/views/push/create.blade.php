@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    {!! Form::model($notification, ['action' => 'PushNotificationController@store']) !!}
      <div class="form-group">
       {!! Form::label('user', 'User') !!}
       {!! Form::select('user', $users, ['class' => 'form-control']) !!}
     </div>

      <div class="form-group">
       {!! Form::label('message', 'Mensaje') !!}
       {!! Form::text('message', '', ['class' => 'form-control']) !!}
      </div>

      <button class="btn btn-success" type="submit">Enviar</button>
      {!! Form::close() !!}
    </div>
</div>
@endsection
