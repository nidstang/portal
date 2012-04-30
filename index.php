<?php 
if(isset($_GET['web'])){
	$menu = $_GET['web'];
}else{
	$menu = "tutoriales";
}

?>
<!DOCTYPE>
<html>
<head>
	<title>DPS Diseño</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/fancy.css"/>

	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/twitter.js" type="text/javascript" charset="utf-8"></script>



	<script type="text/javascript">
		$(document).on("ready", function(){
			if(localStorage.getItem('local') == 'recogido'){
				$("#share").addClass('disabled');
			}

			$(".thumbnail").fadeIn(1000);
			enlaces = function(enlace)
			{
			    var expr = /(https?:\/\/\S+)/gi;
			    var anchr= '<a href="$1" target="_blank">$1</a>';
			 
			    return enlace.replace(expr,anchr);
			}

			$.jTwitter('dpstation', 10, function(data){
				$('#posts').empty();
				$.each(data, function(i, post){
					post.text = enlaces(post.text);
					$('#twits').append(
						'<div class="post">'
						+' <div class="txt">'
						+    post.text
						+' </div>'
						+'</div>'
						+'<hr>'
					);
				});
				$("#info").hide();
			});

            $("#recoger a").on("click", function(event){
        		localStorage.setItem('local', 'recogido');

        		$("#share").toggle(1000, function(){
        			$("#share").addClass('disabled');
        		});
            });

            $(".deleteSession").on("click", function(event){
            	localStorage.removeItem('local');
            })

		});
	
		//comentarios
        $("#nuevoComentario").live("click", function(){
        	
	      var data = "";
	      $.ajax({
	        url: "core/nuevo-coment.php",
	        type: "POST",
	        data: "texto="+$("#comentario").val()+
	        "&id_tutorial="+$("#tutorialComent").val()+
	        "&user="+$("#nombre").val(),
	        async: true,
	        dataType: "json",
	        beforeSend: function(){
                $("#loading").fadeIn(1);
              },
              complete: function(){
                $("#loading").fadeOut(1);
              },
	        success: function(response){
	          if(response.val){ 
	          	$("#comentarios").toggle(500);
	            //$("#success, #error").hide();
	            //$("#success").text(response.mensaje).fadeIn();

	            data += "<div class='comentario center'><div class='message'>";
	            data += "<span class='label'>Usuario: "+response.usuario+". Fecha: "+response.created+"</span>";
	            data += response.texto;
	            data += "</div></div>";

	            $("#comentariosView").before(data);
	            $("#notComment").hide();
	            $("#comentario").val("");
	            $("#nombre").val("");
	            $(".success").fadeIn(500).append("Comentario enviado");
	             
	          }else{
	            /*$("#success, #error").hide();
	            $("#error").text(response.mensaje).fadeIn();*/
	            alert(response.mensaje);
	          }
	        }

	      });
	      return false;
        });

	</script>
	<script>
			(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=351854898158184";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<script>
	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
	</script>
	<script type="text/javascript">
	  window.___gcfg = {lang: 'es'};

	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30217778-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>
	<div class="container">
		<header>
			<div id="bar">
				<nav id="menu">
					<ul>
						<li class="">
						<a href="index.php?web=home" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'home')? 'active' : '' ?>">
							<span>Noticias</span>
						</a>
					</li>
					<li>
						<a href="index.php?web=tutoriales" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'tutoriales' || $menu == 'ver-tutoriales')? 'active' : '' ?>">
							<span>Tutoriales</span>
						</a>
					</li>
					<li>
						<a href="index.php?web=buscador" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'buscador')? 'active' : '' ?>">
							<span>Buscador</span>
						</a>
					</li>
					<li class="disabled">
						<a href="index.php?web=galeria" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'galeria')? 'active' : '' ?>">
							<span>Galeria</span>
						</a>
					</li>
					<li>
						<a href="index.php?web=trucos" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'trucos')? 'active' : '' ?>">
							<span>Trucos</span>
						</a>
					</li>
					<li class="disabled">
						<a href="index.php?web=acerca" 
						class="buttonmenu mediano naranja menu <?php echo ($menu == 'acerca')? 'active' : '' ?>">
							<span>Acerca de</span>
						</a>
					</li>
					</ul>
				</nav>
				<div id="redes">
				<a href="https://www.facebook.com/DPStation" class="button mediano azulOscuro" target="_blank"><span>Facebook</span></a>
				<a href="https://twitter.com/#!/dpstation" class="button mediano azul" target="_blank"><span>Twitter</span></a>
				<a href="http://www.youtube.com/user/ldpstationl/featured" class="button mediano rojo" target="_blank"><span>Youtube</span></a>
				</div>
			</div>
			<div id="share"> 
		    	<a href="https://twitter.com/dpstation" class="twitter-follow-button" data-show-count="false" data-lang="es" data-show-screen-name="false">Seguir a @dpstation</a>

				<div id="fb-root"></div>

				<div class="fb-like" data-href="https://www.facebook.com/DPStation" data-send="false" data-layout="button_count" data-width="0" data-show-faces="true" id="facebook">

				</div>
				<div id="recoger">
					<a href="#">
						No mostrar
					</a>
				</div>
			</div>
			
			<div class="titulo" id="title"></div>

			<?php //echo (!isset($_GET['web']) || $_GET['web'] == "home") ? "<p>NOTICIAS</p>" : "" ?>

				<!--<p> <strong>Asi se hace DPSTATION [Capitulo 1]</strong> </p>
				<iframe width="560" height="315" src="http://www.youtube.com/embed/Kb-LbzrNQV8" frameborder="0" allowfullscreen></iframe>-->
			
		</header>
		<?php
		switch($menu)
		{
			case 'home':
				echo '
					<section style="margin-top:10px">
						<p style="font-size:20px"><strong>Ultimas noticias desde nuestro twitter</strong></p>
						<article id="twits">
							<div id="info">
								Cargando ultimas noticias...
							</div>
						</article>
					</section>
				'; 
			break;
			case 'tutoriales':
				include("categorias.php");
			break;
			case 'ver-tutoriales':
				include("tutoriales.php");
			break;
			case 'buscador':
				include("buscador.php");
			break;
			case 'trucos':
				include("trucos.php");
			break;
			case 'videotuto':
				include("videotutoriales.php");
			break;
			default:
				echo '<strong>La página solicitada no existe</strong>';
			break;
		}
		?>
		<div class="push"></div>  
	</div>
	<footer>
		&copy; DPSTATION<br />Developed by Poltero<br />Desing by David
	</footer>
</body>
</html>