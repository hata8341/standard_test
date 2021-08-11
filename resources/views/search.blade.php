<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理システム</title>
    <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{asset('/assets/js/main.js')}}"></script>
</head>
<body>
<h2>管理システム</h2>
<div class="master_page-wrap">
    <form action="{{route('search')}}" method="get">
    @csrf
    <div class="fullname-gender">
        <div class="form-content fullname flex">
        <p>お名前
        </p>
        <div class="flex-item2">
        <input type="text" name="fullname" value="{{old('fullname')}}">
        </div>
        </div>
        <div class="form-content gender flex gender">
        <p>性別
        </p>
        <div class="flex-item">
            <div class="radio-button">
                <input type="radio" name="gender" value="" {{old('gender','') == '' ? 'checked' : ''}}>
                <p>全て</p>
            </div>
            <div class="radio-button">
                <input type="radio" name="gender" value="1" {{old('gender') == 1 ? 'checked' : ''}}>
                <p>男性</p>
            </div>
            <div class="radio-button">
                <input type="radio" name="gender" value="2"  {{old('gender') == 2 ? 'checked' : ''}}>
                <p>女性</p>
            </div>
        </div>
    </div>
    </div>
    <div class="form-content flex register">
        <p>登録日
        </p>
        <div class="flex-item master-flex-item">
            <div class="flex-item-content">
                <input type="date" name="created_at_start" value="{{old('created_at_start')}}">
            </div>
            <div class="master-span">
                <span>~</span>
            </div>
            <div class="flex-item-content">
                <input type="date" name="created_at_end" value="{{old('created_at_end')}}">
            </div>
        </div>
    </div>
    <div class="form-content email flex">
        <p>メールアドレス
        </p>
            <div class="flex-item2">
                <input type="text" name="email" value="{{old('email')}}">
            </div>
    </div>
    <div class="submit-wrap">
        <input type="submit" value="検索">
        <form action="{{route('search.index')}}" method="get">
            @csrf
            <button>リセット</button>
        </form>
    </div>
</form>
<div class="pagenate-wrap">
    {!! $query_lists->appends(['fullname'=>$fullname,'gender'=>$gender,'created_at_start' => $created_at_start,'created_at_end' => $created_at_end,'email'=>$email])->render() !!}
    {{$query_lists->links('vendor.pagination.tailwind')}}
    {{$query_lists->links('vendor.pagination.default')}}
</div>

<div class="result-wrap">
    <table>
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>ご意見</th>
        </tr>
        @foreach ($query_lists as $query_list)
            <tr>
                <td>
                    {{$query_list->id}}
                </td>
                <td>
                    {{$query_list->fullname}}
                </td>
                <td>
                    @if ($query_list->gender==1)
                    男性
                @else
                    女性
                @endif
                </td>
                <td>
                    {{$query_list->email}}
                </td>
                <td class="opinion">
                    {{Str::limit($query_list->opinion,45,'...')}}
                    <span class="opinion-out">{{Str::substr($query_list->opinion,25)}}</span>
                </td>
            <td>
                <form class="delete-button" action="{{ route('search.delete',['id'=>$query_list->id]) }}" method="post">
                    @csrf
                    <button class="delete-btn">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</body>
</html>
