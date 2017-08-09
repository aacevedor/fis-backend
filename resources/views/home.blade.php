@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (session('status'))
        <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('error') }}
        </div>
      @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

    </div>
    <div class="row">
      <!-- let people make clients -->
        <passport-clients></passport-clients>

        <!-- list of clients people have authorized to access our account -->
        <passport-authorized-clients></passport-authorized-clients>

        <!-- make it simple to generate a token right in the UI to play with -->
        <passport-personal-access-tokens></passport-personal-access-tokens>
      </div>
    </div>
</div>

@endsection
