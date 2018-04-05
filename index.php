<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bootstrap Dropdown Menu</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
	header {width:100%; height:auto; float:left;}
</style>
<body>
	<div class="container">
	<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      	<?
		try{
		$db = new PDO('mysql:host=localhost;dbname=db_adi', 'username', 'user_pass');
		}catch(PDOException $err){
		echo 'bağlantı hatası ' . $err;
		}
	

		$menuler = $db->query('SELECT * FROM menuler where ust_menu=1 limit 20'); // Sadece Üst Menü Olanları Getiriyor.
		foreach ($menuler as $key => $value) {	
		?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$value[menu_adi];?>
        </a>
		<? $altmenuler = $db->query("SELECT * FROM menuler where ust_menu_id='$value[id]'"); $altmenu_sayisi = $altmenuler->rowCount(); // Üst Menü id'si yukarıda çekmiş olduğumuz menü id'sine bağlı olanları getiriyor.
			if($altmenu_sayisi>0){ ?>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		        	<? foreach ($altmenuler as $key => $value2) {?>
		        		 <a class="dropdown-item" href="#"><?=$value2[menu_adi];?></a>
		        	<? } ?>
		        </div>
        	<? } ?>
      </li>
      <? } ?>
    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
	</header>
	</div>
</body>
</html>


