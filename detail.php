<?php
	require_once('./data.php');

	$name = $_GET['person'];
	$person = $data[$name];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $person['general']['name'] ?>'s Resume</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?= $person['general']['name'] ?>'s resume">
	<meta name="author" content="<?= $person['general']['name'] ?>">
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<script defer src="assets/fontawesome/js/all.min.js"></script>
	<link id="theme-style" rel="stylesheet" href="assets/css/pillar-1.css">
</head>

<body>
	<article class="resume-wrapper text-center position-relative">
		<div class="mb-4"><a href="./index.php" class="btn btn-primary">Back to index</a></div>
		<div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
			<header class="resume-header pt-4 pt-md-0">
				<div class="row">
					<div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
						<img class="picture" src="<?= $person['general']['avatarURL'] ?>" alt="">
					</div><!--//col-->
					<div class="col">
						<div class="row p-4 justify-content-center justify-content-md-between">
							<div class="primary-info col-auto">
								<h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><?= $person['general']['name'] ?></h1>
								<div class="title mb-3"><?= $person['general']['title'] ?></div>
								<ul class="list-unstyled">
									<li class="mb-2"><a class="text-link" href="mailto:<?= $person['general']['email'] ?>"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i><?= $person['general']['email'] ?></a></li>
									<li><a class="text-link" href="tel:<?= $person['general']['phone'] ?>"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i><?= $person['general']['phone'] ?></a></li>
								</ul>
							</div><!--//primary-info-->
							<div class="secondary-info col-auto mt-2">
								<ul class="resume-social list-unstyled">
									<li class="mb-3"><a class="text-link" href="https://linkedin.com/in/<?= $person['links']['LinkedIn'] ?>"><span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span>linkedin.com/in/<?= $person['links']['LinkedIn'] ?></a></li>
									<li class="mb-3"><a class="text-link" href="https://github.com/<?= $person['links']['GitHub'] ?>"><span class="fa-container text-center me-2"><i class="fab fa-github-alt fa-fw"></i></span>github.com/<?= $person['links']['GitHub'] ?></a></li>
									<?php if ($person['links']['Website']) { ?>
										<li><a class="text-link" href="https://<?= $person['links']['Website'] ?>"><span class="fa-container text-center me-2"><i class="fas fa-globe"></i></span><?= $person['links']['Website'] ?></a></li>
									<?php } ?>
								</ul>
							</div><!--//secondary-info-->
						</div><!--//row-->

					</div><!--//col-->
				</div><!--//row-->
			</header>
			<div class="resume-body p-5">
				<section class="resume-section summary-section mb-5">
					<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Summary</h2>
					<div class="resume-section-content">
						<p class="mb-0"><?= $person['general']['summary'] ?></p>
					</div>
				</section><!--//summary-section-->
				<div class="row">
					<div class="col-lg-9">
						<section class="resume-section experience-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
							<div class="resume-section-content">
								<div class="resume-timeline position-relative">
									<?php foreach ($person['experiences'] as $experience) { ?>
										<article class="resume-timeline-item position-relative pb-5">
											<div class="resume-timeline-item-header mb-2">
												<div class="d-flex flex-column flex-md-row">
													<h3 class="resume-position-title font-weight-bold mb-1"><?= $experience['position'] ?></h3>
													<div class="resume-company-name ms-auto"><?= $experience['company'] ?></div>
												</div>
												<div class="resume-position-time"><?= $experience['timeline'] ?></div>
											</div>
											<div class="resume-timeline-item-desc">
												<p><?= $experience['description'] ?></p>
												<?php if (count($experience["achievements"]) > 0) { ?>
													<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
												<?php } ?>
												<ul>
													<?php foreach ($experience["achievements"] as $achievement) { ?>
														<li><?= $achievement ?></li>
													<?php } ?>
												</ul>
												<?php if (count($experience['tech']) > 0) { ?>
													<h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
												<?php } ?>
												<ul class="list-inline">
													<?php foreach ($experience['tech'] as $tech) { ?>
														<li class="list-inline-item"><span class="badge bg-secondary badge-pill"><?= $tech ?></span></li>
													<?php } ?>
												</ul>
											</div>
										</article>
									<?php } ?>
								</div>
							</div>
						</section><!--//projects-section-->
					</div>
					<div class="col-lg-3">
						<section class="resume-section skills-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
							<div class="resume-section-content">
								<div class="resume-skill-item">
									<ul class="list-unstyled mb-4">
										<?php foreach ($person['skills']['main'] as $skill) { ?>
											<li class="mb-2">
												<div class="resume-skill-name"><?= $skill['name'] ?></div>
												<div class="progress resume-progress">
													<div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: <?= $skill['percent'] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
													</div>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div><!--//resume-skill-item-->
								<div class="resume-skill-item">
									<?php if (count($person['skills']['other']) > 0) { ?>
										<h4 class="resume-skills-cat font-weight-bold">Others</h4>
									<?php } ?>
									<ul class="list-inline">
										<?php foreach ($person['skills']['other'] as $skill) { ?>
											<li class="list-inline-item"><span class="badge badge-light"><?= $skill ?></span></li>
										<?php } ?>
									</ul>
								</div><!--//resume-skill-item-->
							</div><!--resume-section-content-->
						</section><!--//skills-section-->
						<section class="resume-section education-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
							<div class="resume-section-content">
								<ul class="list-unstyled">
									<?php foreach ($person['education'] as $school) { ?>
										<li class="mb-2">
											<div class="resume-degree font-weight-bold"><?= $school['degree'] ?></div>
											<div class="resume-degree-org"><?= $school['university'] ?></div>
											<div class="resume-degree-time"><?= $school['timeline'] ?></div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</section><!--//education-section-->
						<section class="resume-section reference-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Awards</h2>
							<div class="resume-section-content">
								<ul class="list-unstyled resume-awards-list">
									<?php foreach ($person['awards'] as $award) { ?>
										<li class="mb-2 ps-4 position-relative">
											<i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
											<div class="resume-award-name"><?= $award['title'] ?></div>
											<div class="resume-award-desc"><?= $award['description'] ?></div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</section><!--//interests-section-->
						<section class="resume-section language-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Languages</h2>
							<div class="resume-section-content">
								<ul class="list-unstyled resume-lang-list">
									<?php foreach ($person['languages'] as $language) { ?>
										<li class="mb-2"><span class="resume-lang-name font-weight-bold"><?= $language ?></span></li>
									<?php } ?>
								</ul>
							</div>
						</section><!--//language-section-->
						<section class="resume-section interests-section mb-5">
							<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
							<div class="resume-section-content">
								<ul class="list-unstyled">
									<?php foreach ($person['interests'] as $interest) { ?>
										<li class="mb-1"><?= $interest ?></li>
									<?php } ?>
								</ul>
							</div>
						</section><!--//interests-section-->
					</div>
				</div><!--//row-->
				<section class="resume-section experience-section mb-5">
					<h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Projects</h2>
					<div class="row mt-4">
						<?php foreach ($person['projects'] as $project) { ?>
							<div class="col-md-4">
								<div class="card">
									<img src="<?= $project['image'] ?>" alt="Project 1" class="card-img-top">
									<div class="card-body">
										<h5 class="card-title"><?= $project['title'] ?></h5>
										<p class="card-text"><?= $project['description'] ?></p>
										<a class="btn btn-outline-primary" href="<?= $project['link'] ?>">Go to link</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>
			</div>
		</div>
	</article>

	<footer class="footer text-center pt-2 pb-5">
		<small class="copyright">
			Designed with <span class="sr-only">love</span><i class="fas fa-heart"></i> by
			<?php
				$people = [];

				foreach ($data as $person) {
					$people[] = $person['general']['name'];
				}

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