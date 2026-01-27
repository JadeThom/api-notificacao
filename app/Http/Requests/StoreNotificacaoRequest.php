<?php

namespace App\Http\Requests;

use App\Enums\NotificationChannel;
use App\Enums\NotificationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreNotificacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'mensagem' => ['required', 'string'],
            'canal' => ['required', new Enum(NotificationChannel::class)],
            'status' => ['nullable', new Enum(NotificationStatus::class)],
        ];
    }
}
