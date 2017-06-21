
      <div class="box-index " style = "float:left; width:100%;">
     <!--  <h4><?php echo $this->Html->link($category['Category']['name'],'/categories/' . $category['Category']['slug']); ;?></h4> -->
        <?php foreach($list_book as $category_book) {?>
            <div id ="item" class="thumbnail item col-md-3 col-sm-3 col-xs-6">          
              <div class="caption">
                <h5><?php echo $this->Html->link($category_book['Book']['title'],'/'.$category_book['Book']['slug']); ?></h5>
                <p>Giá:<?php echo $category_book['Book']['sale_price'];?></p>
                <p>Nhà xuất bản:<?php echo $category_book['Book']['publisher'];?></p>
                <div class="btn-group btn-group-justified">
                  <div class="btn-group">
                    <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Mua</button>
                  </div>
                  <div class="btn-group">
                    <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-info-sign"></span> Chi tiết</button>
                  </div>
                </div>
              </div>
              <?php echo $this->html->image($category_book['Book']['image'], array('width' => '170px','height'=>'100px'));?>
            </div>
        <?php }?>
        
      </div>
      <div class = 'paginator' style = "text-align:center;" >
          <?php
            echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Hiện thj nút Previous
            echo " | ".$this->Paginator->numbers()." | "; //Hiển thi các số phân trang
            echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Hiển thị nút next
            echo " Page ".$this->Paginator->counter(); // Hiển thị tổng trang
          ?> 
      </div>