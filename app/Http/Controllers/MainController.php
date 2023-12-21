<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Метод для отображения страницы входа
    public function enter() {
        if (auth::check()){
            return view('enter'); // Если пользователь уже авторизован, показываем страницу входа
        }
        
        return view('enter'); // Иначе также показываем страницу входа
    }

    // Метод для проверки данных при входе
    public function enter_check(Request $request) {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'password' => 'required|min:8|max:100',
        ]);

        $fromFields = $request->only(['email', 'password']);

        if (auth::attempt($valid)) {
            return redirect()->route('home'); // При успешной авторизации перенаправляем на домашнюю страницу
        }

        return redirect(route('enter'))->withErrors ([
            'email' => 'Не удалось авторизоваться' // Если не удалось авторизоваться, возвращаем на страницу входа с ошибкой
        ]);
    }

    // Метод для отображения страницы регистрации
    public function register() {
        return view('register');
    }

    // Метод для проверки данных при регистрации
    public function register_check(Request $request) {
        $validateFields = $request->validate([
            'name' => 'required|min:4|max:100',
            'surname' => 'required|min:4|max:100',
            'email' => 'required|min:4|max:100',
            'password' => 'required|min:8|max:100',
        ]);

        $user = User::create( $validateFields); // Создание нового пользователя

        return redirect()->route('enter'); // Перенаправление на страницу входа после успешной регистрации
    }

    // Метод для отображения домашней страницы
    public function home() {
        $home = new Contact();
        $user = new User();

        return view('home', ['users' => $user->all()], ['reviews' => $home->all()]);
    }

    // Метод для отображения страницы "О нас"
    public function about() {
        return view('about');
    }

    // Метод для отображения страницы отзывов
    public function review() {
        $review = new Contact();
        return view('review', ['reviews' => $review->all()]);
    }

    // Метод для проверки данных при отправке отзыва
    public function review_check(Request $request, User $user) {
        $valid = $request->validate([
            'subject' => 'required|min:4|max:100',
            //'message' => 'required|min:15|max:500',
        ]);

        $review = new Contact();

        $review->subject = $request->input('subject');
        $review->message = $request->input('message');
        $review->user_id = $user = Auth::user()->id;

        $review->save();

        return redirect()->route('review'); // Перенаправление на страницу отзывов после сохранения отзыва
    }
}
