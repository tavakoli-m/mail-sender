<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Email\StoreEmailRequest;
use App\Http\Requests\Dashboard\Email\UpdateEmailRequest;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = Email::where('user_id',Auth::id())->paginate(10);

        return view('admin.email.index',compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.email.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmailRequest $request)
    {
        $input = $request->validated();

        $input['user_id'] = Auth::id();

        $email = Email::firstOrCreate($input);

        return to_route('dashboard.email.index')->with('success','Email created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        $email->user_id !== Auth::id() ? abort(404) : true;
        return view('admin.email.edit',compact('email'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailRequest $request, Email $email)
    {
        $input = $request->validated();

        $emailExists = Email::where('email',$input['email'])->where('user_id',Auth::id())->first();

        if($emailExists){
            $email->delete();
        }

        $email->update($input);

        return to_route('dashboard.email.index')->with('success','Email updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $result = $email->delete();

        return back()->with('success','Email deleted successfully');
    }
}
