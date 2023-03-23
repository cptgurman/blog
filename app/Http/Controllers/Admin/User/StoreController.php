<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated(); //данные пришедшие в случае успешной валидации
        StoreUserJob::dispatch($data); //Передаем в очередь задание
        return redirect()->route('admin.user.index');
    }
}
