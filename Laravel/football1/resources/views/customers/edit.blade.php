@extends('layouts.app')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Chỉnh sửa khách hàng</h1>
        </div>
        <div class="col-12">
            <form method="post" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required></div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="dob" value="{{ $customer->dob }}" required>
                </div>

                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="data:image;base64, {{$customer->image}}" width="60px" height="60px">
                </div>

                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
@endsection