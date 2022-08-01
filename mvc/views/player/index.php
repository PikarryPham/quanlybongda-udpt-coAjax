<?php
require APPROOT . '/views/includes/header.php';

?>
<div class="m-main">
    <div class="m-navbar">
        <?php
            require APPROOT . '/views/includes/sidebar.php';

            $club_id        = 0;
            $name_player    = "";
            $national_name  = "";
            $position_name  = "";

            if(isset($_POST['submit'])){
                $club_id        = $_POST['club'];
                $name_player    = $_POST['name'];
                $national_name  = $_POST['national'];
                $position_name  = $_POST['position'];
            }

        ?>

    </div>

    <div class="m-content">
        <div class="m-content-header">
            <div class="m-title">Danh sách cầu thủ <?php if (isset($data['clbtarget'])) print " : " .  $data['clb']['ClubName']; ?></div>

            <a style="text-decoration:none;text-align:center;line-height:40px" href="<?php echo URLROOT; ?>/players/create" id="btnAddEmployee" class="m-btn m-button-icon m-icon-add">
                Thêm cầu thủ
            </a>
        </div>
        <div class="m-content-toolbar">
            <div class="m-toolbar-left" style="display:flex">

                <form id="form-find-player" action="<?= URLROOT ?>/Players/filterPlayer" method="post">
                    <input type="hidden" id="number-player" name="number-player" value="10">
                    <input type="hidden" id="page_number" name="page" value="1">
                    <input id="search" type="text" name="name" class="m-input m-input-icon m-icon-search" value="<?php echo $name_player ?>"placeholder="Lọc theo tên cầu thủ" />
                    <select class="m-select" name="club" id="">
                        <option value="0">Tất cả đội bóng</option>
                        <?php if(isset($data['group_id'])){ ?>
                            <?php foreach ($data['club'] as $c) : 
                                if ($c['ClubID'] == $data['group_id']){
                            ?>
                                <option value="<?php echo $c['ClubID'] ?>" selected> <a href="<?php echo URLROOT ?>/players/groupPlayer/<?= $c['ClubID'] ?>"><?php echo $c['ClubName'] ?></a> </option>
                            <?php } else { ?>
                                <option value="<?php echo $c['ClubID'] ?>" <?php if ($c['ClubID'] == $club_id) echo 'selected'?> > <a href="<?php echo URLROOT ?>/players/groupPlayer/<?= $c['ClubID'] ?>"><?php echo $c['ClubName'] ?></a> </option>
                            <?php } endforeach ?>
                        <?php } else { ?>
                            <?php foreach ($data['club'] as $c) : ?>
                                <option value="<?php echo $c['ClubID'] ?>" <?php if ($c['ClubID'] == $club_id) echo 'selected'?> > <a href="<?php echo URLROOT ?>/players/groupPlayer/<?= $c['ClubID'] ?>"><?php echo $c['ClubName'] ?></a> </option>
                            <?php endforeach ?>
                        <?php } ?>

                    </select>
                    <select class="m-select" name="national" id="">
                        <option value="">Tất cả quốc gia</option>

                        <?php foreach ($data['nationality'] as $c) : ?>
                            <option value="<?php echo $c['Nationality'] ?>" <?php if ($c['Nationality'] == $national_name) echo 'selected'?>><?php echo $c['Nationality'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <select class="m-select" name="position" id="">
                        <option value="">Tất cả vị trí</option>

                        <?php foreach ($data['positions'] as $c) : ?>
                            <option value="<?php echo $c['Position'] ?>" <?php if ($c['Position'] == $position_name) echo 'selected'?> ><?php echo $c['Position'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="hidden" name="submit" value="true">
                    <button id="submit-button" style="margin-left: 5px;" type="submit" href="" class="m-btn ">Lọc</button>
                </form>

            </div>
            <div class="m-toolbar-right">
                <a href="">
                    <button style="margin-right: 10px;" class="m-btn-refresh"></button>
                </a>
                <a style="text-align: center;text-decoration:none;
    line-height: 40px;" id="btnDelete" class="m-btn m-btn-success">
                    Xóa
                </a>
            </div>
        </div>
        <div class="m-page-content">
            <?php if (isset($data['player'])) { ?>
                <div class="table">

                    <table class="m-table">
                        <thead>
                            <tr>

                                <th class="text-align-center">
                                    <label style="display: block;" for="">All</label>
                                    <input type="checkbox" id="checkboxall" class="m-checkbox" value="0" />

                                </th>
                                <th class="text-align-center">
                                    Tên cầu thủ
                                </th>
                                <th class="text-align-center">Câu lạc bộ</th>

                                <th class="text-align-center">
                                    Vị trí
                                </th>
                                <th class="text-align-center" style="width: 150px">
                                    DOB
                                </th>
                                <th class="text-align-center" style="width: 50px">
                                    Quốc gia
                                </th>
                                <th class="text-align-center" style="width: 100px">
                                    Số
                                </th>
                                <th class="text-align-center" style="width: 100px">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody id="all-player">
                            <?php foreach ($data['player'] as $p) : ?>
                                <tr id = "data-player-<?php echo $p['PlayerID']?>">
                                    <td class="text-align-center">
                                        <input value="<?php echo  $p['PlayerID'] ?>" type="checkbox" class="m-checkbox" name="playerid[]" />
                                    </td>

                                    <td class="text-align-center"><?php echo  $p['FullName']; ?></td>

                                    <td class="text-align-center">
                                        <?php echo  $p['ClubName']; ?>
                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Position']; ?>

                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['DOB']; ?>

                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Nationality']; ?>


                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Number']; ?>

                                    </td>
                                    
                                    <td class="text-align-center">
                                        <a href="<?php echo URLROOT ?>/players/edit/<?= $p['PlayerID'] ?>"> <i style=" margin-right: 5px ; color:#33FFFF" class="icon1 fa-solid fa-pen-to-square"></i></a>
                                        <a class="delete-one-value" href="<?php echo URLROOT ?>/players/delete/<?= $p['PlayerID'] ?>"> <i style="color:red" class="icon1 fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>


                </div>
                <div class="paging">
                    <div class="paging-left">
                        Hiển thị 10 thông tin/trang
                    </div>
                    <div class="paging-center">
                        <button id="start-page" class="first-page" onclick="change_page(1)">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <button id="pre-page" class="prev-page">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <div class="list-page-group" id="page-group">
                            <?php
                            for ($i = $data['start_page']; $i <= $data['end_page']; $i++) {
                                if ($data['page'] == $i) {
                                    echo "<button class='page-number selected'>$i</button>";
                                } else {
                                    echo "<a href='" . $data['type'] . "&page=$i'><button class='page-number'>$i</button></a>";
                                }
                            }
                            ?>
                        </div>
                        <button id="next-page" class="next-page">
                            <i class="fas fa-angle-right"></i>
                        </button>
                        <button id="end-page" class="last-page">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>
                    <div class="paging-right">
                        <select class="m-select" name="" id="number-number-show">
                            <option value="10">
                                10 cầu thủ/trang
                            </option>
                        </select>
                    </div>
                </div>

            <?php } else {
                echo "<div> <h2>Không có cầu thủ nào !</h2></div>";
            } ?>

        </div>
        <?php
        require APPROOT . '/views/includes/footer.php';
        ?>