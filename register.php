<?php
	session_start();//开启会话
	
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','register');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	
	_login_state();
	//判断是否接提交了
	if($_GET['action']=='register'){
		//直接调用函数$_check_code($_first_code,$_end_code)
		_check_code($_POST['code'],$_SESSION['code']);
		
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		//每台电脑都不会产生相同的标识符
		//$_clean['uniqid']=_check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
		$_clean['username']=_check_username($_POST['username']);
		$_clean['password']=_check_password($_POST['password'],$_POST['notpassword'],6);
		$_clean['question']=_check_question($_POST['question'],2,10);
		$_clean['answer']=_check_answer($_POST['question'],$_POST['answer'],2,10);
		$_clean['sex']=$_POST['sex'];
		$_clean['face']=$_POST['face'];
		$_clean['email']=_check_email($_POST['email']);
		$_clean['qq']=_check_qq($_POST['qq']);	
		$_clean['url']=_check_url($_POST['url'],40);	
		
		//在新增之前先判断用户名是否已存在
		$res=_query("SELECT tg_username FROM tg_user WHERE tg_username='{$_clean['username']}'");
		if(mysql_fetch_array($res)){
			_alert_back('用户名已存在，请换个用户名。');
		}
		//测试是否新增用户
		mysql_query(
		"INSERT INTO tg_user(
							tg_username,
							tg_password,
							tg_question,
							tg_answer,
							tg_sex,
							tg_face,
							tg_email,
							tg_qq,
							tg_url	
							)
					VALUES(
					'{$_clean['username']}',
					'{$_clean['password']}',
					'{$_clean['question']}',
					'{$_clean['answer']}',
					'{$_clean['sex']}',
					'{$_clean['face']}',
					'{$_clean['email']}',
					'{$_clean['qq']}',
					'{$_clean['url']}'
				    )
		");
	  //获取刚刚新增的id
	  $_clean['id']=_insert_id();
	  //关闭数据库
	  _close();
	  //清除session
	  _session_destroy();
	  //生成xml
	  _set_xml('new.xml',$_clean);
	  //跳转到首页index.php
	  _location('恭喜你注册通过','index.php');
		
	}
	//每台电脑都不会产生相同的标识符
	//$_SESSION['uniqid']=$uniqid=sha1(uniqid(rand(),true));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--注册</title>
		<?php
			require ROOT_PATH."includes/title.inc.php";
		?>
		<script type="text/javascript" src="js/register.js"></script>
		<script type="text/javascript" src="js/code.js"></script>
	</head>
	<body>
		<?php 
			require ROOT_PATH."includes/header.inc.php";
		?>
		<div id="register">
			<h2>会员注册</h2>
			<!--<input type="hidden" name="uniqid" value="<?php echo $uniqid;?>" />-->
			<form action="register.php?action=register" method="post" name="register">
			<dl>
				<dt>请认真填写以下内容</dt>
				<dd>用 户 名   ：&nbsp;&nbsp;<input type="text" name="username" class="text" />(*必填，不少于2位)</dd>
				<dd>密        码 ：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" class="text" />(*必填，不少于6位)</dd>
				<dd>确认密码  ：<input type="password" name="notpassword" class="text" />(*必填，不少于6位)</dd>
				<dd>密码提示  ：<input type="text" name="question" class="text" />(*同上)</dd>
				<dd>密码回答  ：<input type="text" name="answer" class="text" />(*必填，不少于4位)</dd>
				<dd>  性别   ：<input type="radio" name="sex" value="男" checked="true" />男
						<input type="radio" name="sex" value="女" />女
				</dd>
				<!--<dd class="face">
					<img src="face/1.jpg" alt="头像选择" 
						onclick="javascript:window.open('face.php','face',
						'width=400,height=400,top=0,left=0,scrollbars=1')"/>
					</dd>-->
				<dd class="face">
					<input type="hidden" name="face" value="face/1.jpg" />
					<img src="face/1.jpg" alt="头像选择" id="faceimg"/>
				</dd>
				<dd>邮  箱：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" class="text" />(*必填，用于激活。)</dd>
				<dd>Q Q：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="qq" class="text" /></dd>
				<dd>主页地址：&nbsp;<input type="text" name="url" class="text" value="http://"/></dd>
				<dd>验证码：&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="code" class="yzm"/><img src="code.php" id="code"/>
					<!--<img src="code.php" id="code" onclick="javascript:this.src='code.php?tm='+Math.random()"/>-->
				</dd>
				<dd><input type="submit" value="注册" class="submit"/></dd>
			</dl>
			</form>
		</div>
		<!--头尾分离-->
		<?php
			require ROOT_PATH."includes/footer.inc.php";	
		?>
	</body>
</html>
