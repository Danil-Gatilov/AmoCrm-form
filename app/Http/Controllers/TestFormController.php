<?php

namespace App\Http\Controllers;

use App\Handler\TestForm\TestFormHandler;
use App\Rules\ValidatePhone\PhoneNumber;
use App\Service\SessionTimeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestFormController extends Controller
{
    public function index(Request $request, TestFormHandler $handler, SessionTimeService $service): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', new PhoneNumber()],
            'price' => ['required', 'numeric']
        ]);
        $data['flag'] = $service->checkSessionTime($request->session_time);

        try {
            $handler->handle($data);
        } catch (\Throwable $t) {
            return back()->with('error', 'Ошибка: ' . $t->getMessage() . PHP_EOL . 'Код ошибки: ' . $t->getCode());
        }

        return back()->with('success', 'Ваша заявка была добавлена');

    }


}
