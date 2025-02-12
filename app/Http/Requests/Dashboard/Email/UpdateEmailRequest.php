<?php

namespace App\Http\Requests\Dashboard\Email;

use App\Models\Email;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $email_id = array_reverse(explode('/',$request->path()))[0];
        return Email::where('id',$email_id)->where('user_id',Auth::id())->first() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email','min:1','max:255'],
        ];
    }
}
