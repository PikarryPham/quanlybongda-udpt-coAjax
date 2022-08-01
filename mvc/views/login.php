<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập vào website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <style>
            *{
    padding: 0px;
    margin: 0px;
    font-family: sans-serif;
    box-sizing: border-box;
}
header{
    background-color: #cccccc;
    min-height: 70px;
    padding: 15px;
    text-align: center;
}
main{
    background-color: #dddddd;
    min-height: calc(100vh - 153px);
    padding: 7.5px 15px;
}
footer{
    background-color: #cccccc;
    min-height: 70px;
    padding: 15px;
    text-align: center;
}
.container{
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}
.login-form{
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}
h1{
    color: #009999;
    font-size: 20px;
    margin-bottom: 30px;
}
.input-box{
    margin-bottom: 10px;
}
.input-box input{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
}
.btn-box{
    text-align: right;
    margin-top: 30px;
}
.btn-box button{
    padding: 7.5px 15px;
    border-radius: 2px;
    background-color: #009999;
    color: #ffffff;
    border: none;
    outline: none;
}
.message{
    color: red;
    text-align: center;
    padding-bottom: 10px;
}
        </style>
    </head>
    <body >
        <header>
            <div class="container">
                <h1> Wellcome to manager football</h1>
               
            </div>
        </header>
        <main>
            <div class="container">
            <div class="login-form">
                <form action="<?= URLROOT ?>/Users/login" method="post">
                    <h1>Đăng nhập vào website</h1>
                    <div class="message"><?php if($data['message']!="") { echo $data['message']; } ?></div>
                    <div class="input-box">
                        <i ></i>
                        <input name="username" type="text" placeholder="Nhập username">
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="password" type="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="btn-box">
                        <button type="submit">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright © 2022 Phạm Ngọc Thùy Trang - UDPT
            </div>
        </footer>
    </body>
</html>