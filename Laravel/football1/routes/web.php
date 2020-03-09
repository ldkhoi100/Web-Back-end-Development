<?php
// Welcome page
Route::get('/', function () {
    return view('welcome');
});


//Tổng quan ứng dụng Laravel
// [Bài tập] Ứng dụng Product Discount Calculator
Route::get('/inputproduct', function () {
    return view('inputproduct');
});
Route::post('/inputproducts', 'product@index');


// [Bài tập] Ứng dụng Từ điển đơn giản
Route::match(['get', 'post'], '/dictionary', function (Illuminate\Http\Request $request) {
    $textDictionary = $request->textDictionary;
    $flag = 0;
    $vien = ['hello' => 'xin chào', 'sorry' => 'xin lỗi', 'bye' => 'tạm biệt', 'car' => 'xe ô tô'];
    foreach ($vien as $word => $description) {
        if ($textDictionary == $word) {
            $result = "Từ " . $word . " có nghĩa là " . $description;
            $flag = 1;
        }
    }
    if ($flag == 0) {
        $result = "Không tìm thấy";
    }
    return view('dictionary', compact(['result'], ['vien'], ['textDictionary'], ['word'], ['description']));
})->name('hello');

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    echo "hello $postId $commentId";
});


// [Thực hành] Sử dụng route cơ bản
Route::group(['prefix' => '/test'], function () {
    Route::get('/home1', function () {
        echo "<h2>This is Home page</h2>";
    });

    Route::get('/about', function () {
        echo "<h2>This is About page</h2>";
    });

    Route::get('/contact', function () {
        echo "<h2>This is Contact page</h2>";
    });

    Route::get('/user', function () {
        $name = 'Tám';
        return view('user', ['name' => $name]);
    });

    Route::get('/home', 'HomeController@index');
});


//[Thực hành] Ứng dụng xem giờ hiện tại của các thành phố trên thế giới
Route::get('/time/{timezone?}', function ($timezone = null) {
    if (!empty($timezone)) {

        // Khởi tạo giá trị giờ theo múi giờ UTC
        $time = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('UTC'));

        // Thay đổi về múi giờ được chọn
        $time->setTimezone(new DateTimeZone(str_replace('-', '/', $timezone)));

        // Hiển thị giờ theo định dạng mong muốn
        echo 'Múi giờ bạn chọn ' . $timezone . ' hiện tại đang là: ' . $time->format('d-m-Y H:i:s');
    }
    return view('time');
});


// [Bài đọc] Resource Controller
Route::resource('photos', 'PhotoController');

// [Thực hành] Khởi tạo ứng dụng Task Management

Route::get('player', 'football@index');


// [Thực hành] Ứng dụng kiểm tra email hợp lệ
// Route::get('/email', 'EmailController@index');
Route::match(['get', 'post'], '/email', 'EmailController@index');


// [Thực hành] Ứng dụng Task Management với Blade Template
// Route::group(['prefix' => 'task'], function () {
//     //Index page
//     Route::get('/', function () {
//         return view('task.index');
//     })->name('index');
//     //Show list task
//     Route::get('/view', 'taskControllers@view')->name('tasks.view');
//     //Creat task
//     Route::get('/create', 'taskControllers@create')->name('tasks.create');
//     //store
//     Route::post('/store', 'taskControllers@store')->name('tasks.store');
// });

Route::resource('task', 'taskControllers');

// [Thực hành] Sử dụng Eloquent Ứng dụng quản lý khách hàng
Route::resource('/customers', 'CustomerControllers');