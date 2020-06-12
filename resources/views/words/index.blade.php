@extends('app')

@section('title','用語一覧')

@section('content')

@include('nav')

<div class="container">
    <div class="row">
        <div class="mx-auto col col-12 ">
            <div class="card mt-3">
                <div class="card-body text-center">
                    <div class="card-text">
                        <form action="{{ route('words.search') }}" method="get" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                            <search-form
                            endpoint="{{ route('words.autocomplete') }}">
                            </search-form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($words as $word)
        @include('words.card')
    @endforeach
    <div class="mt-2 float-right">
        {{ $words->links() }}
    </div>
</div>

@endsection