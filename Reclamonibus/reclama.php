<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reclamônibus - Reclame Aqui</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="view.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script language="Javascript">
    function hideB(x)
	{
		if (x.checked)
		{
			document.getElementById("intermunicipal").style.visibility="hidden";
			document.getElementById("interno").style.visibility="visible";    
		}
	}

	function hideA(x)
	{
		if (x.checked)
		{
			document.getElementById("interno").style.visibility="hidden";
			document.getElementById("intermunicipal").style.visibility="visible";
		}
	}
	function unhideC(x) {
		if(document.getElementById('element_19').value == "4" ){
			document.getElementById("outros").style.visibility="visible";
		}
		else {
			document.getElementById("outros").style.visibility="hidden";
		}
	}
		
		
</script>
</head>
<body>
<?php
// define variables and set to empty values
		
		$idonibus=$textooutros = $element_3_1=$element_3_2=$element_2_1=$element_2_2=$element_2_3=$linhabus = $tipodebus = $tipodesituacao = $linhaconvbus = $gender = $email = $sobrenome = $nome = "";
		$data = $horario = array("" , "" ,"");

		
		
		$today = getdate();
		$diadehoje=$today["mday"];
		$mesdehoje=$today["mon"];
		$anodehoje=$today["year"];
		$vez=0;





		function verificadata($day,$today) {
			$diadehoje=(int)$today["mday"];
			$mesdehoje=(int)$today["mon"];
			$anodehoje=(int)$today["year"];

			$dia = (int)$day[0];
			$mes = (int)$day[1];
			$ano = (int)$day[2];
			$correto;

			if($ano > $anodehoje) {
				$correto=false;
				return $correto;
			}
			elseif($ano<$anodehoje) {
				$correto=true;
				return $correto;
			}
			else {
				if($mes>$mesdehoje) {
					$correto=false;
					return $correto;
				}
				elseif($mes<$mesdehoje) {
					$correto=true;
					return $correto;
				}
				else {
					if($dia > $diadehoje) {
						$correto=false;
						return $correto;
					}
					else {
						$correto=true;
						return $correto;
					} 
				
				}
			}		

		}



	
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["element_1_1"])) {
   		$nome = "";
    
   } else {
     $nome = test_input($_POST["element_1_1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª ]+$/", 'ãÃáÁàÀ    êÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª') ){
       $nome = ""; 
     }
   }
   if (empty($_POST["element_1_2"])) {
     $sobrenome = "";
   } else {
     $sobrenome = test_input($_POST["element_1_2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª ]+$/", 'ãÃáÁàÀ    êÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª')) {
       $sobrenome = ""; 
     }
   }
   if (empty($_POST["element_5"])) {
     $email = "";
   } else {
     $email = test_input($_POST["element_5"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $email = "";
     }
   }
   
   if (empty($_POST["element_4"])) {
     $textooutros = "";
   } else {
     $textooutros = test_input($_POST["element_4"]);
   }

   if (empty($_POST["element_20_1"])) {
     $gender = "";
   } else {
     $gender = test_input($_POST["element_20_1"]);
   }

   if (empty($_POST["element_19"])) {
     $tipodesituacao = "";
   } else {
     $tipodesituacao = test_input($_POST["element_19"]);
   }
   if (empty($_POST["element_7_1"])) {
     $tipodebus = "";
   } else {
     $tipodebus = test_input($_POST["element_7_1"]);
   }
   if ((empty($_POST["element_8"])) && (empty($_POST["element_9"]))) {
     $linhabus = "";
   } 
   else {

   	 if (empty($_POST["element_9"])) {

   		  $linhabus = test_input($_POST["element_8"]);
   		}
   	 else {
   	 	 $linhabus = test_input($_POST["element_9"]);
   	 }	
   }


   
   

   //DANDO VALORES PRAS VARIAVEIS ANTES DO TESTE

   			$data[0] = test_input($_POST["element_2_2"]);
	 
	 		$data[1] = test_input($_POST["element_2_1"]);
	 		$data[2] = test_input($_POST["element_2_3"]);
   
   if ((empty($_POST["element_2_1"]))||(empty($_POST["element_2_2"])) || (empty($_POST["element_2_3"])))  {
   			$data[0] = "";
	 
		 	$data[1] = "";
	 
			 $data[2] = "";
	}
	

	else {
		if(!(verificadata($data,$today))) {
			$data[0] = "";
	 
		 	$data[1] = "";
	 
			 $data[2] = "";
		}     
		else {
    	 	$data[0] = test_input($_POST["element_2_2"]);
	 
	 		$data[1] = test_input($_POST["element_2_1"]);
	 		$data[2] = test_input($_POST["element_2_3"]);
	 	}
   }
   
   if (((empty($_POST["element_3_1"]))||(empty($_POST["element_3_2"])) ) || ((int)$_POST["element_3_1"] >23) || ((int)$_POST["element_3_2"]>59) ){
     $horario[0] ="";
	 
	 $horario[1] = "";
	
   } else {
     $horario[0] = test_input($_POST["element_3_1"]);
	 
	 $horario[1] = test_input($_POST["element_3_2"]);
	

   }
   if (empty($_POST["element_15"])) {
     $idonibus = "";
   } else {
     $idonibus = test_input($_POST["element_15"]);
   }
   


   $vez+=1;
   
   
}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	
?>
<div id="body_wrapper">
	<div id="wrapper">
    	
        <div id="header">
            <div id="site_title"><h1><a href="index.html"></a></h1></div>
            <div id="menu">
                <ul>
                  <li><a href="index.html" >Home</a></li>
                  <li><a href="reclama.php"class="current">Reclame Aqui</a></li>
                  <li><a href="historico.php">Estatísticas</a></li>
                  <li><a href="contato.php" class="last">Contato</a></li>
                </ul>
            </div> <!-- end of menu -->
        </div><!-- end of header -->
        
        <div id="middle">
           <div id="mid_left">
                <div id="mid_title">Este é o nosso portal de reclamações.</div>
                <p>Cansado de sair esgotado da aula e ainda ter que voltar pra casa em pé?</p
                >
				<p>Cansado de motoristas que te fazem se sentir no Rally Paris-Dakar?</p>
             
            </div>
            <img src="images/bus.png" alt="bus" />
        </div> <!-- end of middle -->
        
        
        
        
        
        
          <!--ESCREVA O SCRIPT AQUI-->
	<div id="form_container">
		
		
		<form id="form_836903" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form_description">
			<h2>Registro de reclamação</h2>
			<p>Preencha o formulário, indicando as informações necessárias.</p>
		</div>						
			<ul>
			
		<li id="li_1" >
		<label class="description" for="element_1">Nome </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value="<?php echo $nome;?>"/>
			<label>Nome</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value="<?php echo $sobrenome;?>"/>
			<label>Sobrenome</label>
		</span><p class="guidelines" id="guide_1"><small>Insira o seu nome.</small></p> 
		</li>		
		<li id="li_5" >
		<label class="description" for="element_5">E-mail </label>
		
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $email;?>"/> 
		</div><p class="guidelines" id="guide_5"><small>Digite o seu e-mail.</small></p> 

		
		</li>

		<li id="li_20" >
		<label class="description" for="element_20">Sexo: </label>
		<span>
			<input id="element_7_1" name="element_20_1" class="element checkbox" type="radio" value="masculino"    />
			<label class="choice" for="element_20_1" >Masculino</label>
			<input id="element_7_2" name="element_20_1" class="element checkbox" type="radio" value="feminino"  />
			<label class="choice" for="element_20_1">Feminino</label>

		</span>
		
		
		</li>	
		<div id="acontecimento">
		<li id="li_19" >
		<label class="description" for="element_19">Ocorrido </label>
		<div>
		<select class="element select large" id="element_19" name="element_19" onchange="unhideC(this)"> 
				<option value="0" selected="selected"></option>
				<option value="1" >Superlotação</option>
				<option value="2" >Imprudência do motorista</option>
				<option value="3" >Trajeto incorreto</option>
				<option value="5"> Motorista não atendeu ao pedido de embarque/desembarque </option>
				<option value="6" >Cancelamento da viagem em virtude de problemas mecânicos no ônibus </option>
				<option value="7">Descumprimento de horários </option>
				<option value="4" >Outros</option>



			</select>
			</div><p class="guidelines" id="guide_8"><small>Marque o tipo do ocorrido.</small></p> 
			</li>		
		</div>
		
		
		<li id="li_7" >
		<label class="description" for="element_7">Tipo de ônibus em que o ocorrido foi presenciado </label>
		<span>
			<input id="element_7_1" name="element_7_1" class="element checkbox" type="radio" value="interno" onchange="hideB(this)"    />
			<label class="choice" for="element_7_1" >Linhas Internas</label>
			<input id="element_7_2" name="element_7_1" class="element checkbox" type="radio" value="convencional" onchange="hideA(this)" />
			<label class="choice" for="element_7_1">Linhas Convencionais</label>

		</span>
		
		<p class="guidelines" id="guide_7"><small>Selecione o tipo de ônibus, marcando na caixa</small></p> 
		</li>
		<div id="intermunicipal" style="visibility:hidden" class="descer">
		<li id="li_8" >
		<label class="description" for="element_8">Linhas Convencionais </label>
		<div>
		<select class="element select large" id="element_8" name="element_8"> 
			<option value="" selected="selected"></option>
			<option value="1" >485 - PENHA X GENERAL OSÓRIO (VIA FUNDAO)</option>
			<option value="2" >616/913 - FUNDÃO X NOVA AMÉRICA (DEL CASTILHO)</option>
			<option value="3" >761D - CHARITAS X GIG (VIA FUNDAO)</option>
			<option value="4" >410T/420T - BAIXADA FLUMINENSE x TERMINAL ALVORADA</option>
			<option value="5" >111C - DUQUE DE CAXIAS X CENTRAL </option>
			<option value="6" >945 - PAVUNA X CIDADE UNIVERSITÁRIA </option>
			<option value="7" >486 - FUNDAO x GENERAL OSÓRIO (VIA AV.BRASIL) </option>
			<option value="8" >322/324/326/328 - CASTELO X ILHA DO GOVERNADOR (VIA UFRJ) </option>
			<option value="9" >905 - BONSUCESSO X IRAJÁ (VIA CIDADE UNIVERSITÁRIA) </option>


		</select>
		</div><p class="guidelines" id="guide_8"><small>Selecione a linha de onibus, clicando na lista e selecionando a mesma em seguida.</small></p> 
		</li>		
		</div>
		<div id="interno" style="visibility:hidden" class="subir" >
		<li id="li_9">
		<label class="description" for="element_9">Linhas Internas </label>
		<div>
		<select class="element select large" id="element_9" name="element_9"> 
			<option value="" selected="selected"></option>
			<option value="1" >COPPEAD</option>
			<option value="2" >VILA RESIDENCIAL</option>
			<option value="3" >ESTAÇÃO DA UFRJ</option>
			<option value="4" >ALOJAMENTO</option>

		</select>
		</div><p class="guidelines" id="guide_9"><small>Selecione a linha de onibus, clicando na lista e selecionando a mesma em seguida.</small></p> 
		</li>
		</div>
		
		<span>
		<div class="subir">
		<li id="li_5" >
		<label class="description" for="element_15">ID do ônibus (Opcional)</label>
		
		<div>
			<input id="element_5" name="element_15" class="element text medium" type="text" maxlength="255" value="<?php echo $idonibus;?>"/> 
		</div>

		
		</li>
		</span>
		<li id="li_2" >
		<label class="description" for="element_2">Data do acontecimento </label>
		<span>
			<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="<?php echo $element_2_2;?>" type="text"> /
			<label for="element_2_2">Dia</label>
		</span>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text" size="2" maxlength="2" value="<?php echo $element_2_1;?>" type="text"> /
			<label for="element_2_1">Mês</label>
		</span>
		<span>
	 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="<?php echo $element_2_3;?>" type="text">
			<label for="element_2_3">Ano</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="images/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_2_3",
			baseField    : "element_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Horário(aproximadamente) do ocorrido </label>
		<span>
			<input id="element_3_1" name="element_3_1" class="element text " size="2" type="text" maxlength="2" value="<?php echo $element_3_1;?>"/> : 
			<label>Hora</label>
		</span>
		<span>
			<input id="element_3_2" name="element_3_2" class="element text " size="2" type="text" maxlength="2" value="<?php echo $element_3_2;?>"/> 
			<label>Minuto</label>
		</span>
		
		 
		</li>	
		<div id="outros" style="visibility:hidden">
		<li id="li_4" >
		<label class="description" for="element_4">Descreva o ocorrido </label>
		<div>
			<textarea id="element_4" name="element_4" class="element textarea large" "<?php echo $textooutros;?>"></textarea> 
		</div><p class="guidelines" id="guide_4"><small>Escreva da maneira que achar necessário o ocorrido.</small></p> 
		</div>
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="836903" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Enviar" />
		</li>
		</div>
			</ul>
		</form>	      
        
       <div class=testando>
		<?php
			
			if(($nome=="") || ($sobrenome=="") || ($email=="") || ($gender=="") || ($tipodesituacao=="")||($linhabus=="") || ($data[0]=="") || ($data[1]=="") || ($data[2]=="") || ($horario[0]=="") || ($horario[1]=="")) {
				if($vez>0) {
					
					echo "<p class=resultado>";
					echo "Preenchimento incorreto" ;
					echo "</p>";
				}
			} 
			/*
			else {
				echo "<p>Your Input:</p>";
				echo $nome;
				echo "<br>";
				echo $sobrenome;
				echo "<br>";
				echo $email;
				echo "<br>";
			echo $gender;
			echo "<br>";
			echo $tipodesituacao;
			echo "<br>";
			echo $tipodebus;
			echo "<br>";
			echo $linhaconvbus;
			echo "<br>";
			echo $linhabus;
			echo "<br>";
			//echo "data: $data[0]/$data[1]/$data[2]";
			echo "data:";
			echo (int)$data[0];
			echo (int)$data[1];
			echo (int)$data[2];
			echo "<br>";
			echo "horario: $horario[0]:$horario[1]";
			echo "<br>";
		
			
			echo "<br>";
			echo $textooutros;
			echo "<br>";
			echo "ID DO ONIBUS: $idonibus";
		}
			
		*/
		else{
		$dom = new DOMDocument();
		$temp=0;
		//Nesse ponto, informamos para o objeto que não queremos espaços em branco no documento
		$local= 'xml/reclamacoes' . $temp .'.xml';
		while(file_exists($local)){
			$temp++;
			$local= 'xml/reclamacoes' . $temp .'.xml';
		}
		 $dom->formatOutput = true;
		//Pronto! Configurações inicias realizadas, agora partiremos para a criação dos elementos que compõe a árvore do documento XML
		//Criação do elemento root (elemento pai)
		$root = $dom->createElement('reclamacao');
		 
		//Vamos criar o elemento nodeOne, conforme o exemplo anterior
		$nodeOne = $dom->createElement('nome');
		 
		//Agora o elemento nodeTwo
		$nodeTwo = $dom->createElement('sobrenome');
		$nodeThree= $dom->createElement('email');
		$nodeFour = $dom->createElement('gender');
		$nodeFive= $dom->createElement('tipodesituacao');
		$nodeSix = $dom->createElement('linhabus');
		$nodeSeven= $dom->createElement('idonibus');
		$nodeEight = $dom->createElement('dia');
		$nodeNine= $dom->createElement('mes');
		$nodeTen = $dom->createElement('ano');
		$nodeEleven= $dom->createElement('hora');
		$nodeTwelve= $dom->createElement('minuto');
		$node1= $dom->createElement('tipodebus');
		$node14= $dom->createElement('descricaooutros');
		 
		//criados os elementos, vamos adicionar um valor para cada um deles
		$nodeOneTxt = $dom->createTextNode($nome);
		$nodeTwoTxt = $dom->createTextNode($sobrenome);
		$nodeThreeTxt= $dom->createTextNode($email);
		$nodeFourTxt = $dom->createTextNode($gender);
		$nodeFiveTxt= $dom->createTextNode($tipodesituacao);
		$nodeSixTxt = $dom->createTextNode($linhabus);
		$nodeSevenTxt= $dom->createTextNode($idonibus);
		$nodeEightTxt = $dom->createTextNode($data[0]);
		$nodeNineTxt= $dom->createTextNode($data[1]);
		$nodeTenTxt = $dom->createTextNode($data[2]);
		$nodeElevenTxt= $dom->createTextNode($horario[0]);
		$nodeTwelveTxt= $dom->createTextNode($horario[1]);
		$node1Txt=$dom->createTextNode($tipodebus);
		$node14Txt= $dom->createTextNode($textooutros);
		
		$nodeOne->appendChild($nodeOneTxt);
		$nodeTwo->appendChild($nodeTwoTxt);
		$nodeThree->appendChild($nodeThreeTxt);
		$nodeFour->appendChild($nodeFourTxt);
		$nodeFive->appendChild($nodeFiveTxt);
		$nodeSix->appendChild($nodeSixTxt);
		$nodeSeven->appendChild($nodeSevenTxt);
		$nodeEight->appendChild($nodeEightTxt);
		$nodeNine->appendChild($nodeNineTxt);
		$nodeTen->appendChild($nodeTenTxt);
		$nodeEleven->appendChild($nodeElevenTxt);
		$nodeTwelve->appendChild($nodeTwelveTxt);
		$node1->appendChild($node1Txt);
		$node14->appendChild($node14Txt);



		$root->appendChild($node1);
		$root->appendChild($nodeOne);
		$root->appendChild($nodeTwo);
		$root->appendChild($nodeThree);
		$root->appendChild($nodeFour);
		$root->appendChild($nodeFive);
		$root->appendChild($nodeSix);
		$root->appendChild($nodeSeven);
		$root->appendChild($nodeEight);
		$root->appendChild($nodeNine);
		$root->appendChild($nodeTen);
		$root->appendChild($nodeEleven);
		$root->appendChild($nodeTwelve);
		$root->appendChild($node14);
		

		$dom->appendChild($root);
		 
		//Dessa forma, dissemos que os elementos nodeOne e nodeTwo são filhos do elemento root, isto é, estão dentro de root ou um nível abaixo de root.
		 
		//Para imprimir na tela, utilizamos o método saveXML()
		 
		//Por fim, para salvarmos o documento, utilizamos o método save()
		$dom->save($local);
	}




			
			
	?>
	</div>
        
        
        
        
        
        
        
  </div>  
  </div> 
<div id="footer_wrapper">
    <div id="footer">
       Feito por Daniel Assumpção, João Vitor Oliveira e Lucas Rodrigues
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>