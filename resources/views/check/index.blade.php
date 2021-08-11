<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>確認</title>
    <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
<h2>内容確認</h2>
<form action="{{route('check.store')}}" method="POST">
    @csrf
    <input type="hidden" name="last_name" value="{{$last_name}}">
    <input type="hidden" name="first_name" value="{{$first_name}}">
    <input type="hidden" name="gender" value="{{$gender}}">
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="postcode" value="{{$postcode}}">
    <input type="hidden" name="address" value="{{$address}}">
    <input type="hidden" name="building_name" value="{{$building_name}}">
    <input type="hidden" name="opinion" value="{{$opinion}}">
    <div class="form-content fullname flex">
        <p>お名前
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$last_name}}　{{$first_name}}</p>
            </div>
    </div>
    <div class="form-content gender flex">
        <p>性別
        </p>
            <div class="flex-item2">
                @if ($gender==='1')
                    <p class="check-content">男性</p>
                @else
                    <p class="check-content">女性</p>
                @endif
            </div>
    </div>
    <div class="form-content mail flex">
        <p>メールアドレス
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$email}}</p>
            </div>
    </div>
    <div class="form-content postcode flex">
        <p>郵便番号
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$postcode}}</p>
            </div>
    </div>
    <div class="form-content adress flex">
        <p>住所
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$address}}</p>
            </div>
    </div>
    <div class="form-content bluilding flex">
        <p>建物名
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$building_name}}</p>
            </div>
    </div>
    <div class="form-content opinion  flex">
        <p>ご意見
        </p>
            <div class="flex-item2">
                <p class="check-content">{{$opinion}}</p>
            </div>
    </div>
    <div class="submit-wrap">
        <input type="submit" value="送信">
        <button type="button" onclick="history.back()">修正する</button>
    </div>
</form>
</body>
</html>
