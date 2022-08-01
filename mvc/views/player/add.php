<?php
require APPROOT . '/views/includes/header.php';

?>
<div class="m-main">
    <div class="m-navbar">
        <?php
        require APPROOT . '/views/includes/sidebar.php';


        ?>

    </div>
    <div class="m-content">
        <div class="m-content-header">
            <div class="m-title">Thêm cầu thủ</div>

        </div>
        <!-- <div class="m-content-toolbar">
                        <div class="m-toolbar-left">
                            <input
                                id="search"
                                type="text"
                                class="m-input m-input-icon m-icon-search"
                                placeholder="Tìm kiếm theo tên, số hồ sơ"
                            />
                            <select class="m-select" name="dept" id="">
                                <option value="1">Tất cả phòng ban</option>
                                <option value="2">Phòng nhân sự</option>
                                <option value="3">Phòng marketing</option>
                            </select>
                            <select class="m-select" name="pos" id="">
                                <option value="1">Tất cả vị trí</option>
                                <option value="2">Giám đốc</option>
                                <option value="3">Nhân viên</option>
                            </select>
                        </div>
                        <div class="m-toolbar-right">
                            <button class="m-btn-refresh"></button>
                            <button id="btnDelete" class="m-btn m-btn-success">
                                Xóa
                            </button>
                        </div>
                    </div> -->
        <div class="m-page-content" style="border-bottom: 1px solid grey;">
            <form action="<?= URLROOT ?>/Players/store" method="POST" id="add-new-player-form">
                <div style="display: flex;">
                    <div style="margin-right: 50px;">
                        <div class="input">
                            <label style="display: block;" for="">Họ tên cầu thủ</label>
                            <input required id="id-name-add-form" name="name" class="m-input"
                                placeholder="Nhập tên cầu thủ" type="text">
                        </div>

                        <div class="input">
                            <label for="">Ngày sinh</label>
                            <input required name="DOB" id="id-DOB-add-form" style="width:203px" class="m-input"
                                placeholder="Nhập vị trí" type="date">
                        </div>
                        <div class="input">
                            <label for="">Vị trí</label>
                            <input required name="position" id="id-position-add-form" class="m-input"
                                placeholder="Nhập vị trí" type="text">
                        </div>

                    </div>
                    <div>
                        <div class="input">
                            <label for="">Quốc gia</label>
                            <input required name="national" id="id-national-add-form" class="m-input"
                                placeholder="Nhập quốc gia" type="text">
                        </div>

                        <div class="input">
                            <label for="">Số áo</label>
                            <input required name="number" id="id-number-add-form" class="m-input"
                                placeholder="Nhập số áo" type="number">
                        </div>
                        <div class="input">
                            <label for="">Chọn câu lạc bộ</label>
                            <select class="m-select" name="club" id="id-club-add-form">
                                <?php foreach ($data['club'] as $a) : ?>
                                <option value="<?php echo $a['ClubID']  ?>"> <?php echo $a['ClubName']  ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div style="display: block;" class="btn">
                    <button name="submit" class="m-btn" id="add-new-player">Thêm cầu thủ</button>
                </div>
            </form>
        </div>



        <?php
        require APPROOT . '/views/includes/footer.php';


        ?>