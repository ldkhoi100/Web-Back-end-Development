<div class="main-content">
  <h1>Ứng dụng kiểm tra email hợp lệ</h1>
  <form method="post">
    @csrf
    <label for="email-input">Email:</label>
    <input id="email-input" type="text" placeholder="Nhập email cần kiểm tra" name="email">
    <input type="submit" value="Check">
  </form>
</div>
@if(isset($email))
Kết quả: {{ $check ? 'Đúng định dạng' : 'Sai định dạng email' }}
@endif