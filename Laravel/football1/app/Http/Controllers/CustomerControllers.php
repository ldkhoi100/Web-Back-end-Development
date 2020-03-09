<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerControllers extends Controller
{
    /**
     * Hiển thị danh sách khách hàng.
     */
    public function index()
    {
        //Tạo mảng khách hàng
        $customers = [
            '0' => [
                'id'  => 1,
                'name' => 'customer1',
                'bod' => '1998-09-01',
                'email' => 'customer1@gmail.com'
            ],

            '1' => [
                'id'  => 2,
                'name' => 'customer2',
                'bod' => '1998-09-01',
                'email' => 'customer2@gmail.com'
            ],

            '2' => [
                'id'  => 3,
                'name' => 'customer3',
                'bod' => '1998-09-01',
                'email' => 'customer3@gmail.com'
            ]
        ];

        //goi view va truyen du lieu sang view
        return view('customers.list', compact('customers'));
    }

    /**
     * Hiển thị Form tạo khách hàng.
     */
    public function create()
    {
        echo "Hiển thị Form tạo khách hàng";
    }

    /**
     * Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Hiển thị thông tin chi tiết khách hàng có mã định danh id.
     *
     * @param  int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Hiển thị Form chỉnh sửa thông tin khách hàng.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Xóa thông tin dữ liệu khách hàng.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        //
    }
}