@extends('layout')

@section('title')О нас@endsection

@section('main_content')
    <!-- Секция с информацией о странице -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Отзывы студентов</h1>
                <p class="lead text-body-secondary">Здесь каждый студент вуза РТУ МИРЭА может оставить отзыв о своей учебе, деятельности преподавателей или просто поделиться интересным фактом!</p>
                
                <!-- Кнопки для написания отзыва и возврата на главную -->
                <p>
                    <a href="/review" class="btn btn-primary my-2">Написать отзыв</a>
                    <a href="/home" class="btn btn-secondary my-2">Вернуться на главную</a>
                </p>
            </div>
        </div>
    </section>
@endsection
