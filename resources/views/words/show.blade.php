@extends('app')

@section('title', '用語詳細')

@section('content')
  @include('nav')
  <div class="container">
    @include('words.card')
  </div>
@endsection