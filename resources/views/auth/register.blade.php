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

<x-guest-layout>
    @csrf
        <main class="sign-up">
            <div class="container-fluid wrapper">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            
                <section class="container-fluid contents-area">
                <h2>ユーザー登録</h2>
                <form action="{{ url('register') }}"  method="post">
                <div class="form-inner">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    <div class="row" style="display: contents;">
                    @csrf 
                        <div class="form-group col-sm-5">
                            <x-input-label for="name" :value="__('名前')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group col-sm-5">
                            <x-input-label for="email" :value="__('メールアドレス')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group col-sm-5">
                            <x-input-label for="password" :value="__('パスワード')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="form-group col-sm-5">
                            <label>役割</label><br>
                            <input type="radio" id="student" name="role" value="student" onclick="toggleFields()">
                            <label for="student">生徒</label>
                            <input type="radio" id="mentor" name="role" value="mentor" onclick="toggleFields()">
                            <label for="mentor">メンター</label>
                        </div>

                            <div id="displayArea">
                                <div id="studentFields" class="message" style="display: none;">
                                <div class="form-group col-sm-5">
                                    <x-input-label for="learning_language" :value="__('プログラミング言語')" />
                                    <x-text-input id="learning_language" class="block mt-1 w-full" type="text" name="learning_language" :value="old('learning_language')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('learning_language')" class="mt-2" />
                                </div>
                                <div class="form-group col-sm-5">
                                    <label>経験レベル</label>
                                    <select class="form-control control-widthl form-control" id="experience_level" name="experience_level">
                                        <option name="experience_level" value="" {{ old('experience_level') == '' ? 'selected' : '' }}>---</option>
                                        <option name="experience_level" value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>beginner</option>
                                        <option name="experience_level" value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>intermediate</option>
                                        <option name="experience_level" value="advanced" {{ old('experience_level') == 'advanced' ? 'selected' : '' }}>advanced</option>
                                    </select>
                                </div>
                            </div>
        
                            <div id="mentorFields" class="message" style="display: none;">
                                <div class="form-group col-sm-5">
                                    <label>プログラミング言語</label>
                                    <input type="teaching_languages" name="teaching_languages" class="form-control" placeholder="PHP" value="{{ old('teaching_languages') }}">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label>経験年数</label>
                                    <input type="experience_years" name="experience_years" class="form-control" placeholder="1" value="{{ old('experience_years') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"  value="送信" class="form-btn">登録する</button>
                </form>

    @section('scripts')
    <script>
    function toggleFields() {
        var studentFields = document.getElementById('studentFields');
        var mentorFields = document.getElementById('mentorFields');
        var studentRadio = document.getElementById('student');
        var mentorRadio = document.getElementById('mentor');

        if (studentRadio.checked) {
            studentFields.style.display = 'block';
            mentorFields.style.display = 'none';
        } else if (mentorRadio.checked) {
            mentorFields.style.display = 'block';
            studentFields.style.display = 'none';
        }
    }
    </script>
</x-guest-layout>
