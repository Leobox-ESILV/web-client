<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Leobox</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="lib/home/css/style.css">
    </head>
    <body>
	
		<div id="home_form">

		</div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <!-- <script src="assets/vendors/js/app/app.min.js"></script> -->
		<!-- End Page Vendor Js -->
        <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
		<script >
			function setForm(page_name){
                $('#home_form').load("templates/home/"+page_name+".html", function() {
                    $(".loader").fadeOut();
		            $("#preloader").delay(350).fadeOut("slow");
                });
			}
			setForm('connexion');

			function loader_call(){
				window.Swal.fire({
					title: "Checking...",
					text: "Please wait",
					imageUrl: "https://wpamelia.com/wp-content/uploads/2018/11/ezgif-2-6d0b072c3d3f.gif",
					showConfirmButton: false,
					allowOutsideClick: false
				});
			}

			function connexion(){
				var username = $('#formConnexion').find('input[name="username"]').val();
				var password = $('#formConnexion').find('input[name="motdepasse"]').val();
				loader_call();
				$.ajax({
                    type: "POST",
                    data: {
                        action:"connexion",
						username: username,
						password: password
                    },
                    url: "./modules/connexion/ajax_handle_connexion.php",
                    success: function(data) {
						var response = jQuery.parseJSON(data);
                        if(response.is_status==200){
							window.location.replace("index.php?module=files");
						}else{
							Swal.fire({
								type: 'error',
								title: response.comment,
							})
						}
                    }
                });
			}

			function createaccount(){
				var username = $('#formeCreateAccount').find('input[name="username"]').val();
				var email = $('#formeCreateAccount').find('input[name="email"]').val();
				var password = $('#formeCreateAccount').find('input[name="password"]').val();
				var confirmPassword = $('#formeCreateAccount').find('input[name="confirmPassword"]').val();
				var checkbox = $('#formeCreateAccount').find('input[name="checkbox"]').is(":checked");
				if(password!=confirmPassword){
					Swal.fire({
						type: 'error',
						title: 'The passwords entered are different',
					})
					return false;
				}
				if(checkbox==false){
					Swal.fire({
						type: 'error',
						title: 'Please check "I Agree the conditions to use leobox."',
					})
					return false;
				}
				loader_call();
				$.ajax({
                    type: "POST",
                    data: {
                        action:"createaccount",
						email: email,
						username: username,
						password: password
                    },
                    url: "./modules/connexion/ajax_handle_connexion.php",
                    success: function(data) {
						var response = jQuery.parseJSON(data);
                        if(response.is_status==200){
							Swal.fire({
								type: 'success',
								title: 'Folder successfully create',
								showConfirmButton: false,
								timer: 2000
							})
							setTimeout(() => {
								location.reload();
							}, 2000);
						}else{
							Swal.fire({
								type: 'error',
								title: response.comment,
							})
						}
                    }
                });
			}
		</script>
    </body>
</html>