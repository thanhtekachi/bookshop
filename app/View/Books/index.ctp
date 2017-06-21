<!-- Show 12 best-selling books -->
<div class="box-index">
    <div id="Carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <?php for ($n=0; $n <4 ; $n++) { ?>
                        <div class="col-md-3">
                            <?php echo $this->html->image($hot_book[$n]['Book']['image']);?>
                            <div class = "info" style ="text-align:center;">
                                <h5><?php echo $this->Html->link($hot_book[$n]['Book']['title'],'/'.$hot_book[$n]['Book']['slug']); ?></h5>
                                <p class = "writer">Tác giả: <?php echo h($hot_book[$n]['Writer'][0]['name']); ?></p>
                            </div>
                        </div>  
                    <?php }?>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
            <div class="item">
                <div class="row">
                    <?php for ($n=4; $n <8 ; $n++) { ?>
                        <div class="col-md-3">
                            <?php echo $this->html->image($hot_book[$n]['Book']['image']);?>
                                <div class = "info" >
                                    <h5><?php echo $this->Html->link($hot_book[$n]['Book']['title'],'/'.$hot_book[$n]['Book']['slug']); ?></h5>
                                    <p class = "writer">Tác giả: <?php echo h($hot_book[$n]['Writer'][0]['name']); ?></p>
                                </div>
                        </div>  
                    <?php }?>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
            <div class="item">
                <div class="row">
                    <?php for ($n=8; $n <12 ; $n++) { ?>
                        <div class="col-md-3">
                            <?php echo $this->html->image($hot_book[$n]['Book']['image']);?>
                                <div class = "info" style ="text-align:center;">
                                    <h5><?php echo $this->Html->link($hot_book[$n]['Book']['title'],'/'.$hot_book[$n]['Book']['slug']); ?></h5>
                                    <p class = "writer">Tác giả: <?php echo h($hot_book[$n]['Writer'][0]['name']); ?></p>
                                </div>
                        </div>  
                    <?php }?>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
        </div>
        <!--.carousel-inner-->
        <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a> <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
    </div>
</div>

<!-- show book by category -->
<?php foreach ($list_category as $category) { ?>     
    <div class="box-index" >
        <h4><?php echo $this->Html->link($category['Category']['name'],'/categories/' . $category['Category']['slug']); ;?></h4>
        <div class="row">
            <?php $count_book = 0; ?>
            <?php foreach($list_book_category as $category_book) { 
                if ($category_book['Book']['category_id'] === $category['Category']['id'] && $count_book < 8) { ?>
                    <div class="thumbnail col-md-3 col-sm-3 col-xs-6">          
                        <div class="caption">
                            <h5><?php echo $this->Html->link($category_book['Book']['title'],'/'.$category_book['Book']['slug']); ?></h5>
                            <p>Giá : <?php echo $category_book['Book']['sale_price'];?></p>
                            <p>Nhà xuất bản : <?php echo $category_book['Book']['publisher'];?></p>
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-shopping-cart"></span> Đặt Mua </button>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->html->image($category_book['Book']['image'], array('width' => '150px','height'=>'100px'));?>
                    </div>
            <?php $count_book++ ; }} ?>
        </div>
    </div>
<?php }?>