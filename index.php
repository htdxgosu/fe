<?php
include("Class/clsJoke.php");
$p= new Jokes();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joke</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
</head>
<body>
<div class="container">
<!-- header -->
  <header class="row col-xs-12" style="height:230px">
   <div class="row col-xs-12" style="height:70px">
       <div class="col">
       <img src="img/logo.jpg" style="height:60px;width:60px;margin-left:60px"/>
       </div>
        <div class="col">
          <div class="row">
            <div class="col">
             <span style="color:#999;float:right;margin-top:15px"><i>Handicrafted by</i> <br /> <h6>Jim HLS</h6>
              </span>
            </div>
            <div class="col">
              <img src="img/hoa.jpg" style="height:60px;width:60px;float:left" />
            </div>
          </div>
       </div>
   </div>
    <div class="row" style="height:160px;background-color: rgb(41,179,99);color:#FFF;">
     <h2 style="padding-top:40px;">A joke a day keeps the doctor away</h2>
     <span style="padding-bottom:60px;">If you joke wrong way, your teeth have to pay. (Serious)</span>
   </div>
  </header>
  <!-- content -->
  <main class="row col-xs-12" style="height:390px">
        <div class="row col-xs-12" style="height:195px""> 
         <div class="col-lg-3">
         </div>
         <div class="col-lg-6" style="padding-top:50px;background-color:rgb(252,252,252)">
              <p style="color:rgb(100,100,100);text-align:left">
                    <?php
						  $link=$p->connect();
						  $sql="SELECT id, text FROM jokes order by rand() limit 1";
						  $ketqua=mysql_query($sql,$link);
						  $i=mysql_num_rows($ketqua);
						  if($i>0)
						  {
							  while($row=mysql_fetch_array($ketqua))
							  {
								  $text=$row['text'];
								  $id=$row['id'];
								  echo $text;
							  }
					       }
					   switch($_POST['btn']){
						   case '    This is Funny!':
						   {
	 						   if($p->updateVote("UPDATE jokes SET likes = likes + 1 WHERE id =$id")==1)
							   {
								   setcookie("voted","like", time() + (86400 * 30), "/");
							   }
 							   break;
						   }
						    case 'This is not funny.':
						   {
							   if($p->updateVote("UPDATE jokes SET dislikes = dislikes + 1 WHERE id =$id")==1)
							   {
							       setcookie("voted","dislike", time() + (86400 * 30), "/");
							   }
							   break;
						   }
					   }
                     ?>
              </p>
         </div>
         <div class="col-lg-3">
         </div>
         </div>
         <div class="row col-xs-12" style="height:195px">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                      <form id="form1" name="form1" method="post" action="" style="padding-top:30px">
                      <input class="btn" type="submit" name="btn" id="btn" value="    This is Funny!     "
                       style="background-color:rgb(44,126,219);box-shadow:0px 2px 1px #333333"/>
                      <input class="btn" type="submit" name="btn" id="btn" value="This is not funny.     "
                       style="background-color:rgb(41,179,99);box-shadow:0px 2px 1px #333333"/>
                       </form>
            </div>
            <div class="col-lg-3">
            </div>
         </div>

  </main>
  <!-- footer -->
  <footer class="row col-xs-12" style="height:130px">
         <hr style="border-color:#333;">
         <div class="row">
         <div class="col-lg-3">
         </div>
         <div class="col-lg-6">
              <p style="font-size:14px">
                  Lorem ipsum dolor sit amet. Qui reprehenderit perferendis aut modi omnis nam mollitia earum est perferendis veritatis est 
                  porro molestiae aut vero possimus! Sit repellendus consequatur est asperiores laborum et voluptas nisi.
              </p>
         </div>
         <div class="col-lg-3">
         </div>
       </div>
       <h6>Copyright 2023</h6>
  </footer>
</div>
</body>
</html>