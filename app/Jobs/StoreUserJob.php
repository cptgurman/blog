<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Mail\User\PasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = Str::random(10); // пароль теперь генерируется в контроллере, из StoreRequest его нужно убрать
        $this->data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $this->data['email']], $this->data);
        event(new Registered($user));
        // с помощью методов фасада Mail отправляем новый объект класса PasswordMail передав в его конструктор сгенерированный пароль
        Mail::to($this->data['email'])->send(new PasswordMail($password));
    }
}
