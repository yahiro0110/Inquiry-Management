@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>内容確認</h2>
        </div>
        <form class="form" action="{{ route('contact.store') }}" method="POST">
            @csrf
            {{-- 表示フィールド（お名前） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <p>{{ $contact['first_name'] . ' ' . $contact['last_name'] }}</p>
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（性別） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        @if ($contact['gender'] == 'male')
                            <p>男性</p>
                        @else
                            <p>女性</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（メールアドレス） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <p>{{ $contact['email'] }}</p>
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（郵便番号） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">郵便番号</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <p>{{ $contact['postal'] }}</p>
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（住所） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <p>{{ $contact['address'] }}</p>
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（建物名） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <p>{{ $contact['building_name'] }}</p>
                    </div>
                </div>
            </div>
            {{-- 表示フィールド（ご意見） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">ご意見</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <p>{{ $contact['opinion'] }}</p>
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
                <a href="{{ route('contact.back') }}">修正する</a>
            </div>
        </form>
    </div>
@endsection
