<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registro de reclamação</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
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
<body id="main_body" >
	<?php
// define variables and set to empty values
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$element_4 = $element_3_1=$element_3_2=$element_2_1=$element_2_2=$element_2_3=$element_9 = $element_7_1 = $element_19 = $element_8 = $element_20_1 = $element_5 = $element_1_2 = $element_1_1 = "";
		$data = $horario = array("" , "" ,"");
		
		
		
	/*
	
	THINGS to do:
	
	criar um dropdown pra causa
	criar um radio selection pra sexo
	tirar curso

	horario: tirar AM/PM, segundos
	
	*/
	
	
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["element_1_1"])) {
     $nameErr = "Name is required";
   } else {
     $element_1_1 = test_input($_POST["element_1_1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$element_1_1)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["element_1_2"])) {
     $nameErr = "Name is required";
   } else {
     $element_1_2 = test_input($_POST["element_1_2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$element_1_2)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["element_5"])) {
     $emailErr = "Email is required";
   } else {
     $element_5 = test_input($_POST["element_5"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$element_5)) {
       $emailErr = "Invalid email format";
     }
   }
   
   if (empty($_POST["element_4"])) {
     $comment = "";
   } else {
     $element_4 = test_input($_POST["element_4"]);
   }

   if (empty($_POST["element_20_1"])) {
     $genderErr = "Gender is required";
   } else {
     $element_20_1 = test_input($_POST["element_20_1"]);
   }
   if (empty($_POST["element_19"])) {
     $genderErr = "ocorrido is required";
   } else {
     $element_19 = test_input($_POST["element_19"]);
   }
   if (empty($_POST["element_7_1"])) {
     $genderErr = "Tipo de bus is required";
   } else {
     $element_7_1 = test_input($_POST["element_7_1"]);
   }
   if (empty($_POST["element_8"])) {
     $genderErr = "Tipo de bus is required";
   } else {
     $element_8 = test_input($_POST["element_8"]);
   }
   if (empty($_POST["element_9"])) {
     $genderErr = "Tipo de bus is required";
   } else {
     $element_9 = test_input($_POST["element_9"]);
   }
   
   
   if ((empty($_POST["element_2_1"]))||(empty($_POST["element_2_2"])) || (empty($_POST["element_2_3"]))) {
     $dateErr = "dia,mes ,ano is required";
   } else {
     $data[0] = test_input($_POST["element_2_2"]);
	 
	 $data[1] = test_input($_POST["element_2_1"]);
	 $data[2] = test_input($_POST["element_2_3"]);

   }
   
   if ((empty($_POST["element_3_1"]))||(empty($_POST["element_3_2"])) ) {
     $timeErr = "Hora,min is required";
   } else {
     $horario[0] = test_input($_POST["element_3_1"]);
	 
	 $horario[1] = test_input($_POST["element_3_2"]);
	

   }
   
   
   
   
}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
		
		
		<h1><a>Registro de reclamação</a></h1>
		<form id="form_836903" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form_description">
			<h2>Registro de reclamação</h2>
			<p>Preencha o formulário, indicando as informações necessárias.</p>
		</div>						
			<ul>
			
		<li id="li_1" >
		<label class="description" for="element_1">Nome </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value="<?php echo $element_1_1;?>"/>
			<label>Nome</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value="<?php echo $element_1_2;?>"/>
			<label>Sobrenome</label>
		</span><p class="guidelines" id="guide_1"><small>Insira o seu nome.</small></p> 
		</li>		
		<li id="li_5" >
		<label class="description" for="element_5">E-mail </label>
		
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $element_5;?>"/> 
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
			<option value="0" selected="selected"></option>
			<option value="1" >485 - PENHA X GENERAL OSÓRIO(VIA FUNDAO)</option>
			<option value="2" >616/913 - FUNDÃO X NOVA AMÉRICA(DEL CASTILHO)</option>
			<option value="3" >761D - CHARITAS X GIG(VIA FUNDAO)</option>
			<option value="4" >4XX T - Baixada Fluminense x TERMINAL ALVORADA</option>

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
		
		<div class="subir">
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
			<img id="cal_img_2" class="datepicker" src="calendar.gif" alt="Pick a date.">	
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
			<textarea id="element_4" name="element_4" class="element textarea large" "<?php echo $element_4;?>"></textarea> 
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
		<div id="footer">
			
			
		</div>
	</div>
	<div class=testando>
		<?php
			echo "<p>Your Input:</p>";
			echo $element_1_1;
			echo "<br>";
			echo $element_1_2;
			echo "<br>";
			echo $element_5;
			echo "<br>";
			echo $element_20_1;
			echo "<br>";
			echo $element_19;
			echo "<br>";
			echo $element_7_1;
			echo "<br>";
			echo $element_8;
			echo "<br>";
			echo $element_9;
			echo "<br>";
			echo "data: $data[0]/$data[1]/$data[2]";
			echo "<br>";
			echo "horario: $horario[0]:$horario[1]";
			echo "<br>";
			echo $element_4;
			
			
			
	?>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>