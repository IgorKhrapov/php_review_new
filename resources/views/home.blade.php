@extends('layout')

@section('title')Главная страница@endsection

@section('main_content')
    <!-- Секция с заголовком и приветствием -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Отзывы студентов</h1>
                <p class="lead text-body-secondary">Здесь собраны все отзывы от наших студентов. Наслаждайтесь!</p>
                
                <!-- Отображение приветствия для каждого пользователя -->
                @foreach ($users as $el)
                    <h3> Добрый день, {{ $el->name }} {{ $el->Surname }}! </h3>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Секция с отзывами -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($reviews as $el)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h3> {{ $el->subject }} </h3><br>
                                
                                <!-- Отображение информации о пользователе, оставившем отзыв -->
                                <b> {{ $el->user['name'] }} {{ $el->user['Surname'] }} </b><br>
                                <b> Почта: {{ $el->user['email'] }} </b>
                                
                                <!-- Отображение текста отзыва -->
                                <p> {{ $el->message }} </p>
                                
                                <!-- Кнопка "Нравится" и информация о времени -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Нравится</button>
                                    </div>
                                    <small class="text-body-secondary">9 минут назад</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
