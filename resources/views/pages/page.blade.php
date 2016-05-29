@extends('app')

@section('metaTitle', $page['title'])
@section('metaKeywords', $page['keywords'])
@section('metaDescription', $page['description'])

@section('content')

    <h1><?=$page['title']?></h1>

    <div class="page">
        <?=$page['text']?>
    </div>

@stop
