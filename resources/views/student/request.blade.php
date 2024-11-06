<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約登録画面 | ESA ACADEMY 生徒管理システム</title>
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
    <h1 class="logo"><a href="{{url('/student')}}"><img src="{{ asset('img/logo.png') }}" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>
    <nav>
      <ul>
        <li><a href="{{url('/student')}}" class="student-btn"><i class="fas"></i>生徒一覧</a></li>
        @if(auth()->user() && auth()->user()->role === 'admin')
        <li><a href="{{url('/mentor')}}" class="mentor-btn"><i class="fas"></i>メンター一覧</a></li>
        @endif
        <li><a href="{{url('/student/reservation')}}" class="mentor-btn"><i class="fas"></i>予約枠登録一覧</a></li>
        <li><a href="{{url('/student')}}" class="top-page-btn"><i class="fas fa-home"></i>トップページ</a></li>
        <form action="{{ route('logout') }}" method="POST" class="fas">
          @csrf
          <button type="submit" class="" style="border: none; background: none; color: #fff; margin-top: 20px; font-weight:bold;">ログアウト</button>
        </form>
      </ul>
    </nav>
  </div>
  <!-- /.col-sm-2 .sidebar -->

  <div class="r-column col-sm-10">

    <main class="sign-up">
      <div class="container-fluid wrapper">
        <section class="container-fluid contents-area">
          @if(isset($editMode) && $editMode)
              <h2>編集登録画面</h2>
          @else
              <h2>予約枠登録画面</h2>
          @endif
          <!-- 編集登録画面 -->
          @if(isset($editMode) && $editMode)
          <form method="post" action="{{ route('reservation.update', ['id' => $timeslots->id]) }}">
            @csrf
            <div class="form-inner">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="start_time">予約開始時間</label>
                  <div>{{ $errors->first('message') }}</div>
                  <input type="text" name="start_time" class="form-control" id="start_time" placeholder="yyyy/mm/dd 00:00" value="{{ \Carbon\Carbon::parse(old('start_time', $timeslots->start_time))->format('Y/m/d H:i') }}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="end_time">予約終了時間</label>
                  <div>{{ $errors->first('message') }}</div>
                  <input type="text" name="end_time" class="form-control" id="end_time" placeholder="yyyy/mm/dd 00:00" value="{{ \Carbon\Carbon::parse(old('end_time', $timeslots->end_time))->format('Y/m/d H:i') }}">
                </div> 
              </div>
              <!-- /.row -->
          </div>
          <!-- /.form-inner -->

          <div class="form-btn-wrap">
            
            @if(isset($editMode) && $editMode)
              <button type="submit" value="送信" class="form-btn"><i class="fas fa-plus"></i>編集登録</button>
            @else
              <button type="submit" value="送信" class="form-btn"><i class="fas fa-plus"></i>新規登録</button>
            @endif
            
          </div>

          </form>
          @else
          <!-- 予約枠登録申請 -->
          <form action="{{ url('/student/request/add') }}" method="post">
            @csrf
            <div class="form-inner">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="start_time">予約開始時間</label>
                  <input type="text" name="start_time" class="form-control" id="start_time" placeholder="yyyy/mm/dd 00:00" value="{{(old('start_time'))}}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="end_time">予約終了時間</label>
                  <input type="text" name="end_time" class="form-control" id="end_time" placeholder="yyyy/mm/dd 00:00" value="{{(old('end_time'))}}">
                </div>
              </div>
              <!-- /.row -->
          </div>
          <!-- /.form-inner -->

          <div class="form-btn-wrap">
            @if(isset($editMode) && $editMode)
              <button type="submit" value="送信" class="form-btn"><i class="fas fa-plus"></i>編集登録</button>
            @else
              <button type="submit" value="送信" class="form-btn"><i class="fas fa-plus"></i>新規登録</button>
            @endif
          </div>
          </form>
          @endif
        </section>
        <!-- /.container-fluid .contents-area -->

      </div>
      <!-- /.container-fluid .wrapper-->
    </main>

  </div>
  <!-- /.r-column .col-sm-10 -->


</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

</body>
</html>