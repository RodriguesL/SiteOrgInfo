<!DOCTYPE html PUBLIC>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reclamônibus - Contato</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>
<body>

<div id="body_wrapper">
	<div id="wrapper">
    	
        <div id="header">
           <div id="site_title"><h1><a href="index.html"></a></h1></div>
            <div id="menu">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="reclama.php">Reclame Aqui</a></li>
                  <li><a href="historico.html">Estatísticas</a></li>
                  <li><a href="contato.php" class="last current">Contato</a></li>
                </ul>
            </div> <!-- end of menu -->
        </div><!-- end of header -->
        
        <div id="middle">
            <div id="mid_left">
                <div id="mid_title">Este é o nosso site de ônibus</div>
                <p>Este parágrafo diz algo muito importante sobre o nosso site.</p>
				<p>E esse seduz o usuário a fazer todas as coisas que a gente quer que ele faça.</p>
             
            </div>
            <img src="images/bus.png" alt="bus" />
        </div> <!-- end of middle -->
        
        <div id="main">
 
<div class="cbox_fw">
            	<div class="cbox_large float_l">
                	<h2>Contato:</h2>
                	<p>Escreva aqui sua dúvida, reclamação, sugestão ou xingamento. Sempre queremos ouvir a sua voz. Você é o pilar do nosso trabalho. Nós queremos te ouvir.</p>
                <div id="contact_form">
                  <?php
// display form if user has not clicked submit
if (!isset($_POST["submit"])) {
  ?>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Remetente: <input type="text" name="remetente"><br>
  Assunto: <input type="text" name="assunto"><br>
  Mensagem: <textarea rows="10" cols="40" name="mensagem"></textarea><br>
  <input type="submit" name="submit" value="Enviar">
  </form>
  <?php 
} else {    // the user has submitted the form
  // Check if the "from" input field is filled out
  if (isset($_POST["remetente"])) {
    $from = $_POST["remetente"]; // sender
    $subject = $_POST["assunto"];
    $message = $_POST["mensagem"];
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail("lucas.nunes95@gmail.com",$subject,$message,"Remetente: $from\n");
    echo "Obrigado por seu feedback!";
  }
}
?>
                </div>
 </div>
</div> <!-- end of main -->

            	<div class="mapa">
                
                  <h3>Nossa Localização</h3>
            		<iframe height="320" width="400" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=CCMN,+Ilha+do+Fundão,+Rio+de+Janeiro,+Brasil&amp;aq=0&amp;sll=14.093957,1.318359&amp;sspn=69.699334,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=CCMN,+Ilha+do+Fundão,+Rio+de+Janeiro,+Brasil&amp;ll=-22.858124, -43.232151&amp;spn=0.033797,0.06403&amp;t=m&amp;output=embed"></iframe>    
   				</div>

			<div class="cleaner h20"></div>

            
        
    
    </div>
</div>
</div>
<div id="footer_wrapper">
    <div id="footer">
       Feito por Zueira iLtda
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>