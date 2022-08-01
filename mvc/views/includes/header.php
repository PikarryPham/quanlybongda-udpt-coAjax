<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/manager-football/public/css/main.css" />
        <link
            rel="stylesheet"
            href="/manager-football/public/css/components/employee.css"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <title>Document</title>
    </head>

    <body>
        <div class="m-layout">
<header>
    
                <div class="m-header">
                    <div class="m-header-left">
                        <div class="m-header-left-first">
                            <div class="m-header-toggle"></div>
                            <div class="m-header-logo"></div>
                        </div>
                        <div class="m-header-left-second">
                            <!-- <div class="m-header-branch">MB</div> -->
                            <div class="m-select-branch">
                                <select name="" id="">
                                    <option value="1">
                                        Chi nhánh miền Bắc
                                    </option>
                                    <option value="2">
                                        Chi nhánh miền Trung
                                    </option>
                                    <option value="3">
                                        Chi nhánh miền Nam
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="m-header-right">
                        <div class="notification">
                            <i class="far fa-bell"></i>
                        </div>
                        <div class="avatar">
                            <img
                                src="../assets/icon/avatar-default.png"
                                alt=""
                            />
                        </div>
                        <div class="user-name">Phạm Ngọc Thùy Trang</div>
                        <div class="logout"><a href="<?= URLROOT ?>/Users/index" style="    cursor: pointer;
                                    text-decoration: none;
                                    color: black;
                                    margin-right: 15px; ">Logout</a></div>
                        <div class="more-action">
                            <!-- <img src="assets/icon/option.png" alt=""> -->
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                </div>
            </header>