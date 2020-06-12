@extends('app')

@section('title', '用語登録')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('words.store') }}">
                @include('words.form')
                <button type="submit" class="btn heavy-rain-gradient btn-block">登録する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection