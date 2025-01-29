<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function index()
  {
    $notifications = Notification::orderBy('created_at', 'desc')->get();
    return view('admin.notifications.index', get_defined_vars());
  }

  public function create()
  {

  }
  public function store(Request $request)
  {

  }
  public function edit($id)
  {

  }
  public function update(Request $request, $id)
  {

  }
  public function show(Notification $notification)
  {
    // dd($notification);
    $notification->is_read = true;
    $notification->save();
    return redirect()->route('customers.show', $notification->customer_id);
  }
  public function destroy(Notification $notification)
  {
    $notification->delete();
    return redirect()->back()->with('success', 'Notification deleted successfully.');
  }

  public function readAll()
  {
    Notification::where('is_read', false)->update(['is_read' => true]);
    return redirect()->back()->with('success', 'All notifications marked as read.');
  }

  public function deleteMultiple(Request $request)
  {
    try {
      $ids = $request->ids;
      if (!$ids) {
        return response()->json(['success' => false, 'message' => 'No notifications selected.'], 400);
      }

      Notification::whereIn('id', $ids)->delete();

      return response()->json(['success' => true, 'message' => 'Selected notifications deleted successfully.']);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => 'Error deleting notifications.'], 500);
    }
  }
}
