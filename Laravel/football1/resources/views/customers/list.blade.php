@extends('layouts.app')
@section('title', 'Danh sách khách hàng')
@section('content')

<div class="container">
    <div class="col-12">
        <h1>Danh Sách Khách Hàng</h1>
        @include('customers.message')
        <a class="btn btn-info" href="{{ route('customers.create') }}">Thêm mới</a>
        <br><br>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($customers) == 0)
                    <td colspan="5">Không có dữ liệu</td>
                    @else
                    @foreach ($customers as $key => $customer)
                    <tr>
                        <th scope="col">{{ ++$key }}</th>
                        <td>{{ $customer['name'] }}</td>
                        <td>{{ $customer['dob'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td><img src="data:image;base64, {{$customer->image}}" width="60px" height="60px">
                        </td>
                        <td><a href="{{ route('customers.show', $customer->id) }}">Show</a></td>
                        <td><a href="{{ route('customers.edit', $customer->id) }}">sửa</a></td>
                        <td>
                            <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- onclick="return confirm('Bạn chắc chắn muốn xóa?')" --}}
@endsection