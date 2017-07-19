<div class="container">
    <div class="row" >
        <!-- Banner -->
        <div class = "banner" style = "height:140px;" >
            <div  class="logo col-md-6 col-sm-6 col-xs-12">
                <div id = "logo">

                </div>
            </div>
            <div class="user-info col-md-6 col-sm-6 col-xs-12 ">
                <ul class="nav navbar-nav" style ="float:right;">
                    <li class="dropdown" style ="width:170px;text-align:center;float:right;"> 
                        <span class= "glyphicon glyphicon-user"></span>
                        <?php 
                            if (isset($user_info) && !empty($user_info['username'])) {
                                echo "User: " . $user_info['username'];
                                echo "<ul class='dropdown-menu' role='menu' style = 'text-align:center;'>";
                                if ($user_info['group_id'] == 1) {
                                    echo "<li>" . $this->Html->link('Admin Home',array('controller' => 'books','action' => 'admin_index'));
                                }
                                echo "<li>" . $this->Html->link('Thông Tin Tài Khoản ','/cap-nhat-thong-tin') . "</li>";
                                echo "<li>" . $this->Html->link('Lịch Sử Mua Hàng','/lich-su-mua-hang') ."</li>";
                                echo "<li>" . $this->Html->link('Đăng xuất','/logout') ."</li>";
                            }else {
                                echo "Customer ";
                                echo "<ul class='dropdown-menu' role='menu' style = 'text-align:center;width:10px;'>";
                                echo "<li>" . $this->Html->link('Đăng Nhập ','/login ',array('style'=>'width:170px;')) ."</li>";
                                echo "<li>" . $this->Html->link('Đăng Ký','/dang-ky ',array('style'=>'width:170px;')) ."</li>";
                            } 
                        ?> 
                    </li>   
                </ul>    
            </div>
        </div>
        <!-- Navigation Bars  -->   
        <nav class="navbar navbar-default" > 
            <ul class="nav navbar-nav" style = "margin:auto;padding:0px;width:65%;">
                <li class="glyphicon glyphicon-home" style ="padding-top:16px;margin-right:-13px;"></li>
                    <li style =""><?php echo $this->Html->link('Trang chủ','/');?></li>
                <li class="dropdown" style ="width:160px;text-align:center;"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-book"></span> Danh mục sách<span class="caret"></span></a>
                    <ul class="dropdown-menu" style ="width:160px;text-align:center;" role="menu">
                        <li><?php echo $this->Html->link('Sách văn học','/danh-muc/van-hoc');?></li>
                        <li><?php echo $this->Html->link('Sách kinh tế','/danh-muc/kinh-te');?></li>
                        <li><?php echo $this->Html->link('Kiến thức tổng hợp','/danh-muc/kien-thuc-tong-hop');?></li>
                        <li><?php echo $this->Html->link('Sách giáo dục','/danh-muc/chuyen-nganh'); ?></li>
                        <li><?php echo $this->Html->link('Kỹ năng sống','/danh-muc/ki-nang-song-dep'); ?></li>
                    </ul>
                </li> 
                <li><a href="#"><span class="glyphicon glyphicon-comment"></span> Sách mới  <span class="label label-danger">Hot</span></a></li>
                <li > <a href="#"><span class="glyphicon glyphicon-phone"></span>Liên hệ</a></li>     
            </ul>
            <ul class="nav navbar-nav pull-right">
                <?php 
                    echo $this->Form->create('book',array('action'=>'search','class'=>'navbar-form search'));
                    echo $this->Form->input('keyword',array('label'=>'','style'=>"width: 250px;", 'placeholder'=>"Tìm kiếm..."));
                    echo $this->Form->end();
                ?>
            </ul>  
        </nav> 
    </div>
</div>