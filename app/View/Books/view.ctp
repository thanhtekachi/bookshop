<!-- book info -->
<div class="book-info">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-bookmark"></i> Chi tiết</h4>
	<div class="row"> 
		<div class="col col-lg-3">
	    	<div class="book-thumbnail">
	      		<?php echo $this->Html->image($book_info['Book']['image']); ?>
	    	</div>
 		</div>
 		<div class="col col-lg-9">
 			<div class="book-info">
	        	<h4><?php echo h($book_info['Book']['title']); ?></h4>
	        	<p>Tác giả :
	        		<?php 
	        		    $writer_count = 0;
	        	    	if(isset($book_info['Writer'])&&!empty($book_info['Writer'])){
	        	    		foreach ($book_info['Writer'] as $value) {
                                if ($value === end($book_info['Writer'])){
                                	echo $this->Html->link($value['name'],'/writers/' . $value['slug'] ) ;
                                } 
                                else {
                                	echo $this->Html->link($value['name'],'/writers/' . $value['slug'] ) . ' , ';
                                }
                                                                  
	        	    		}
	        	    	}
	        	    	else{
	        	    		echo " Đang cập nhât";
	        	    	}
	        	    ?>
	            </p>
	        	<p class = "count-comment"> Nhận xét : <?php echo count($book_info['Comment']) ?></p>
	        	<p>Giá bìa : <?php echo $book_info['Book']['price'] ?></p>
	        	<p>Giá bán: <?php echo $book_info['Book']['sale_price'] ?></p>
	    	</div>
 		</div>
 		<div class="book-content col-lg-12">
 			<h4>Giới thiệu:</h4>
 			<div class = "book-info col-lg-9" style = "text-indent: 20px;">
 				<p><?php echo h($book_info['Book']['info']); ?></p>
 		    </div>
 			
 			<div class="col col-lg-7">
	 			<table class="table table-striped table-bordered">
		        	<thead>
		          		<tr>
		            		<th>Thông tin chi tiết</th>
		          		</tr>
		        	</thead>
		        	<tbody>
		          		<tr>
		           			<td>Nhà xuất bản:</td>
		            		<td><?php echo h($book_info['Book']['publisher']); ?></td>
		          		</tr>
		          		<tr>
		          			<td>Ngày xuất bản</td>
		           			 <td><?php echo h($book_info['Book']['publish_date']); ?></td>
		          		</tr>
		          		<tr>
		          			<td>Số trang:</td>
		            		<td><?php echo h($book_info['Book']['pages']); ?></td>
		          		</tr>
		        	</tbody>
		    	</table>
	    	</div>
 		</div>
	</div>
</div> 
<!-- end book info -->

<!-- related books -->
<div class="related-book">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Sách liên quan</h4>
	<div class="row">
		<div class="col col-lg-9">
            <?php foreach ($related_books as $related_book) {?>
            	<div class = "col col-lg-3" style ="text-align:center;">
            		<?php echo $this->Html->image($related_book['Book']['image'],array('width'=>'180px','height'=>'250px')); ?>
              		<h5><?php echo $this->Html->link($related_book['Book']['title'],'/'.$related_book['Book']['slug']); ?></h5>
       				<p class = "writer">Tác giả: 
       					<?php foreach ($related_book['Writer'] as $value) {
           						if ($value === end($related_book['Writer'])){
                                    echo $this->Html->link($value['name'],'/writers/' . $value['slug'] ) ;
                                } 
                                else {
                                    echo $this->Html->link($value['name'],'/writers/' . $value['slug'] ) . ' , ';
                                }
       				          } 
       				    ?>
       			    </p>
       				<p class="price">Giá: <?php echo $this->Number->currency($related_book['Book']['sale_price'],' VND',array('places'=>0,'wholePosition'=>'after')); ?></p>
            	</div>
            <?php }?>
        </div>
    </div>
</div> 
<!-- end related books --> 

<div class = "comment">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-comment"></i> Nhận xét</h4>
	<div class="row">	
		<div class="col col-lg-10">
			<!-- show comment -->
			<div class = "show-comment">
				<?php if (!empty($book_info['Comment'])) :?>
					<?php foreach ($comments as $comment): ?>
					<p>
						<?php echo $comment['User']['username'] . ' : ' . $comment['Comment']['content'];?>
					</p>
					<?php endforeach ?>
			    <?php else: ?>
					<p class = "no-comment">Chưa có nhận xét nào</p>
				<?php endif; ?>
			</div>
			<!-- add comment -->
			<h4>Gửi nhận xét:</h4>
			<?php echo $this->Form->create('Comment');?>
				<?php
					echo $this->Form->input('user_id',array('type' => 'hidden','value' => isset($user_info['id']) ? $user_info['id'] : ''));
					echo $this->Form->input('book_id',array('type' => 'hidden','value' => $book_info['Book']['id']));
					echo $this->Form->input('content', array('rows' => "5", 'class' => "col-lg-12", 'label' => false));
				?>
			  	<?php echo $this->Form->button('Gửi', array('type' => "submit", 'class' => "pull-right btn btn-primary col-lg-3" ,'onclick' => "return addComment();")); ?>
			<?php echo $this->Form->end(); ?>
	 	</div>
	</div>
</div> 
