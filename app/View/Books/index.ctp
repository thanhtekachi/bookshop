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
                            <?php echo $this->html->image($books[$n]['Book']['image']);?>
                            <div class = "info" style ="text-align:center;">
                                <h5><?php echo $this->Html->link($books[$n]['Book']['title'],'/'.$books[$n]['Book']['slug']); ?></h5>
                                <p class = "writer">Tác giả: <?php echo h($books[$n]['Writer'][0]['name']); ?></p>
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
                            <?php echo $this->html->image($books[$n]['Book']['image']);?>
                                <div class = "info" >
                                    <h5><?php echo $this->Html->link($books[$n]['Book']['title'],'/'.$books[$n]['Book']['slug']); ?></h5>
                                    <p class = "writer">Tác giả: <?php echo h($books[$n]['Writer'][0]['name']); ?></p>
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
                            <?php echo $this->html->image($books[$n]['Book']['image']);?>
                                <div class = "info" style ="text-align:center;">
                                    <h5><?php echo $this->Html->link($books[$n]['Book']['title'],'/'.$books[$n]['Book']['slug']); ?></h5>
                                    <p class = "writer">Tác giả: <?php echo h($books[$n]['Writer'][0]['name']); ?></p>
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