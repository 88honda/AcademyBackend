<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ESA ACADEMY 生徒管理システム</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
<div class="row">

  <div class="col-sm-2 sidebar">
    <h1 class="logo"><a href="{{url('/mentor')}}"><img src="{{ asset('img/logo.png') }}" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>
    <nav>
      <ul>
        @if(auth()->user() && auth()->user()->role === 'admin')
          <li><a href="{{url('/student')}}" class="student-btn"><i class="fas"></i>生徒一覧</a></li>
        @endif
        <li><a href="{{url('/mentor')}}" class="mentor-btn"><i class="fas"></i>メンター一覧</a></li>
        <li><a href="{{url('/mentor/tag/create')}}" class="tag-btn"><i class="fas"></i>タグ登録</a></li>
        <li><a href="{{url('/mentor')}}" class="top-page-btn"><i class="fas fa-home"></i>トップページ</a></li>
        <form action="{{ route('logout') }}" method="POST" class="fas">
          @csrf
          <button type="submit" class="" style="border: none; background: none; color: #fff; margin-top: 20px; font-weight:bold;">ログアウト</button>
        </form>
      </ul>
    </nav>
  </div>

  <div class="r-column col-sm-10">
    <div class="header col-sm-10">
      @if (Auth::user()->role === 'admin')
      <div>
        <a href="{{url('/mentor/sign-up')}}" class="sign-up-btn"><i class="fas fa-plus"></i>新規登録画面</a>
      </div>
      @endif
      <form action="{{ route('mentor') }}" method="get">
        <botton class="input-btn col-sm-4" type="submit">
            <input type="text" placeholder="NAME検索" name="keyword" value="{{ old('keyword', $keyword) }}">
            <i action="{{ route('mentor') }}" class="fas fa-search"></i>
        </botton>
      </form>
    </div>

    <main class="student-list">
      <div class="container-fluid wrapper">
        <h4 class="screen-title">メンター一覧</h4>
        <p class="result">15件</p>
        <section class="container-fluid contents-area">
          <table class="table">
            <thead>
              <tr>
                <th>名前</th>
                <th>email</th>
                <th>プログラミング言語</th>
                <th>経験年数</th>
              </tr>
            </thead>
            <tbody>
              @if(session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
              @endif
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{ $user->tags->pluck('name')->implode(', ') }} </td>
                  <td>{{$user->mentor->experience_years}}</td>
                  <td>
                    @if (Auth::user()->role === 'admin')
                      <form action="{{ route('mentor.edit', ['id' => $user->detail_id]) }}" method="get" style="display: inline;">
                        <button type="submit" class="tb-btn tb-btn-edit">編集</button>
                      </form>
                      <form action="{{ route('mentor.delete', ['id' => $user->detail_id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="tb-btn tb-btn-del">削除</button>
                      </form>
                    @endif
                    <a href="{{ route('mentor.reservation', $user->mentor->id) }}">
                      <button class="tb-btn tb-btn-edit" method="get">詳細</button>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </section>
        <!-- /.container-fluid .contents-area -->
        <nav class="pager">
          <ul class="pagination justify-content-center">
            <li class="page-item active">
              <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item">
              <a class="pager-next" href="#"><i class="fas fa-angle-right"></i></a>
            </li>
          </ul>
        </nav>
        <!-- /.pager -->
      </div>
      <!-- /.container-fluid .wrapper-->
    </main>
  </div>
  <!-- /.r-column .col-sm-10 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
@section('scripts')
<script>
$(function(){
            $(".tb-btn-del").click(function(){
                if(confirm("本当に削除しますか？")){
                    }else {
                return false;
                }
            });
        });
</script>
</body>
</html>