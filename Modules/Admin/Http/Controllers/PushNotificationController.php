<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\NotificationModel;
use Redirect;

class PushNotificationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
     
    }
    public function index(Request $request)
    {
        $notifications = NotificationModel::all();
        if ($request->ajax()) {  
        return response()->json(['notifications' => $notifications]);
    }
        return view('admin::notifications.index', compact('notifications'));
    }

    public function store(Request $request)
    {
        
        $validatedData = Validator::make($request->all(), [
        'title' => 'required|string',
        'message' => 'required|string',
        'type' => 'required|in:1,2', // Assuming 1 is "new contest" and 2 is "contest end"
        ]);

        if ($validatedData->fails()) {
        return response()->json(['message' => 'Validation failed', 'error' => $validatedData->errors()], 400);
        }

        $notification = new NotificationModel;
        $notification->title = $request->title;
        $notification->message = $request->message;
        $notification->type = $request->type;
        $notification->save();

        // Return a JSON response
        return response()->json(['success' => true,'message' => 'Notification created successfully']);
    }

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
        'title' => 'required|string',
        'message' => 'required|string',
        'type' => 'required|in:1,2', // Assuming 1 is "new contest" and 2 is "contest end"
        ]);

        if ($validatedData->fails()) {
        return response()->json(['message' => 'Validation failed', 'error' => $validatedData->errors()], 400);
        }

       $notification=NotificationModel::find($request['id']);

        if (!$notification) {
        return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->title = $request->input('title');
        $notification->message = $request->input('message');
        $notification->type = $request->input('type');
        $notification->save();

        // Return a JSON response with the updated notification data
        return response()->json([
            'success' => true,
            'message' => 'Notification updated successfully',
            'notification' => $notification, // Include the updated notification object
        ]);
    }
    public function edit($id)
    {
        $notification = NotificationModel::find($id);

        if ($notification) {
            return response()->json(['notification' => $notification]);
        }

        return response()->json(['error' => 'Notification not found.'], 404);
    }


 

      public function destroy($id)
    {
        $notification = NotificationModel::find($id);

        if ($notification) {
            $notification->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
