
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
                        <div class="m-title">Thêm câu lạc bộ</div>
                        
                    </div>
                    
                    <div style="display: flex;" class="m-page-content" style="border-bottom: 1px solid grey;">
                        <form action="<?= URLROOT ?>/Clubs/store" method="POST" id="club-form">
                        <div style="display: flex;">
                        <div style="margin-right: 10px"  class="input">
                                <label style="display: block;" for="">Tên câu lạc bộ</label>
                                <input required name="name" class="m-input" placeholder="Nhập tên câu lạc bộ" type="text">
                            </div>

                            
                            <div class="input">
                                <label for="">ShortName</label>
                                <input required name="shortname" class="m-input" placeholder="Nhập shortname" type="text">
                            </div>
                            
                        </div>
                           
                            <div  style="display: flex;">
                            <div style="margin-right: 10px"  class="input">
                                <label for="">Chọn sân vận động</label>
                                <select class="m-select" name="stadiumid" id="">
                                    <?php foreach($data['stadium'] as $a): ?>
                                    <option  value="<?php echo $a['StadiumID']; ?>"><?php echo $a['SName'] ?></option>
                                    <?php endforeach ?>
                                   

                                   
                                    
                                </select>
                            </div>

                            <div class="input">
                                <label for="">Chọn huấn luyện viên</label>
                                <select class="m-select" name="coachid" id="">
                                    
                                <?php foreach($data['coach'] as $a): ?>
                                    <option  value="<?php echo $a['CoachID'] ?>"><?php echo $a['CFullName'] ?></option>
                                    <?php endforeach ?>

                                   
                                    
                                </select>
                            </div>
                            </div>
                            

                            <div class="btn"><button name="submit" type="submit" class="m-btn" id="add-club-btn">Thêm câu lạc bộ</button></div>
                        </form>
                    </div>



                    <?php
require APPROOT . '/views/includes/footer.php';

                    
                ?>
                