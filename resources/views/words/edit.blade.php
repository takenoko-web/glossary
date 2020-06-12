@extends('app')

@section('title', '用語編集')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('words.update', ['word' => $word]) }}">
                @method('PATCH')
                @include('words.form')
                <button type="submit" class="btn heavy-rain-gradient btn-block">編集する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection