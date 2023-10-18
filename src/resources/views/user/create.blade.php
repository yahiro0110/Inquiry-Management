@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>
        <form class="form" action="{{ route('contact.confirm') }}" method="POST">
            @csrf
            {{-- 入力フィールド（お名前） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--name">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" />
                        <input type="text" name="last_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__input--name">
                        <label for="first_name">例）山田</label>
                        <label for="last_name">例）太郎</label>
                    </div>
                    <div class="form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- ラジオボタンフィールド（性別） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <input type="radio" class="radio-input" id="male" name="gender" value="male"
                            {{ old('gender') == 'male' ? 'checked' : '' }} />
                        <label for="male">男性</label>
                        <input type="radio" class="radio-input" id="female" name="gender" value="female"
                            {{ old('gender') == 'female' ? 'checked' : '' }} />
                        <label for="female">女性</label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- 入力フィールド（メールアドレス） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form__input--text">
                        <label for="email">例）test@example.com</label>
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- 入力フィールド（郵便番号） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content--postal">
                    <div class="form__input--postal">
                        <span for="postal">〒</span>
                    </div>
                    <div class="form__input--postal">
                        <div class="form__input--postal">
                            <input type="text" name="postal" size="8" maxlength="8"
                                value="{{ old('postal') }}" />
                        </div>
                        <div class="form__input--postal">
                            <label for="postal">例）123-4567</label>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('postal')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- 入力フィールド（住所） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" value="{{ old('address') }}" />
                    </div>
                    <div class="form__input--text">
                        <label for="address">例）東京都渋谷区千駄ヶ谷1-2-3</label>
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- 入力フィールド（建物名） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building_name" value="{{ old('building_name') }}" />
                    </div>
                    <div class="form__input--text">
                        <label for="building_name">例）千駄ヶ谷マンション101</label>
                    </div>
                    <div class="form__error">
                        @error('building_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- 入力フィールド（ご意見） --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="opinion">{{ old('opinion') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('opinion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>
    </div>
@endsection
