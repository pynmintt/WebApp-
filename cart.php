<?php
	ob_start();
	session_start();
	$conn=mysqli_connect("localhost","root","12345678","static_shop");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('MHome_2.png','MProduct_2.png','MCart_2.png','MUser_2.png','MAbout_2.png','MSignup_2.png','MSignin_2.png')">
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="2"><img src="Header.png" width="1363" height="194" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
  <?php
		if($_SESSION["name"]=="")
		{
	?>
    <a href="signup.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MSignup','','MSignup_2.png',1)"><img src="MSignup_1.png" name="MSignup" width="140" height="71" id="MSignup" />&nbsp;&nbsp;</a>
    
    <a href="signin.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MSignin','','MSignin_2.png',1)"><img src="MSignin_1.png" name="MSignin" width="140" height="71" id="MSignin" /></a>
  <?php
		}
		else
		{
			echo $_SESSION["name"];
	?>
    
    <a href="logout.php"><img src="MLogout.png" width="142" height="71" /></a>
  <?php
		}
	?>
    </td>
  </tr>
  <tr>
    <td width="336"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MHome','','MHome_2.png',1)"><img src="MHome_1.png" name="MHome" width="330" height="80" id="MHome" /></a></td>
      </tr>
      <tr>
        <td><a href="product.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MProduct','','MProduct_2.png',1)"><img src="MProduct_1.png" name="MProduct" width="330" height="80" id="MProduct" /></a></td>
      </tr>
      <tr>
        <td><a href="cart.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MCart','','MCart_2.png',1)"><img src="MCart_1.png" name="MCart" width="330" height="80" id="MCart" /></a></td>
      </tr>
      <tr>
        <td><a href="user.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MUser','','MUser_2.png',1)"><img src="MUser_1.png" name="MUser" width="330" height="80" id="MUser" /></a></td>
      </tr>
      <tr>
        <td><a href="about.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('MAbout','','MAbout_2.png',1)"><img src="MAbout_1.png" name="MAbout" width="330" height="80" id="MAbout" /></a></td>
      </tr>
    </table></td>
    <td width="1027" align="center" valign="top"><p>ตะกร้าของคุณ</p>
      <table width="80%" border="1" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <th scope="col">รหัสสินค้า</th>
        <th scope="col">ชื่อสินค้า</th>
        <th scope="col">ราคาสินค้า</th>
        
      </tr>
  <?php
	  
      $strSQL = "SELECT * FROM `product` INNER JOIN cart ON product.ProductID=cart.ProductID WHERE cart.UserID=".$_SESSION['user'];
      $objQuery = mysqli_query($conn,$strSQL);
	    $total=0;
	  
	  while($row=mysqli_fetch_array($objQuery))
	  {
  ?>
      <tr>
        <td><?=$row['ProductID']?></td>
        <td><?=$row['NameOfProduct']?></td>
        <td><?=$row['SellingPice']?> บาท</td>
        
      </tr>
      
  <?php
	  $total=$total+$row['SellingPice'];
	  }
	?>
      <tr>
        <td colspan="2" align="right">รวมเป็นเงิน</td>
        <td><?=$total?></td>
      </tr>
    </table>
      <form id="form1" name="form1" method="post" action="order.php">
        <p>
          <input name="UserID" type="hidden" id="UserID" value="<?=$_SESSION['user']?>" />
        </p>
        <p>
          <input type="submit" name="btnbuy" id="btnbuy" value="ยืนยันการสั่งซื้อ" />
        </p>
      </form>
      <p>รายการการสั่งซื้อ</p>
      <table width="80%" border="1" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <th scope="col">รหัสคำสั่งซื้อ</th>
          <th scope="col">รหัสสินค้า</th>
          <th scope="col">ชื่อสินค้า</th>
          <th scope="col">ราคาสินค้า</th>
        </tr>
  <?php
	  
      $strSQL = "SELECT * FROM `product` INNER JOIN mart ON product.ProductID=mart.ProductID WHERE mart.UserID=".$_SESSION['user'];
      $objQuery = mysqli_query($conn,$strSQL);
	    $total=0;
	  
	  while($row=mysqli_fetch_array($objQuery))
	  {
	?>
        <tr>
          <td><?=$row['OrderID']?></td>
          <td><?=$row['ProductID']?></td>
          <td><?=$row['NameOfProduct']?></td>
          <td><?=$row['SellingPice']?>
            บาท</td>
        </tr>
  <?php
	  $total=$total+$row['SellingPice'];
	  }
	?>
        <tr>
          <td colspan="2" align="right">รวมเป็นเงิน</td>
          <td><?=$total?></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
