<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>お問い合わせフォーム</title>
        <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('/assets/js/jquery.zip2addr.js')}}"></script>
</head>
<body>
    <h2>お問い合わせ</h2>
    <form action="{{ route('check.post') }}" method="POST">
        @csrf
        <div class="form-content flex fullname">
            <p>お名前
                <span>※</span>
            </p>
            <div class="flex-item">
                <div class="flex-item-content">
                    <input type="text" name="last_name" value="{{old('last_name')}}">
                    <p>例）山田</p>
                    @error('last_name')
                    <div class="error-msg">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex-item-content">
                    <input type="text" name="first_name" value="{{old('first_name')}}">
                    <p>例）太郎</p>
                    @error('first_name')
                    <div class="error-msg">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-content gender flex">
            <p>性別
                <span>※</span>
            </p>
            <div class="flex-item">
                <div class="radio-button">
                    <input type="radio" name="gender" value="1" {{old('gender','1') == 1 ? 'checked' : ''}}>
                    <p>男性</p>
                </div>
                <div class="radio-button">
                    <input type="radio" name="gender" value="2"  {{old('gender') == 2 ? 'checked' : ''}}>
                    <p>女性</p>
                </div>
            </div>
        </div>
        @error('gender')
        <div class="error-msg">{{$message}}</div>
        @enderror
        <div class="form-content mail flex">
            <p>メールアドレス
                <span>※</span>
            </p>
            <div class="flex-item2">
                <input type="text" name="email" value="{{old('email')}}">
                <p>例）test@example.com</p>
            </div>
        </div>
        @error('email')
        <div class="error-msg">{{$message}}</div>
        @enderror
        <div class="form-content flex postcode">
            <p>郵便番号
                <span>※</span>
            </p>
            <div class="flex-item2">
                <div>
                    <span class="postmark">〒</span>
                    <input type="text" id="postcode" onKeyUp="$('#postcode').zip2addr('#address');" name="postcode" value="{{old('postcode')}}">
                    <p>例）123-4567</p>
                </div>
            </div>
        </div>
        @error('postcode')
        <div class="error-msg">{{$message}}</div>
        @enderror
        <div class="form-content flex adress">
            <p>住所
                <span>※</span>
            </p>
            <div class="flex-item2">
                <input type="text" id="address" name="address" value="{{old('address')}}">
                <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
            </div>
        </div>
        @error('address')
        <div class="error-msg">{{$message}}</div>
        @enderror
        <div class="form-content flex building">
            <p>建物名
            </p>
            <div class="flex-item2">
                <input type="text" name="building_name" value="{{old('building_name')}}">
                <p>例）千駄ヶ谷マンション101</p>
            </div>
        </div>
        <div class="form-content flex opinion">
            <p>ご意見
                <span>※</span>
            </p>
            <div class="flex-item2">
                <textarea name="opinion"  cols="30" rows="10" name="opinion">{{old('opinion')}}</textarea>
                @error('opinion')
                <div class="error-msg">{{$message}}</div>
                @enderror
            </div>

        </div>
        <div class="submit-wrap">
            <input type="submit" value="確認">
        </div>

    </form>
</body>
</html>
