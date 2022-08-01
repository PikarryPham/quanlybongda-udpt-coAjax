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
            <div class="m-title">Sửa thông tin câu lạc bộ</div>

        </div>

        <div class="m-page-content" style="border-bottom: 1px solid grey;">
            <form id="edit-new-player-form" action="<?= URLROOT ?>/Clubs/update/<?= $data['club'][0]['ClubID'] ?>"
                method="POST">
                <div style="display: flex;">
                    <div style="margin-right: 10px" class="input">
                        <label style="display: block;" for="">Tên câu lạc bộ</label>
                        <input id="ClubName-edit-form" value=" <?php echo $data['club'][0]['ClubName']  ?>" name="name"
                            class="m-input" placeholder="Nhập tên câu lạc bộ" type="text">
                    </div>


                    <div class="input">
                        <label for="">ShortName</label>
                        <input id="Shortname-edit-form" value=" <?php echo $data['club'][0]['Shortname']  ?>"
                            name="shortname" class="m-input" placeholder="Nhập shortname" type="text">
                    </div>

                </div>

                <div style="display: flex;">
                    <div style="margin-right: 10px" class="input">
                        <label for="">Chọn sân vận động</label>
                        <select class="m-select" name="stadiumid" id="">
                            <option id="StadiumID-edit-form" value="<?php echo $data['club'][0]['StadiumID'];  ?>">
                            </option>
                            <?php foreach ($data['stadium'] as $a) : ?> <option value="<?php echo $a['StadiumID']  ?>">
                                <?php echo $a['SName']  ?></option> <?php endforeach ?>

                        </select>
                    </div>

                    <div class="input">
                        <label for="">Chọn huấn luyện viên</label>
                        <select class="m-select" name="coachid" id="">
                            <option id="coachid-edit-form" value="<?php echo $data['club'][0]['CoachID'];  ?>">

                            </option>
                            <?php foreach ($data['coach'] as $a) : ?> <option value="<?php echo $a['CoachID']  ?>">
                                <?php echo $a['CFullName']  ?></option> <?php endforeach ?>

                        </select>
                    </div>
                </div>

                <div class="btn"><button name="submit" type="submit" class="m-btn" id="edit-club-btn">Sửa câu lạc
                        bộ</button></div>
            </form>
        </div>



        <?php
        require APPROOT . '/views/includes/footer.php';


        ?>