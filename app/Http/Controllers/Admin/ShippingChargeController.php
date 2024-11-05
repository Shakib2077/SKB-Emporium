<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingChargeModel;
use Auth;

class ShippingChargeController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ShippingChargeModel::getRecord();
        $data['header_title'] = 'Shipping Charge';
        return view('admin.shippingcharge.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Shipping Charge';
        return view('admin.shippingcharge.add', $data);
    }

    public function insert(Request $request)
    {
        $shippingcharge = new ShippingChargeModel;
        $shippingcharge->name = trim($request->name);
        $shippingcharge->price = trim($request->price);
        $shippingcharge->status = trim($request->status);
        $shippingcharge->save();

        return redirect('admin/shippingcharge/list')->with('success', "Shipping Charge Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ShippingChargeModel::getSingle($id);
        $data['header_title'] = 'Edit Shipping Charge';
        return view('admin.shippingcharge.edit', $data);
    }

    public function update($id, Request $request)
    {

        $shippingcharge = ShippingChargeModel::getSingle($id);
        $shippingcharge->name = trim($request->name);
        $shippingcharge->price = trim($request->price);
        $shippingcharge->status = trim($request->status);
        $shippingcharge->save();

        return redirect('admin/shippingcharge/list')->with('success', "Shipping Charge Successfully Updated");
    }

    public function delete($id)
    {
        $shippingcharge = ShippingChargeModel::getSingle($id);
        $shippingcharge->is_delete = 1;
        $shippingcharge->save();

        return redirect()->back()->with('success', "Shipping Charge Successfully Deleted");
    }
}
