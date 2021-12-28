<?php

namespace App\Http\Controllers;

use App\Models\BankAccountDetail;
use Exception;
use Illuminate\Http\Request;

class BankAccountDetailController extends Controller
{
    public function BankAccountDetailView()
    {
        $data['allData'] = BankAccountDetail::all(['id', 'account_number', 'qr_code_photo_path']);

        return view('admin.qr_code.view_qr_code', $data);
    }
    public function BankAccountDetailAdd()
    {
        return view('admin.qr_code.create_qr_code');
    }
    public function BankAccountDetailStore(Request $request)
    {

        $validatedData = $request->validate([
            'account_number' => 'required',
            'qr_code_photo_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $data = new BankAccountDetail();

        $data->account_number = $request->account_number;

        if ($request->file('qr_code_photo_path')) {
            $file = $request->file('qr_code_photo_path');
            @unlink(public_path('upload/qr_code_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/qr_code_images'), $filename);
            $data['qr_code_photo_path'] = $filename;
        }
        $data->save();

        $notifications = array(
            'message' => 'Bank Account Details Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('qr_code.view')
            ->with($notifications);
    }

    public function BankAccountDetailEdit($id)
    {
        $editData = BankAccountDetail::find($id);
        return view('admin.qr_code.edit_qr_code', compact('editData'));
    }

    public function BankAccountDetailUpdate(Request $request, $id)
    {
        $data = BankAccountDetail::find($id);

        $data->account_number = $request->account_number;

        if ($request->file('qr_code_photo_path')) {
            $file = $request->file('qr_code_photo_path');
            @unlink(public_path('upload/qr_code_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/qr_code_images'), $filename);
            $data['qr_code_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Bank Account Details Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('time_slot.view')->with($notification);
    }

    public function BankAccountDetailDelete($id)
    {
        $user = BankAccountDetail::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Bank Account Details Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('qr_code.view')->with($notification);
    }
}
