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

  <div class="lgheader col-sm-10">
    <div class="lgheader-container col-sm-10">
      <a href="{{url('/sign-in/sign-up')}}" class="lgsign-up-btn"><i class="fas"></i>新規登録</a>
    </div>

    <main class="sign-up">
      <div class="container-fluid lg-wrapper">
        <h1 class="logo"><a href=""><img src="{{ asset('img/logo.png') }}" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>

        <form method="get" action="">
          <div class="form-inner">
            <div class="lgform-group col-sm-5">
              <input type="text" name="email" class="lgform-control" id="email" placeholder="メールアドレス" value="{{ old('email') }}">
            </div>
            <div class="lgform-group col-sm-5">
              
              <input type="text" name="password" class="lgform-control" id="password" placeholder="パスワード" value="{{ old('password') }}">
            </div>
            <div class="lgform-group col-sm-5">
              <button type="submit" value="送信" class="lg-btn"><i class="fas fa-plus"></i>ログイン</button>
            </div>
          </div>
        </form>
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