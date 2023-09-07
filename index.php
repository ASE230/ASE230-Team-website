<?php require_once("./data.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Our amazing team</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		$authorString = "";
		for ($i = 0; $i < count($people); $i++) {
			if ($i + 1 == count($people)) {
				$authorString = $authorString . $people[$i] . ".";
			} else {
				$authorString = $authorString . $people[$i] . " and ";
			}
		}
	?>
	<meta name="description" content="Resume for <?= $authorString ?>">
	<meta name="author" content="<?= $authorString ?>">
	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<script defer src="assets/fontawesome/js/all.min.js"></script>
	<link id="theme-style" rel="stylesheet" href="assets/css/pillar-1.css">
</head>

<body>
	<article class="resume-wrapper text-center position-relative">
		<div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
			<h1 class="py-4 text-center">OUR AMAZING TEAM</h1>
			<?php foreach ($data as $name => $person) { ?>
				<header class="resume-header mt-4 pt-4 pt-md-0">
					<div class="row">
						<div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
							<img class="picture" src="<?= $person["general"]['avatarURL'] ? $person["general"]['avatarURL'] : "assets/images/profile.jpg" ?>" alt="">
						</div>
						<div class="col">
							<div class="row p-4 justify-content-center justify-content-md-between">
								<div class="primary-info col-auto">
									<h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase">
										<?= $person["general"]['name'] ?>
									</h1>
									<div class="title mb-3"><?= $person["general"]['title'] ?></div>
									<a href="<?= "./detail.php?person=" . $name ?>" class="btn btn-secondary">See full profile</a>
								</div>
								<div class="secondary-info col-auto mt-2">
								</div>
							</div>
						</div>
					</div>
				</header>
			<?php } ?>
		</div>
	</article>

	<footer class="footer text-center pt-2 pb-5">
		<small class="copyright">
			Designed with <span class="sr-only">love</span><i class="fas fa-heart"></i> by
			<?php
				for ($i = 0; $i < count($people); $i++) {
					if ($i + 1 == count($people)) {
						echo $people[$i] . ".";
					} else {
						echo $people[$i] . " and ";
					}
				}
			?>
		</small>
	</footer>
</body>

</html>