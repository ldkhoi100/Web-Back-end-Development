<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class taskControllers extends Controller
{
    public function view()
    {
        //Lấy ra toàn bộ các task từ database thông qua truy vấn bằng Eloquent
        $tasks = \App\Task::show();
        // Trả về view index và truyền biến tasks chứa danh sách các task
        return view('task.view', compact('tasks'));
    }

    public function create()
    {
        return view('task.add');
    }

    public function store(Request $request)
    {
        //Khởi tạo mới đối tượng task, gán các trường tương ứng với request gửi lên từ trình duyệt
        $task = new Task();
        $task->title = $request->inputTitle;
        $task->content = $request->inputContent;
        $task->due_date = $request->inputDueDate;
        $file = $request->inputFile;
        // Nếu file không tồn tại thì trường image gán bằng NULL
        if (!$request->hasFile('inputFile')) {
            $task->image = $file;
        } else {
            //Lấy ra đuôi định dạng(vd: .jpg) và tên mới của file từ request
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;

            // Gán tên mới cho file trước khi lưu lên server
            $newFileName = "$fileName.$fileExtension";

            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $newFileName);

            // Gán trường image của đối tượng task với tên mới
            $task->image = $newFileName;
        }
        $task->save();

        // $image = addslashes(file_get_contents($_FILES['inputFile']['tmp_name']));
        // $data = array('title' => $title, 'content' => $content, 'due_date' => $due_date, 'image' => $image);
        // DB::table('tasks')->insert($data);

        $message = "Tạo Task $request->inputTitle thành công!";
        Session::flash('create-success', $message);
        return redirect()->route('tasks.view', compact('message'));
    }
}