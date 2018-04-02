<?php if (!defined('THINK_PATH')) exit();?>
id ---- username ---- password<br/>
<?php if(!$error): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i; echo ($da["id"]); ?> ---- <?php echo ($da["username"]); ?>---- <?php echo ($da["password"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>

<?php else: ?> no result<?php endif; ?>