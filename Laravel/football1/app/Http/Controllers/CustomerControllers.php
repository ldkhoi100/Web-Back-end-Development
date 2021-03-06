<?php

namespace App\Http\Controllers;

use App\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use Session;

class CustomerControllers extends Controller
{
    /**
     * Hiển thị danh sách khách hàng.
     */
    public function index()
    {
        $customers = Customer::all();
        //goi view va truyen du lieu sang view
        return view('customers.list', compact('customers'));
    }

    /**
     * Hiển thị Form tạo khách hàng.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form.
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->dob = request('dob');
        $customer->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $customer->save();
        return redirect()->route('customers.index')->with('success', "Tạo mới khách hàng $customer->name thành công");
    }

    /**
     * Hiển thị thông tin chi tiết khách hàng có mã định danh id.
     *
     * @param  int $id
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Hiển thị Form chỉnh sửa thông tin khách hàng.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->dob = request('dob');
        if ($request->hasFile('image')) {
            $customer->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }
        $customer->save();
        return redirect()->route('customers.index')->with('success', "Cập nhật khách hàng $customer->name thành công");
    }

    /**
     * Xóa thông tin dữ liệu khách hàng.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index')->with('success', "Xóa khách hàng $customer->name thành công");
    }
}