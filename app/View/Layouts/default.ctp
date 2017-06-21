<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		
		<title>
			<?php echo $this->fetch('title'); ?>
		</title>
	
	    <!-- javascript -->
	    <?php echo $this->Html->script('jquery'); ?>
	    <?php echo $this->Html->script('bootstrap'); ?>
        <?php echo $this->Html->script('bookshop'); ?>

        <!-- css -->
        <?php echo $this->Html->css('font-awesome.min'); ?>
		<?php echo $this->Html->css('bootstrap.min'); ?>
		<?php echo $this->Html->css('bookshop'); ?>
		
		<?php
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>

	</head>
	<body>
		<div id="header">
			<?php echo $this->element('header'); ?>
		</div>
		<div id="content">
			<div class="container">
                <div class="row">
                	<div class="content col-md-9 col-sm-9 col-xs-12">
			            <?php echo $this->fetch('content'); ?>
			        </div>
			        <div class="sidebar col-md-3 col-sm-3 col-xs-12">
			        	
			        </div>
			    </div>
			</div>
		</div>
		<div id="footer">
			<?php echo $this->element('footer'); ?>
		</div>	
	</body>
</html>
