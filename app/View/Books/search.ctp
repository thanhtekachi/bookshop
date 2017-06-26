<div class="box-index " style = "float:left; width:100%;">
        <?php 
          if (isset($book_search)) { 
            foreach($book_search as $book) {?>
              <div id ="item" class="thumbnail item col-md-3 col-sm-3 col-xs-6">          
                <div class="caption">
                  <h5><?php echo $this->Html->link($book['Book']['title'],'/'.$book['Book']['slug']); ?></h5>
                  <p>Giá:<?php echo $book['Book']['sale_price'];?></p>
                  <p>Nhà xuất bản:<?php echo $book['Book']['publisher'];?></p>
                  <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                      <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Mua</button>
                    </div>
                   </div>
                </div>
                <?php echo $this->html->image($book['Book']['image'], array('width' => '170px','height'=>'100px'));?>
                </div>
        <?php }}?>
      </div>
      <div class = 'paginator' style = "text-align:center;" >
        <?php
          if (isset($book_search)) {
            echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Hiện thj nút Previous
            echo " | ".$this->Paginator->numbers()." | "; //Hiển thi các số phân trang
            echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Hiển thị nút next
            echo " Page ".$this->Paginator->counter(); // Hiển thị tổng trang
          }
        ?> 
      </div>