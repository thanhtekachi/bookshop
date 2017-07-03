<div class="panel panel-info">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-user"></i> Đăng nhập</h4>
	<?php echo $this->Form->create('User',array('action' => "login",'label' => false)); ?>
			<?php echo $this->Form->input('username',array('placeholder' => "Tên đăng nhập",'label' => 'Username')); ?>
			<?php echo $this->Form->input('password',array('placeholder' => "Mật khẩu",'label' => 'Password')); ?>
			<div class="control-group">
			    <div class="controls">
			      <hr>			      
			      <?php echo $this->Form->button('Đăng nhập',array('type'=>"submit", 'class'=>"col-lg-2 btn btn-primary")); ?>
			      <?php echo $this->Html->link('Bạn quên mật khẩu?','/quen-mat-khau',array('class'=>'forgot')); ?>
			    </div>
			</div>
	    <?php echo $this->Form->end(); ?>
</div>