﻿<?php 
//登录处理界面 logincheck.php
//判断是否按下提交按钮
 if(isset($_POST["submit"]) && $_POST["submit"] == "登陆") 
 { 
 //将用户名和密码存入变量中，供后续使用
 $user = $_POST["username"]; 
 $psw = $_POST["userpwd"]; 
 if($user == "" || $psw == "") 
 {
 //用户名或者密码其中之一为空，则弹出对话框，确定后返回当前页的上一页 
 echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>"; //-1上一个页面，1前进一个页面
 } 
 else 
 { //确认用户名密码不为空，则连接数据库
 $conn = mysqli_connect("localhost","root","123456");//数据库帐号密码为安装数据库时设置
 if(mysqli_errno($conn)){
 echo mysqli_errno($conn);
 exit;
 }
 mysqli_select_db($conn,"userdb"); 
 mysqli_set_charset($conn,'utf8'); 
 $sql = "select username,userpwd from user where username = '$user' and userpwd = '$psw'"; 
 $result = mysqli_query($conn,$sql); 
 $num = mysqli_num_rows($result); 
 if($num) 
 { 
 echo "<script>alert('成功登录'); window.location.href='index.php';</script>"; 
 } 
 else 
 { 
 echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>"; 
 } 
 } 
 } 
 else 
 { 
 echo "<script>alert('提交未成功！');</script>"; 
 } 
 
?> 