<!DOCTYPE html>
<?php
include("./sql.php");
include("./verify.php");

if(isset($_POST['btn']) && $_POST['address'] & $_POST['port'] && $_POST['method'] && $num > 0)
{
  $ip = htmlentities($_POST['address'], ENT_QUOTES);
  $port = htmlentities($_POST['port'], ENT_QUOTES);
  $method = htmlentities($_POST['method'], ENT_QUOTES);
  $methodb = $odb->prepare("SELECT `url` FROM `methods` WHERE `id`=? AND `enabled`=1 LIMIT 1");
  $methodb->execute(array($method));
  $takeattack = $odb->prepare("UPDATE `ip_whitelist` SET `num_attacks`=`num_attacks`-1 WHERE `ip`=?");
  $takeattack->execute(array($_SERVER['REMOTE_ADDR']));
  $url = $methodb->fetchColumn();
  $array1 = ['[IP]', '[PORT]'];
  $array2 = [$ip, $port];
  $new_url = str_replace($array1, $array2, $url);
  //exec($new_url);
  //echo $new_url;

}
?>
<html>
<title>Daddy Malicious' Booter</title>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="../../../../favicon.ico" rel="icon">
	<link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet"><!-- Custom styles for this template -->
	<link href="starter-template.css" rel="stylesheet">
</head>
<body>
	<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">K-STRESS</a> <button aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarsExampleDefault" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				<li class="nav-item dropdown">
					<a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="http://example.com" id="dropdown01">Dropdown</a>
					<div aria-labelledby="dropdown01" class="dropdown-menu">
						<a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input aria-label="Search" class="form-control mr-sm-2" placeholder="Search" type="text"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>-->
	<main class="container" role="main">
		<div class="starter-template">
      <center><img src='https://images-ext-1.discordapp.net/external/kvyt2f5g_ANAE7g3Q-PuRQwPj1SQCuCR1Dy8c5klxeI/https/image.prntscr.com/image/kauqWse0RQKSOMvlQtbg4w.png'></img></center>
      <h1>Welcome to Daddy Malicious' Booter</h1><br />
      <h5>Try out Daddy's servers for 1 minute, on the house! You have: <?php echo $num; ?> free attacks left</h5>
			<form method='post' action='./index.php'>
        <div class='form-group'>
          <label class='label label-primary'>Address</label>
          <input class='form-control' type='text' name='address' placeholder='127.0.0.1'></input>
        </div>
        <div class='form-group'>
          <label class='label label-primary'>Port</label>
          <input class='form-control' type='text' name='port' placeholder='80'></input>
        </div>
        <div class='form-group'>
          <label class='label label-primary'>Method</label>
          <select class='form-control' name='method'>

            <?php
            $stmt = $odb->query("SELECT * FROM `methods` WHERE `enabled`=1");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
              ?>
              <option value='<?php echo $row['id']; ?>'><?php echo $row['name']; ?></option>
              <?php
            }
            ?>

          </select>

        </div>
        <div class='form-group'>

          <input class='btn btn-primary' name='btn' type='submit' value='Send'></input>
        </div>
      </form>
		</div>
	</main><!-- /.container -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
	</script>
	<script>
	window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
	</script>
	<script src="../../../../assets/js/vendor/popper.min.js">
	</script>
	<script src="../../../../dist/js/bootstrap.min.js">
	</script>
	<script type="text/javascript">
	function d_log(s) {
	               var ev = document.createEvent('events');
	               ev.initEvent('heartbeat_log', true, false);
	               document.body.setAttribute('heartbeat_attrib', s);
	               document.dispatchEvent(ev);
	           };
	</script>
	<div id="heartbeat_msg_wrap"></div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js">
	</script>
</body>
</html>
