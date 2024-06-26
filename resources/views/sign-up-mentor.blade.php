<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録画面 | ESA ACADEMY 生徒管理システム</title>
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
    <h1 class="logo"><a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>
    <nav>
      <ul>
        {{-- <li>
          @if(isset($editMode) && $editMode)
            <a href="{{url('/sign-up')}}" class="sign-up-btn"><i class="fas fa-plus"></i>編集登録画面</a>
          @else
            <a href="{{url('/sign-up')}}" class="sign-up-btn"><i class="fas fa-plus"></i>新規登録画面</a>
          @endif
        </li> --}}
        <li><a href="{{url('/')}}" class="student-btn"><i class="fas"></i>生徒画面</a></li>
        <li><a href="{{url('/mentor')}}" class="mentor-btn"><i class="fas"></i>メンター画面</a></li>
        <li><a href="{{url('/')}}" class="top-page-btn"><i class="fas fa-home"></i>トップページ</a></li>
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
              <h2>新規登録画面（メンター）</h2>
          @endif

          @if(isset($editMode) && $editMode)
          <form method="post" action="{{ route('update', ['id' => $students->id]) }}">
            @csrf
            <div class="form-inner">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="name">名前</label>
                  <div>{{ $errors->first('message') }}</div>
                  <input type="text" name="name" class="form-control" id="name" placeholder="田中太郎" value="{{(old('name', $students->name))}}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="teaching_languages">プログラミング言語</label>
                  <input type="text" name="teaching_languages" class="form-control" id="teaching_languages" placeholder="PHP" value="{{(old('teaching_languages', $students->teaching_languages))}}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="experience_years">経験年数</label>
                  <input type="text" name="experience_years" class="form-control" id="experience_years" placeholder="1" value="{{(old('experience_years', $students->experience_years))}}">
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
          <form action="{{ url('/sign-up/add') }}" method="post">
            @csrf
            <div class="form-inner">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="name">名前</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="田中太郎" value="{{(old('name'))}}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="teaching_languages">プログラミング言語</label>
                  <input type="text" name="teaching_languages" class="form-control" id="teaching_languages" placeholder="PHP" value="{{(old('teaching_languages'))}}">
                </div>
                <div class="form-group col-sm-5">
                  <label for="experience_years">経験年数</label>
                  <input type="text" name="experience_years" class="form-control" id="experience_years" placeholder="1" value="{{(old('experience_years'))}}">
                </div>
                {{-- <div class="form-group col-sm-5">
                  <label for="experience_years">経験年数</label>
                  <select class="form-control" id="experience_years" name="experience_years">
                    <option name="experience_years" value="" {{ old('experience_years') == '' ? 'selected' : '' }}>---</option>
                    <option name="experience_years" value="1" {{ old('experience_years') == 'beginner' ? 'selected' : '' }}>beginner</option>
                    <option name="experience_years" value="intermediate" {{ old('experience_years') == 'intermediate' ? 'selected' : '' }}>intermediate</option>
                    <option name="experience_years" value="advanced" {{ old('experience_years') == 'advanced' ? 'selected' : '' }}>advanced</option>
                  </select>
                </div> --}}
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