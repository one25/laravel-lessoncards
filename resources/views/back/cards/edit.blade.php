@extends('back.cards.template')

@section('form-open')
    <form method="post" action="{{ route('update', [$card->id]) }}">
                     {{ csrf_field() }}
                  {{ method_field('PUT') }}   
@endsection
