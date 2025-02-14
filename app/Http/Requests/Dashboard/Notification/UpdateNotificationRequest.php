<?php

namespace App\Http\Requests\Dashboard\Notification;

use App\Models\Email;
use App\Models\MailNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $notification = array_reverse(explode('/',$request->path()))[0];
        return MailNotification::where('id',$notification)->where('user_id',Auth::id())->first() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ["required", "string",'max:255'],
            'body' => ['required','string'],
            'published_at' => ['required','integer']
        ];
    }
}
