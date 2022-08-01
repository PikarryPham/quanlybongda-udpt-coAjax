<?php
class Controller extends Exception{
    //method gọi model
    public function model($model){
        require_once './mvc/models/'.$model.'.php';
        return new $model;
    }

    //method gọi view
    public function view($view, $data = []){
        require_once './mvc/views/'.$view.'.php';
    }

    // Xử lý page
    public function editPage($page, $number_page){ 
        // Sử lý page
        $page ++;
        $bu_trang = 0;
        $start_page = 1;
        $end_page = $number_page;
        if ($page > 5){
            $start_page = $page - 5; 
        }else{
            $bu_trang = 5 - $page; 
        }
        if ($number_page - 5 > $page){
            $end_page = $page + 5 + $bu_trang;
        }else if($number_page > 10){
            $start_page -= ($number_page - $page + 5);
        }
        return [$start_page, $end_page];
    }
}
