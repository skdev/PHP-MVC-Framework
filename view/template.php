<?php
	$pageContents = "";
	
	if(isset($_SESSION['pageContents'])) {
		$content = $_SESSION['pageContents'];
	} else {
		echo "No content to show.";
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP-MVC-Framework</title>
	<link rel="stylesheet" href="<?= $BASE_ASSETS ?>/view/assets/css/style.css">
	<script src="<?= $BASE_ASSETS ?>/view/assets/js/jquery-3.3.1.js"></script>
  </head>
  <body id="top">	 
    <main>
		<!-- Page Content -->
		<?php
			include $content;
		?>
		<!-- Page Content End -->
      </div>
    </main>
    <footer>
      <div class="container">
        &copy; 2019 - All Rights Reserved.
        <span class="right"><a href="#top">Back to top</a></span>
      </div>
    </footer>
  </body>
</html>