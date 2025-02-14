<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Notification\StoreNotificationRequest;
use App\Http\Requests\Dashboard\Notification\UpdateNotificationRequest;
use App\Models\MailNotification;
use Database\Seeders\MailNotificationSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = MailNotification::where('user_id',Auth::id())->paginate(10);

        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notification.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        $inputs = $request->validated();
        $inputs['status'] = 0;
        $inputs['user_id'] = Auth::id();

        $inputs['published_at'] = substr($request['published_at'],0,10);
        $inputs['published_at'] = date('Y-m-d H:i:s',$inputs['published_at']);

        $notificaton = MailNotification::create($inputs);

        return to_route('dashboard.notification.index')->with('success','Email Notification created successfully');
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
    public function edit(MailNotification $mailNotification)
    {
        $mailNotification->user_id !== Auth::id() ? abort(404) : true;

        return view('admin.notification.edit',compact('mailNotification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, MailNotification $mailNotification)
    {
        $inputs = $request->validated();

        $inputs['published_at'] = substr($request['published_at'],0,10);
        $inputs['published_at'] = date('Y-m-d H:i:s',$inputs['published_at']);

        $mailNotification->update($inputs);

        return to_route('dashboard.notification.index')->with('success','Email Notification Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailNotification $mailNotification)
    {
        $result = $mailNotification->delete();

        return to_route('dashboard.notification.index')->with('success','Email Notification Deleted successfully');

    }
}
