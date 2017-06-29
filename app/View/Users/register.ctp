<style>
.button-register {
    margin: auto;
    width: 60%;
    padding: 10px;
}
</style>

<div class="panel panel-info">
	<h4 class="panel-heading"><i class="glyphicon glyphicon-user"></i> Đăng ký</h4>
	<!--  <?php if (empty($user_info)): ?> -->
			<?php echo $this->Form->create('User',array('novalidate' => true))?>
				
			    <?php echo $this->Form->input('firstname', array('label' => 'First Name' )); ?>

			    <?php echo $this->Form->input('lastname', array('label' => 'Last Name' )); ?>
			  
			    <?php echo $this->Form->input('username', array('label' => 'Username')); ?>

			    <?php echo $this->Form->input('password', array('label' => 'Password' )); ?>
			
			    <?php echo $this->Form->input('email', array('label' => 'Email')); ?>
			
			    <?php echo $this->Form->input('address', array('label' => 'Address')); ?>
			
			    <?php echo $this->Form->input('phone_number', array('label' => 'Phone')); ?>
				
				<div class="button-register">
				  <?php echo $this->Form->button('Đăng ký', array('type'=>"submit", 'class'=>"btn btn-success btn-block",'span'=>"glyphicon glyphicon-off")); ?>
				</div>
			<?php echo $this->Form->end(); ?>
		<?php else: ?>
			<!-- Bạn đã đăng nhập, click vào <?php echo $this->Html->link('đây','/'); ?> để quay về trang chủ. -->
		<?php endif ?>
</div>

