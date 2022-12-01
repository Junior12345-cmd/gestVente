<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Myschool</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo ASSETS;?>LTE/dist/img/kartfav.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>Login/css/main.css">
<!--===============================================================================================-->
    <?php //echo $scripts; ?>
	<style>
		#glass {
			margin-left: 5%;
			width: 92%;
			height: 85vh;
			padding: 0px 0px 0px 0px;
			background: rgba(0, 0, 0, 0.40);
			box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
			backdrop-filter: blur(6px);
			-webkit--backdrop-filter: blur(6px);
			border-radius: 10px;
			border: 1px solid rgba(0,0,0,0.18);
            overflow: auto;
		}
		::-webkit-scrollbar {
			width: 0px;
			height: 15px;
		}
		::-webkit-scrollbar-track-piece {
			background-color: #C2D2E4;
		}
		::-webkit-scrollbar-thumb:vertical {
			height: 30px;
			background-color: #0A4C95;
		}

		#logform {
			width: 35%;
			margin: auto;
			padding-bottom: 20px;
		}

		#backred {
			background-size: 100% 100%;
		}

        #logo {
            width: 0px;        
		}
		
		@media screen and (max-width: 1100px) {

			#logform {
				width: 50%;
				margin: auto;
				padding-bottom: 20px;
			}

		}

		@media screen and (max-width: 768px) {

            #logform {
				width: 85%;
				margin: auto;
				padding-bottom: 20px;
			}

			#backred {
				background-size: 100% 100%;
			}

            #glass {
                margin-left: 5%;
                width: 92%;
                height: 90vh;
                padding: 0px 0px 0px 0px;
                background: rgba(0, 0, 0, 0.25);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                backdrop-filter: blur(5px);
                -webkit--backdrop-filter: blur(5px);
                border-radius: 10px;
                border: 1px solid rgba(0,0,0,0.18);
                overflow: auto;
		    }
            ::-webkit-scrollbar {
                width: 0px;
                height: 15px;
            }
            ::-webkit-scrollbar-track-piece {
                background-color: #C2D2E4;
            }
            ::-webkit-scrollbar-thumb:vertical {
                height: 30px;
                background-color: #0A4C95;
            }

            #logo {
                width: 100%;        
                height: 110px;
            }
		}

	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" id="backred">
			<div class="wrap-login100" id="glass">
				<form action="registry.html" method="post" id="logform" enctype="multipart/form-data" class="login100-form validate-form">
                    <div class="">
						<a href="login.html">
                        <span class="login100-form-title text-white font-weight-bold pb-3" style="font-size: 35px;">
                            Inscription
                        </span>
						<a>
                    </div>

                    <!-- <input type="hidden" name="values[profil]" value="5" placeholder="Téléphone"> -->
                    <div class="wrap-input100 validate-input" data-validate = "Un nom est requis">
						<input class="input100" type="text" name="values[nom]" placeholder="Nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Un prénom est requis">
						<input class="input100" type="text" name="values[prenom]" placeholder="Prénom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: ex@abc.xyz">
						<input class="input100" type="email" name="values[email]" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Une ville est requise">
						<input class="input100" type="text" name="values[ville]" placeholder="Ville">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-building" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Un pays est requis">
						<input class="input100" type="text" name="values[pays]" placeholder="Pays">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-flag" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Un numéro de téléphone est requis">
						<input class="input100" type="tel" name="values[telephone]" placeholder="Téléphone" id="tel">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Le mot de passe est requis">
						<input class="input100" type="password" name="values[password]" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class= "hidden wrap-input100 validate-input" >
						<input class=" hiddeninput100" type="hidden" name="values[etat]" >
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Le profil est requis">
						<select  class="input100 form-control" id="profil" name="values[profil]">
							<option value="3">Etudiant</option>
							<option value="2">Professeur</option>
							<option value="4">Parent</option>
						</select>
						
					</div>
					<style>
						.labo {
							font-family: Poppins-Medium;
							font-size: 15px;
							line-height: 1.5;
							/* color: #666666; */
							color: rgba(0, 0, 0, 0.25);
							display: block;
							width: 100%;
							background: #e6e6e6;
							height: 50px;
							border-radius: 25px;
							padding: 13px 0px 0 68px;
							z-index: 2;
							text-overflow: ellipsis;
							
						}
						#file-name-text {
							width: 70%;
							text-overflow: ellipsis;
							float: right;
						}
						.btn-par {
							margin-top: -13px;
							padding: 13px 0 0 10px;
							font-size: bold;
							height: 50px;
							width: 30%;
							color: black;
							background-color: #beb7b5;
							float: right;
							border-radius: 0 25px 25px 0;
							z-index: 1;
						}
						@media screen and (max-width: 768px) {
							#file-name-text {
								width: 55%;
								margin-top: -10px;
							}
							.btn-par {
								width: 40%;
								padding: 13px 0 0 2px;
							}
						}
					</style>
					<div class="wrap-input100">
						<input hidden class="input100 custom-file-input" type="file" name="values[photo]" id="photo" placeholder="Photo">
						<label class="labo custom-file-label" for="photo"><span type="none" class="btn-par">Parcourir</span><span id="file-name-text">Choisir une photo...</span></label>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-camera" aria-hidden="true"></i>
						</span>
					</div>
					<script>
						document.getElementById('photo').addEventListener('change', function(e) {
							var name = this.value.replace(/^.*[\\\/]/, '');
							console.log(name);
							document.getElementById('file-name-text').innerHTML = name;
						});
					</script>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="background-color: #044687;">
							S'inscrire
						</button>
					</div>
					<div class="text-center p-t-12 ">
						<a class="btn btn-outline-success btn-sm text-white" style="background-color: rgba(76, 50, 14, 0.5);" href="login.html">Vous avez déjà un compte ? <br>Connectez-vous !</a>
					</div>
                </form>
			</div>
        </div>
	</div> 
	
<!--===============================================================================================-->	
	<script src="<?php echo ASSETS;?>Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo ASSETS;?>Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo ASSETS;?>Login/js/main.js"></script>

</body>
</html>