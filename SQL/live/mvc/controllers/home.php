<?php
class home extends controller
{
    function sayhi()
    {
        $teo = $this->model("SinhVienModel");
        echo $teo->getSV();
    }

    function show()
    {
        echo "Home - Show";
    }
}