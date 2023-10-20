<div class="form-container">
    <form class="form" action="{{ route('contact.post') }}" method="GET">
        @csrf
        {{-- 入力フィールド（お名前） --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-area">
                    <input type="text" name="first_name" />
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                        </div>
                        <div class="form__input--radio">
                            <input type="radio" class="radio-input" id="male" name="gender" value="male"
                                {{ old('gender') == 'male' ? 'checked' : '' }} checked />
                            <label for="male">全て</label>
                            <input type="radio" class="radio-input" id="male" name="gender" value="male"
                                {{ old('gender') == 'male' ? 'checked' : '' }} />
                            <label for="male">男性</label>
                            <input type="radio" class="radio-input" id="female" name="gender" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }} />
                            <label for="female">女性</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 入力フィールド（登録日） --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">登録日</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-date">
                    <input type="date" name="first_date" />
                    <span>~</span>
                    <input type="date" name="last_date" />
                </div>
            </div>
        </div>
        {{-- 入力フィールド（メールアドレス） --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" id="email" name="email" />
                </div>
            </div>
        </div>
        <div class="form__button">
            <button id="submitButton" class="form__button-submit" type="submit">検索</button>
            <a href="{{ route('contact.back') }}">リセット</a>
        </div>
    </form>
</div>
