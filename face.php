<?php
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','face');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--头像选择</title>
		<?php 
			require ROOT_PATH."includes/title.inc.php";
		?>
		<script type="text/javascript" src="js/opener.js"></script>
	</head>
	<body>
		<div id="face">
			<h3>头像选择</h3>
			<dl>
				<?php foreach(range(1,20) as $i){?>
				<!--<dd><img src="face/<?php echo $i?>.jpg" alt="头像<?php echo $i?>" onclick="_opener(this.src);"/></dd>-->
				<dd><img src="face/<?php echo $i?>.jpg" title="头像<?php echo $i?>" alt="face/<?php echo $i?>.jpg"/></dd>
				<?php }?>
					
			</dl>
		</div>
	</body>
</html>
	