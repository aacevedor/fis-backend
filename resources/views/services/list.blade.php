@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="row">
        <div class="col col-lg-1">
          <span><strong>ID</strong></span>
        </div>
        <div class="col col-lg-1">
          <span><strong>NAME</strong></span>
        </div>
        <div class="col col-lg-1">
          <span><strong>TYPE</strong></span>
        </div>
        <div class="col col-lg-1">
          <span><strong>USER</strong></span>
        </div>
        <div class="col col-lg-1">
          <span><strong>PRICE</strong></span>
        </div>
        <div class="col col-lg-3">
          <span><strong>DESCRIPTION</strong></span>
        </div>
        <div class="col col-lg-3">
          <span><strong>ACTIONS</strong></span>
        </div>
      </div>
      <div class="row">
      </div>
      @foreach ($services as $key => $service)
        <div class="row">
          <div class="col col-lg-1">
            <span>{{$service->id}}</span>
          </div>
          <div class="col col-lg-1">
            <span>{{$service->name}}</span>
          </div>
          <div class="col col-lg-1">
            <span>{{$service->services_type_id}}</span>
          </div>
          <div class="col col-lg-1">
            <span>{{$service->user_id}}</span>
          </div>
          <div class="col col-lg-1">
            <span>{{$service->price}}</span>
          </div>
          <div class="col col-lg-3">
            <span>{{$service->description}}</span>
          </div>
          <div class="col col-lg-1">
            <a href="{{ route('services.show', ['service' => $service->id]) }}" class="btn btn-info">show</a>
          </div>
          <div class="col col-lg-1">
            {!! Form::model($entity, array('route' => array('services.delete', $service->id),  'method' => 'DELETE') )!!}
              <button type="submit" name="delete" class="btn btn-danger">delete</button>
            {!! Form::close() !!}
          </div>
        </div>
      @endforeach

    </div>
</div>

@endsection
