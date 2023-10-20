<div class="form-container">
    <form class="form" method="GET">
        @csrf
        {{-- 入力フィールド（お名前） --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-area">
                    <input type="text" name="fullname" />
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                        </div>
                        <div class="form__input--radio">
                            <input type="radio" class="radio-input" id="all" name="gender" value="all"
                                checked />
                            <label for="all">全て</label>
                            <input type="radio" class="radio-input" id="male" name="gender" value="male" />
                            <label for="male">男性</label>
                            <input type="radio" class="radio-input" id="female" name="gender" value="female" />
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
                    <input type="text" name="email" />
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">検索</button>
            <a href="{{ route('contact.index') }}">リセット</a>
        </div>
    </form>
</div>
