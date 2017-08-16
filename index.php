<?php require '../connexion/connexion.php' ?>
<?php
// var_dump($_POST);
session_start();// à mettre dans toutes les pages de l'admin ; SESSION et authentification
	if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){
		$id_utilisateur=$_SESSION['id_utilisateur'];
		$prenom=$_SESSION['prenom'];
		$nom=$_SESSION['nom'];

		//echo $_SESSION['connexion'];

	}else{//l'utilisateur n'est pas connecté
		header('location:authentification.php');
	}
//pour se déconnecter
if(isset($_GET['quitter'])){// on récupère le terme quitter dans l'url

	$_SESSION['connexion']='';// on vide les variables de session
	$_SESSION['id_utilisateur']='';
	$_SESSION['prenom']='';
	$_SESSION['nom']='';

	unset($_SESSION['connexion']);
	session_destroy();

	header('location:../index.php');
}
	?>
<?php
//gestion des contenus
//insertion d'une experience
if(isset($_POST['titre_e'])){//si on récupere un nouveau experience
    if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['dates_e']!='' && $_POST['description_e']!=''){// si experience est pas vide
            $titre_f = addslashes($_POST['titre_e']);
            $sous_titre_f = addslashes($_POST['sous_titre_e']);
            $dates_f = addslashes($_POST['dates_e']);
            $description_f = addslashes($_POST['description_e']);
            $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL, '$titre_e', '$sous_titre_e', '$dates_e', '$description_e', '$id_utilisateur')"); //mettre $id_utilisateur quand on l'aura en variable de session
            header("location: ../admin/experiences.php");
            exit();
    }//ferme le if
}//ferme le if isset
// suppression d'un experience
if(isset($_GET['id_experience'])){
    $efface = $_GET['id_experience'];
    $sql = "DELETE FROM t_experiences WHERE id_experience = '$efface'";
    $pdoCV->query($sql);//ou avec exec
    header("location: ../admin/experiences.php");

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Karmo - Responsive Creative HTML Template</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<meta name="author" content="Tanislav Robert">
	<meta name="description" content="KARMO is a creative and modern template for digital agencies">

	<!-- STYLES -->
	<link rel="stylesheet" href="karmo-master/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="karmo-master/assets/css/flexslider.css">
	<link rel="stylesheet" href="karmo-master/assets/css/animsition.min.css">
	<link rel="stylesheet" href="karmo-master/assets/css/style.css">
	<link rel="stylesheet" href="karmo-master/assets/css/amadou.css">
	<link rel="stylesheet" href="karmo-master/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="karmo-master/assets/css/owl.theme.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>

<body class="animsition">
	<!-- Border -->
	<span class="frame-line top-frame visible-lg"></span>
	<span class="frame-line right-frame visible-lg"></span>
	<span class="frame-line bottom-frame visible-lg"></span>
	<span class="frame-line left-frame visible-lg"></span>
	<!-- HEADER  -->
	<header class="main-header">
		<div class="container-fluid">
			
				<!-- box header -->
				<div class="box-header">
						<div class="box-logo">
								<a href="index.html"><img src="karmo-master/assets/img/logo.png" width="80" alt="Logo"></a>
						</div>
						<!-- box-nav -->
						<a class="box-primary-nav-trigger" href="#0">
								<span class="box-menu-icon"></span>
						</a>
						<!-- box-primary-nav-trigger -->
				</div>
				<!-- end box header -->

				<!-- nav -->
				<nav>
						<ul class="box-primary-nav">
								<li class="box-label">Amadou Niang</li>

								<li><a href="index.html">Home</a> <i class="lnr lnr-home"></i></li>
								<li><a href="#competence">Compétences</a></li>
								<li><a href="#forexp">Formation & Expériences</a></li>
								<li><a href="#portfolio">Portefolio</a></li>
								<li><a href="contact.html">contact</a></li>

								<li class="box-label">SOCIAL</li>

								<li class="box-social"><a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="box-social"><a href="#0"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="box-social"><a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="box-social"><a href="#0"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
				</nav>
				<!-- end nav -->

				<!-- box-intro -->
				<section class="box-intro bg-film">
						<div class="table-cell">

								<h3 class="box-headline letters rotate-2">
										<span class="box-words-wrapper">
												<b class="is-visible">CLEAN &nbsp;&amp;&nbsp; CREATIVE.</b>
												<b>&nbsp;SIMPLE &nbsp;&amp;&nbsp; POWERFUL.</b>
										</span>
								</h3>
								<h1>AMADOU NIANG</h1>

						</div>

						<div class="mouse">
								<div class="scroll"></div>
						</div>
				</section>
				<!-- end box-intro -->
		</div>
	</header>

	<!-- HISTORY OF AGENCY -->
	<section id="about" class="about mt-150 mb-50">
		<div class="container">
			<div class="row center">
				<div class="col-md-8 col-md-offset-2">
					<img src="karmo-master/assets/img/about.png" alt="Khaki HTML Template" width="300">
					<div class="km-space"></div>
					<h5 class="lead">This is our most powerful template, that provide functionality to create corporate, app showcase, gaming, music, barber, etc websites.</h5>
				</div>
			</div><!-- description text -->
		</div>
	</section>

	<!-- FACTS  -->
	<div id="facts" class="facts mt-100 mbr-box mbr-section mbr-section--relative">
		<div class="container">
			<div class="row text-center">
			    <div class="col-xs-12 col-lg-3 col-md-3">
                    <div class="count-item">
                        <i class="lnr lnr-clock"></i>
                        <div class="numscroller" data-slno='1' data-min='0' data-max='500' data-delay='10' data-increment="10">500</div>
                        <div class="count-name-intro">Heures</div>
                    </div>
                </div>
                <div class="col-xs-12  col-lg-3 col-md-3">
                    <div class="count-item">
                        <i class="lnr lnr-rocket"></i>
                        <div class="numscroller" data-slno='1' data-min='0' data-max='2' data-delay='10' data-increment="5">1</div>
                        <div class="count-name-intro">Projets</div>
                    </div>
                </div>
                <div class="col-xs-12  col-lg-3 col-md-3">
                    <div class="count-item">
                        <i class="lnr lnr-coffee-cup"></i>
                        <div class="numscroller" data-slno='1' data-min='0' data-max='32' data-delay='10' data-increment="5">32</div>
                        <div class="count-name-intro">Boissons</div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3 col-md-3">
                    <div class="count-item">
                        <i class="lnr lnr-camera"></i>
                        <div class="numscroller" data-slno='1' data-min='0' data-max='76' data-delay='10' data-increment="10">76</div>
                        <div class="count-name-intro">Photos prises</div>
                    </div>
                </div>
        	</div>
		</div>
	</div>

	<!-- COMPETENCE -->
	<section id="competence"></section>
	<section id="team" class="team mbr-box mbr-section mbr-section--relative">
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0 L50 100 L100 0 Z" fill="#ffeedb" stroke="#ffeedb"></path>
		</svg>
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<div class="row center mb-100">
					<div class="section-title-parralax">
						<div class="process-numbers">01</div>
						<h2>Compétences</A></h2>
						<p class="module-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
						</p>
        <div class="skillbar clearfix " data-percent="60%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>C & C++</span></div>
            <div class="skillbar-bar" style="background:#ffeedb;"></div>
            <div class="skill-bar-percent">60%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="80%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>HTML5</span></div>
            <div class="skillbar-bar" style="background: #ffeedb;"></div>
            <div class="skill-bar-percent">80%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="75%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>SQL</span></div>
            <div class="skillbar-bar" style="background: #ffeedb;"></div>
            <div class="skill-bar-percent">75%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="75%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>CSS3</span></div>
            <div class="skillbar-bar" style="background: #ffeedb;"></div>
            <div class="skill-bar-percent">75%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="70%">
            <div class="skillbar-title" style="background:  #ffeedb;"><span>Javascript</span></div>
            <div class="skillbar-bar" style="background:  #ffeedb;"></div>
            <div class="skill-bar-percent">70%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="60%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>jQuery</span></div>
            <div class="skillbar-bar" style="background: #ffeedb;"></div>
            <div class="skill-bar-percent">60%</div>
        </div>
        <!-- Ende Skill Bar -->
        <div class="skillbar clearfix " data-percent="60%">
            <div class="skillbar-title" style="background: #ffeedb;"><span>Photoshop</span></div>
            <div class="skillbar-bar" style="background: #ffeedb;"></div>
            <div class="skill-bar-percent">60%</div>
        </div>
        <!-- Ende Skill Bar -->
    <!-- Ende container Skill Bar -->
					</div>
				</div>
			</div>
			<div class="row">

            </div>
		</div>
		<div class="bottom-separator hidden-xs"></div>
	</section>
	<!-- FEATURES -->
	<div id="features" class="features mbr-box mbr-section mbr-section--relative">
		<div class="container">
						<div class="row center">
							<div class="feature-item">
								<div class="col-md-3 col-sm-6">
									<div class="item-head">
										<img src="karmo-master/assets/img/batman.png" height="60" width="60" alt="">
									</div>
									<h6>Batman</h6>
									<p>citation</p>
								</div>
							</div>
							<!-- End features-item -->
							<div class="feature-item">
								<div class="col-md-3 col-sm-6">
									<div class="item-head">
										<img src="karmo-master\assets\img\batman.png" height="60" width="60" alt="">
									</div>
									<h6>Superman</h6>
									<p>citation</p>
								</div>
							</div>
							<!-- End features-item -->

							<div class="feature-item">
								<div class="col-md-3 col-sm-6">
									<div class="item-head">
										<img src="karmo-master/assets/img\flash.png" height="60" width="60" alt="">
									</div>
									<h6>Flash</h6>
									<p>citation</p>
								</div>
							</div>
							<!-- End features-item -->

							<div class="feature-item">
								<div class="col-md-3 col-sm-6">
									<div class="item-head">
										<img src="karmo-master/assets/img/green.png" height="60" width="60" alt="">
									</div>
									<h6>Green Lantern</h6>
									<p>citation</p>
								</div>
							</div>
							<!-- End features-item -->
						</div>
					</div>
	</div>

	<!-- FORMATION ET EXPERIENCE PARALAX -->
	<section id="forexp"></section>
	<section id="services" class="services mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background"  style="background-image: url(karmo-master/assets/img/services.jpg);">
		<div class="section-overlay"></div>
		<?php
			$experience = $pdoCV->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '$id_utilisateur' ");// prépare la requête
			$experience->execute();// execute la
			$nbr_experiences = $experience->rowCount();//compte les lignes

		?>
		<div class="container">
			<div class="row center">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="section-title-parralax">
						<div class="process-numbers">02</div>
						<h2>Formations et Expériences</h2>
						<p class="module-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<section class="timeline">
			  	<ul>
			    <li>
			      <div>
			        <time>1934</time> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1937</time> Proin quam velit, efficitur vel neque vitae, rhoncus commodo mi. Suspendisse finibus mauris et bibendum molestie. Aenean ex augue, varius et pulvinar in, pretium non nisi.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1940</time> Proin iaculis, nibh eget efficitur varius, libero tellus porta dolor, at pulvinar tortor ex eget ligula. Integer eu dapibus arcu, sit amet sollicitudin eros.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1943</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1946</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1956</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1957</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1967</time> Aenean condimentum odio a bibendum rhoncus. Ut mauris felis, volutpat eget porta faucibus, euismod quis ante.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1977</time> Vestibulum porttitor lorem sed pharetra dignissim. Nulla maximus, dui a tristique iaculis, quam dolor convallis enim, non dignissim ligula ipsum a turpis.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>1985</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>2000</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			    <li>
			      <div>
			        <time>2005</time> In mattis elit vitae odio posuere, nec maximus massa varius. Suspendisse varius volutpat mattis. Vestibulum id magna est.
			      </div>
			    </li>
			  </ul>
			</section>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 right col-full right-0">
					<img src="karmo-master/assets/img/comic.png"  height="60" width="60" alt="">
					<h6>Ironman</h6>
					<p>citation
					</p>
				</div>
				<div class="col-lg-6 left col-full left-0">
					<img src="karmo-master/assets/img/superhero_captain_hero_comic_icon-icons.com_69234.png" height="60" width="60" alt="">
					<h6>Captain America</h6>
					<p>citation
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 right col-full right-0">
					<img src="karmo-master/assets\img\hulk.png" height="60" width="60" alt="">
					<h6>Hulk</h6>
					<p>citation
					</p>
				</div>
				<div class="col-lg-6 left col-full left-0">
					<img src="karmo-master/assets/img/808672_comic_512x512.png" height="60" width="60" alt="">
					<h6>Wolverine</h6>
					<p>citation
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- PORTFOLIO -->
	<section id="portfolio" class="portfolio">
		<div class="top-right-separator hidden-xs"></div>
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<div class="row center">
					<div class="section-title mb-100">
						<div class="process-numbers">03</div>
						<h2>portfolio</h2>
						<p class="module-subtitle">En construction.</p>
					</div>
				</div>
			</div>
		</div>
				<!-- end row -->

	</section>
	<!-- fin portfolio -->

	<!-- CLIENTS -->
	<div id="clients" class="clients mt-100 mbr-box mbr-section mbr-section--relative">
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0 L50 100 L100 0 Z" fill="#fff" stroke="#fff"></path>
		</svg>
		<div class="container">
			<div class="row">
						<div class="col-md-12">
						</div>
						<div id="owl-demo">
								<div class="item"><img src="karmo-master/assets/img/clients/1.png" alt="Owl Image"></div>
								<div class="item"><img src="karmo-master/assets/img/clients/2.png" alt="Owl Image"></div>
								<div class="item"><img src="karmo-master/assets/img/clients/3.png" alt="Owl Image"></div>
								<div class="item"><img src="karmo-master/assets/img/clients/1.png" alt="Owl Image"></div>
								<div class="item"><img src="karmo-master/assets/img/clients/2.png" alt="Owl Image"></div>
								<div class="item"><img src="karmo-master/assets/img/clients/3.png" alt="Owl Image"></div>
						</div>
				</div>
		</div>
	</div>

	<!-- PRICING -->
	<section id="pricing" class="pricing mbr-box mbr-section mbr-section--relative mbr-section--full-height mbr-section--bg-adapted">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="row center">
						<div class="section-title mb-100">
							<div class="process-numbers">04</div>
							<h2>Loisirs</h2>
							<p class="module-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- Testimonials -->
	<section id="testimonials" class="testimonials mt-100 mb-100 mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted mbr-parallax-background" style="background-image: url(karmo-master/assets/img/testimonials.jpg);">
        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="avatar"><img src="karmo-master/assets/img/testimonial1.jpg" alt="Sedna Testimonial Avatar"></div>
                                <h5>"Lorem ipsum dolor sit amet, nullam lucia nisi."</h5>
                                <p class="author">Tanislav Robert, Product Designer.</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="karmo-master/assets/img/testimonial2.jpg" alt="Sedna Testimonial Avatar"></div>
                                <h5>"Nunc vel maximus purus. Nullam ac urna ornare."</h5>
                                <p class="author">Tanislav Alexandru, Founder @ WocTech.</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="karmo-master/assets/img/testimonial3.jpg" alt="Sedna Testimonial Avatar"></div>
                                <h5>"Nullam ac urna ornare, ultrices nisl ut, lacinia nisi."</h5>
                                <p class="author">Calota Oana, Pixel Guru</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</section>

	<!-- Contact -->
	<section id="contact" class="contact mbr-box mbr-section mbr-section--relative mbr-section--bg-adapted">
		<div class="container">
			<div class="col-md-6 col-sm-12">
				<div class="row">
					<h4> let's work together</h4>
						<p class="libre-text mt-50">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.
						</p>

					<a href="contact.html" class="default-btn"> Get in touch <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
			</div>

			<!-- Subscribe block -->
			<div class=" col-md-offset-1 col-md-5 col-sm-12">
				<div class="row center">
					<div class="newsletter">
						<h4>SUBSCRIBE</h4>
						<p class="libre-text mb-50">
							Stay informed with our newsletter
						</p>
						<form action="#" method="post">
							<div class="input_1">
								<input type="text" name="email">
								<span>Enter your email adress</span>
							</div>
							<button id="submit_btn" class="default-btn"> Send <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="main-footer">
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
			<path d="M0 0 L50 100 L100 0 Z" fill="#fff" stroke="#fff"></path>
		</svg>
            <div class="container">
                <div class="row mt-100 mb-50 footer-widgets">
                    <!-- Start Contact Widget -->
                    <div class="col-md-6 col-xs-12">
                        <div class="footer-widget contact-widget">
                            <img src="karmo-master/assets/img/footerlogo.png" class="logo-footer img-responsive" alt="Footer Logo" />
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                            <ul class="social-icons">
                                <li>
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                                </li>
                                <li>
                                    <a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="flickr" href="#"><i class="fa fa-flickr"></i></a>
                                </li>
                                <li>
                                    <a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
                                </li>
                                <li>
                                    <a class="instgram" href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a>
                                </li>
                                <li>
                                    <a class="skype" href="#"><i class="fa fa-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .col-md-3 -->
                    <!-- End Contact Widget -->

                    <!-- Start Twitter Widget -->
                    <div class="col-md-3 col-xs-12">
                        <div class="footer-widget twitter-widget">
                            <h4>Twitter</h4>
														Email: somecompany@example.com <br>
														Phone: +1 234 567 89 10
                        </div>
                    </div><!-- .col-md-3 -->
                    <!-- End Twitter Widget -->

                    <!-- Start Flickr Widget -->
                    <div class="col-md-3 col-xs-12">
                        <div class="footer-widget company-links">
                            <h4>Company</h4>
							<ul class="footer-links">
								<li><a href="#">About</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Our Products</a></li>
								<li><a href="#">Our Culture</a></li>
								<li><a href="#">Team</a></li>
							</ul>
                        </div>
                    </div><!-- .col-md-3 -->
                    <!-- End Flickr Widget -->
                </div><!-- .row -->

                <!-- Start Copyright -->
                <div class="copyright-section">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; 2016 Karmo -  All Rights Reserved <a href="admin/index1.php">Amadou NIANG</a> </p>
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div>
                <!-- End Copyright -->
            </div>
	</footer>

	<!-- SCRIPTS -->
	<script type="text/javascript" src="karmo-master/assets/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/animated-headline.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/menu.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/modernizr.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/jquery.animsition.min.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/init.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/main.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/smooth-scroll.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/numscroller.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/wow.min.js"></script>
	<script type="text/javascript" src="karmo-master/assets/js/owl.carousel.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="karmo-master/assets/js/amadou.js"></script>

	<script type="text/javascript">
		$(window).load(function() {
			new WOW().init();

			// initialise flexslider
			$('.flexslider').flexslider({
				animation: "fade",
				directionNav: true,
				controlNav: false,
				keyboardNav: true,
				slideToStart: 0,
				animationLoop: true,
				pauseOnHover: false,
				slideshowSpeed: 4000,
			});

			smoothScroll.init();

			// initialize isotope
			var $container = $('.portfolio_container');
			$container.isotope({
				filter: '*',
			});

			$('.portfolio_filter a').click(function(){
				$('.portfolio_filter .active').removeClass('active');
				$(this).addClass('active');

				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 500,
						animationEngine : "jquery"
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>
