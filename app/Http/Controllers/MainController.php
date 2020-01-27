<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Events\FeedbackEvent;

class MainController extends Controller
{
    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'activeMenu' => 'feedback',
        ]);
    }

    public function feedbackPost(FeedbackRequest $request)
    {
        event(new FeedbackEvent($request->all()));

        return view('layouts.primary', [
            'page' => 'parts.blank',
            'title' => 'Сообщение отправлено!',
            'content' => 'Спасибо за ваше сообщение!',
            'link' => '<a href="/">Вернуться на главную</a>',
            'activeMenu' => 'feedback',
        ]);
    }
}
