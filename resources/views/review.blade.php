@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
    <!-- Секция заголовка страницы отзывов -->
    <section class="py-5 text-center container">
        <h1 class="h3 mb-3 fw-normal">Напишите свой отзыв!</h1>  
    </section>

    <!-- Секция вывода ошибок валидации -->
    <section class="py-5 text-start container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif      
    </section>

    <!-- Секция формы для отправки отзыва -->
    <section class="py-5 text-center container">
        <form method="post" action="/review/check"> <!-- Форма отправки отзыва -->
            @csrf <!-- Защита CSRF -->
            <div class="form-floating">
                <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control">
                <label for="floatingPassword">Введите отзыв</label>
            </div><br>
            <div class="form-floating">
                <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
                <label for="floatingPassword">Введите сообщение</label>
            </div><br>
            <div class="form-floating">
                <button type="submit" class="btn btn-primary w-100 py-2"> Отправить </button>
            </div><br>
        </form>
    </section>
@endsection
