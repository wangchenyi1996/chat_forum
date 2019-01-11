<?php
	session_start();//开启会话
	
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','member_modify');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//修改资料
	if($_GET['action']=='modify'){
		_check_code($_POST['code'],$_SESSION['code']);//验证验证码
		if(_fetch_array("SELECT tg_id FROM tg_user WHERE tg_username='{$_COOKIE['username']}' limit 1")){
			//引入验证函数
			include ROOT_PATH."includes/register.func.php";	
			$_clean=array();
			$_clean['password']=_check_modify_password($_POST['password'],6);
			$_clean['sex']=$_POST['sex'];
			$_clean['face']=$_POST['face'];
			$_clean['email']=_check_email($_POST['email']);
			$_clean['qq']=_check_qq($_POST['qq']);	
			$_clean['url']=_check_url($_POST['url'],40);
			$_clean['switch']=$_POST['switch'];
			$_clean['autograph']=_check_autograph($_POST['autograph'],200);
			
			//修改资料
			if(empty($_clean['password'])){
				_query("UPDATE tg_user SET
										tg_sex='{$_clean['sex']}',
										tg_face='{$_clean['face']}',
										tg_email='{$_clean['email']}',
										tg_qq='{$_clean['qq']}',
										tg_url='{$_clean['url']}',
										tg_switch='{$_clean['switch']}',
										tg_autograph='{$_clean['autograph']}'
								   WHERE
								   		tg_username='{$_COOKIE['username']}' 
					 ");
			}else{
				_query("UPDATE tg_user SET
										tg_password='{$_clean['password']}',
										tg_sex='{$_clean['sex']}',
										tg_face='{$_clean['face']}',
										tg_email='{$_clean['email']}',
										tg_qq='{$_clean['qq']}',
										tg_url='{$_clean['url']}',
										tg_switch='{$_clean['switch']}',
										tg_autograph='{$_clean['autograph']}'
								   WHERE
								   		tg_username='{$_COOKIE['username']}' 
					 ");
			}
			//判断是否修改成功
			//关闭数据库
			  _close();
			  //清除session
			  _session_destroy();
			  //跳转到首页member.php
			  _location('恭喜你修改成功','member.php');
		}		
	}
	
	
	//是否正常登陆
	if(isset($_COOKIE['username'])){
	   //获取数据
	   $rows=_fetch_array("SELECT tg_switch,tg_autograph,
	   							  tg_username,tg_sex,
	   							  tg_face,tg_email,tg_url,
	   							  tg_qq FROM tg_user 
	   							  WHERE tg_username='{$_COOKIE['username']}'");
	   if($rows){
	   	 $_html=array();
	   	 $_html['username']=$rows['tg_username'];
	   	 $_html['sex']=$rows['tg_sex'];
	   	 $_html['face']=$rows['tg_face'];
	   	 $_html['email']=$rows['tg_email'];
	   	 $_html['url']=$rows['tg_url'];
	   	 $_html['qq']=$rows['tg_qq'];
	   	 $_html['switch']=$rows['tg_switch'];
	   	 $_html['autograph']=$rows['tg_autograph'];
	   	 $_html=_html($_html);
	   	 
	   	 //性别选择
	   	 if($_html['sex']=='男'){
	   	 	$_html['sex_html']='<input type="radio" name="sex" value="男" checked="checked" />男
	   	 						<input type="radio" name="sex" value="女" />女';
	   	 }elseif($_html['sex']=='女'){
	   	 	$_html['sex_html']='<input type="radio" name="sex" value="女" checked="checked" />女
	   	 						<input type="radio" name="sex" value="男" />男';
	   	 }
	   	 
	   	 //头像选择
	   	 $_html['face_html']='<select name="face">';
	   	 foreach(range(1,20) as $i){
	   	 	if($_html['face']=='face/'.$i.'.jpg'){
	   	 		$_html['face_html'].='<option value="face/'.$i.'.jpg" selected="selected">face/'.$i.'.jpg</option>';
	   	 	}else{
	   	 		$_html['face_html'].='<option value="face/'.$i.'.jpg">face/'.$i.'.jpg</option>';
	   	 	}
	   	 	
	   	 }
	   	 $_html['face_html'].='</select>';
	   	 
	   	 //签名开关
	   	 if($_html['switch']==1){
	   	 	$_html['switch_html']='<input type="radio" checked="checked" name="switch" value="1"/>启用
								  <input type="radio" name="switch" value="0"/>禁用';
	   	 }elseif($_html['switch']==0){
	   	 	$_html['switch_html']='<input type="radio" name="switch" value="1"/>启用
								  <input type="radio" checked="checked" name="switch" value="0"/>禁用';
	   	 }
	   	 
	   	 
	   	 
	   }else{
	   	_alert_back('此用户不存在');
	   }
	   
	}else{
		_alert_back("非法登录。");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--个人中心</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script type="text/javascript" src="js/code.js"></script>
		<script type="text/javascript" src="js/member_modify.js"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="member">
			<?php require ROOT_PATH."includes/member.inc.php";?>	
			<div id="member_main">
				<h2>会员管理中心</h2>
				<form  name="modify" action="member_modify.php?action=modify" method="post">
					<dl>
					<dd>用 户 名：	<?php echo $_html['username'];?></dd>
					<dd>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" class="text" name="password"/>(留空则不修改)</dd>
					<dd>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $_html['sex_html'];?></dd>
					<dd>头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像：<?php echo $_html['face_html'];?></dd>
					<dd>电子邮件：<input type="text" class="text" name="email" value="<?php echo _html($_html['email']);?>"/></dd>
					<dd>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页：<input type="text" class="text" name="url" value="<?php echo $_html['url'];?>"/></dd>
					<dd>Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q：<input type="text" class="text" name="qq" value="<?php echo $_html['qq'];?>"/></dd>
					<dd>个性签名：<?php echo $_html['switch_html']?>
						<!--<input type="radio" name="switch" value="1"/>启用
						<input type="radio" name="switch" value="0" checked="checked"/>禁用-->
						<p><textarea name="autograph"><?php echo $_html['autograph']?></textarea></p>
					</dd>
					<dd>验证码：&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="code" class="text yzm"/><img src="code.php" id="code"/>
						<input type="submit" value="修改资料" class="submit"/>
					</dd>
					
				</dl>
				</form>
			</div>
		</div>
		
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>