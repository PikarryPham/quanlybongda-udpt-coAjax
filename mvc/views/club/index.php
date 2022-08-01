
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
                        <div class="m-title">Danh sách câu lạc bộ </div>
                        <a
                            style="text-decoration:none;text-align:center;line-height:40px"
                            href="<?php echo URLROOT; ?>/clubs/create"
                            id="btnAddEmployee"
                            class="m-btn m-button-icon m-icon-add"
                        >
                            Thêm câu lạc bộ
                        </a>
                    </div>
                    <div class="m-content-toolbar">
                        <div class="m-toolbar-left">
                       
                        </div>
                        <div class="m-toolbar-right">
                            <button class="m-btn-refresh"></button>
                            
                        </div>
                    </div>
                    <div class="m-page-content">
                        <div class="table">
                            <table class="m-table">
                                <thead>
                                    <tr>
                                       
                                        <th
                                            class="text-align-center"
                                            
                                        >
                                            Tên câu lạc bộ
                                        </th>
                                        <th class="text-align-center">ShortName</th>
                                        
                                        <th
                                            class="text-align-center"
                                           
                                        >
                                            Sân vận động
                                        </th>
                                        <th
                                            class="text-align-center"
                                            style="width: 150px"
                                        >
                                            Tên huấn luyện viên
                                        </th>
                                        
                                        <th
                                            class="text-align-center"
                                            style="width: 100px"
                                        >
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['club'] as $p) : ?>
                                
                                    <tr>
										
                                       
                                       
										<td class="text-align-center">
                                        <?php echo  $p['ClubName']; ?>
                                        </td>
                                        
										<td class="text-align-center">
                                        <?php echo  $p['Shortname']; ?>
                                       
										</td>
										<td class="text-align-center">
                                        
                                        <?php echo  $p['SName']; ?>

										</td>
										<td class="text-align-center">
                                        
                                        <?php echo  $p['CFullName']; ?>

										</td>
										

                                        <td class="text-align-center">
                                        <a href="<?php echo URLROOT ?>/clubs/edit/<?= $p['ClubID'] ?>"> <i  style=" margin-right: 5px ; color:#33FFFF" class="icon1 fa-solid fa-pen-to-square"></i></a>
                                           
                                        <a href="<?php echo URLROOT ?>/players/groupPlayer/<?= $p['ClubID'] ?>"> <i style="color: yellow" class="icon1 fa-solid fa-eye"></i></a>


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
                                <a href="<?= $data['type'] ?>&page=1">
                                    <button class="first-page">
                                        <i class="fas fa-angle-double-left"></i>
                                    </button>
                                </a>
                                <a href="<?= $data['type'] ?>&page=<?php if($data['page'] != 1) {echo $data['page']-1; } else {echo $data['page'];} ?>">
                                    <button class="prev-page">
                                        <i class="fas fa-angle-left"></i>
                                    </button>
                                </a>
                                <div class="list-page-group">
                                    <?php 
                                        for ($i = $data['start_page'] ; $i <= $data['end_page'] ; $i++){
                                            if ($data['page'] == $i) {
                                                echo "<button class='page-number selected'>$i</button>";
                                            }else{
                                                echo "<a href='" . $data['type'] . "&page=$i'><button class='page-number'>$i</button></a>";
                                            }
                                        }
                                    ?>
                                </div>
                                <a href="<?= $data['type'] ?>&page=<?php if($data['page'] != $data['number_page']) {echo $data['page']+1; } else {echo $data['page'];} ?>">
                                    <button class="next-page">
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </a>
                                <a href="<?= $data['type'] ?>&page=<?= $data['number_page'] ?>">
                                    <button class="last-page">
                                        <i class="fas fa-angle-double-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>



                    <?php
require APPROOT . '/views/includes/footer.php';

                    
                ?>
                