<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function PricingView()
    {
        $data['allData'] = Pricing::all(['id', 'pricing', 'time', 'type']);
        return view('admin.pricing.view_pricing', $data);
    }
    public function PricingAdd()
    {
        return view('admin.pricing.create_pricing');
    }
    public function PricingStore(Request $request)
    {
        $validatedData = $request->validate([
            'pricing' => 'required',
            'time' => 'required',
            'type' => 'required',
        ]);
        $data = new Pricing();
        $data->pricing = $request->pricing;
        $data->time = $request->time;
        $data->type = $request->type;
        $data->save();

        $notifications = array(
            'message' => 'Pricing created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('pricing.view')
            ->with($notifications);
    }

    public function PricingEdit($id)
    {
        $editData = Pricing::find($id);
        return view('admin.pricing.edit_pricing', compact('editData'));
    }

    public function PricingUpdate(Request $request, $id)
    {
        $data = Pricing::find($id);
        $data->pricing = $request->pricing;
        $data->time = $request->time;
        $data->type = $request->type;
        $data->save();

        $notification = array(
            'message' => 'Pricing Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('pricing.view')->with($notification);
    }



    public function PricingDelete($id)
    {
        $user = Pricing::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Pricing Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('pricing.view')->with($notification);
    }
}
