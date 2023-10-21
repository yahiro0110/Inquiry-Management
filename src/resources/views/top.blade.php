@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
    <div class="top__content">
        <div class="top__heading">
            <h2>お問い合わせ管理システム</h2>
        </div>
        <div class="top__button">
            <a href="{{ route('contact.index') }}">お問い合わせ一覧</a>
        </div>
        <div class="top__button">
            <a href="{{ route('contact.create') }}">お問い合わせ入力フォーム</a>
        </div>
    </div>
@endsection
