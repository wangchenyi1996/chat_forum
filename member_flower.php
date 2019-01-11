<?php
	//session_start();
	//error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','member_flower');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";
	//判断是否登录状态
	if(!isset($_COOKIE['username'])){
		_alert_back('请先登录');
	}
	//批量删除短信
	if(!empty($_GET['action'])=='delete'&& isset($_POST['ids'])){
		$_clean=array();
		$_clean['ids']=implode(',',$_POST['ids']);
		_query("DELETE FROM tg_flower WHERE tg_id IN ({$_clean['ids']})");
		 //关闭数据库
		  _close();
		  //清除session
		  _session_destroy();
		  //跳转到首页member.php
		  _location('删除花朵成功','member_flower.php');
	 }
	
	
	//分页模块
	global $_pagenum,$_pagesize;
	page("SELECT tg_id FROM tg_flower",8);//参数1表示总的条数，参数二表示每页多少条	
	//调用函数来完成
	$result=_query("SELECT tg_id,tg_touser,tg_from_touser,tg_flowers,tg_content,tg_time FROM tg_flower ORDER BY tg_time DESC limit $_pagenum,$_pagesize");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--花朵列表</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script src="js/member_message.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
		#page_num{
			height: 20px;
			clear: both;
			padding: 10px 0;
			position: relative;
		}
		
		#page_num ul{
			position: absolute;
			right: 10px;
			height: 20px;
		}
		
		#page_num ul li{
			float: left;
			width: 24px;
			height: 24px;
			margin-left: 5px;
		}
		
		#page_num ul li a{
			display: block;
			width: 20px;
			height: 20px;
			line-height: 20px;
			border: 1px solid #333;
			text-align: center;
			text-decoration: none;
		}
		
		#page_num ul li a:hover,#page_num ul li a.selected{
			background: #666;
			color: #fff;
			font-weight: bold;
		}
		</style>

	</head>
	<body>
		<?php require ROOT_PATH."includes/header.inc.php";?>
		<div id="member">
			<?php require ROOT_PATH."includes/member.inc.php";?>
			<div id="member_main">
				<h2>花朵管理中心</h2>
				<form action="member_flower.php?action=delete" method="post">
				<table>
					<tr><th>送花人</th><th>花朵数目</th><th>感言</th><th>时间</th><th>操作</th></tr>
					<?php while(!!$rows=_fetch_array_list($result)){
						 $_html=array();
						 $_html['id']=$rows['tg_id'];
					   	 $_html['from_touser']=$rows['tg_from_touser'];
					   	 $_html['flowers']=$rows['tg_flowers'];
					   	 
					   	 $_html['content']=$rows['tg_content'];	
					   	 $_html['time']=$rows['tg_time'];
					?>
					<tr><td><?php echo $_html['from_touser']?></td>
						<td><img src="img/4.jpg"/>x <?php echo $_html['flowers']?>朵</td>
						<td>
							<a title="<?php echo $_html['content']?>">
							<?php echo $_html['content']?></a>
						</td>
						<td><?php echo $_html['time']?></td>
						<td><input type="checkbox" name="ids[]" value="<?php echo $_html['id']?>"/></td></tr>  	
					<?php }
						_free_result($result);
					?>
					<tr><td colspan="5">
						<label>全选&nbsp;
							<input type="checkbox" name="checkall" id="all" />
							<input type="submit" value="批删除" />
					</label></td></tr>
				</table>
				</form>
				<?php //参数1表示数字分页，参数二表示文本分页
					_page(1);
					_page(2);
				?>
			</div>
		</div>
		
		<?php require ROOT_PATH."includes/footer.inc.php";?>
	</body>
</html>