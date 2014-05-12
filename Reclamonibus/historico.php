<!DOCTYPE html PUBLIC>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reclamônibus - Estatísticas</title>

<link href="style.css" rel="stylesheet" type="text/css" />



<?php
    
    //DEFININDO VARIAVEIS QUE RECEBERÃO OS DADOS ESTATISTICOS
    $qtdhorarioin=array(0,0,0);
    $qtdhorarioex=array(0,0,0);     //(MANHA, TARDE,NOITE)
    $qtdlinhaufrj=array(0,0,0,0,0,0,0); 
    $qtdlinhaex=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);  
    $qtdrecex=array(0,0,0,0,0,0,0);
    $qtdrecin=array(0,0,0,0,0,0,0);
    $tipodebus="vazio";
    $teste=0;



    $DOMDocument = new DOMDocument( '1.0', 'utf-8' ); // Fazemnos uma nova instancia de DOMDocument, com uma versão 1.0, e codificação utf-8
    $DOMDocument->formatOutput = true; // Seta a propidade de DOMDocument 'formatOutput' como true, para uma boa identação no xml após mesclado
    /*
     * Propidade 'preserveWhiteSpace' o default é como true, mais em 'false' não irá preservar espaços em branco redundantes
     */
    $DOMDocument->preserveWhiteSpace = false;  
    // então finalmente carrego a string do XML .. 
    $temp=0;
		//Nesse ponto, informamos para o objeto que não queremos espaços em branco no documento
		$local= 'xml/reclamacoes' . $temp .'.xml';
		while(file_exists($local)){
			
		
    $DOMDocument->load($local );

    
   foreach( $DOMDocument->getElementsByTagName( 'reclamacao' ) as $Nodes ){
   		
             foreach( $Nodes->childNodes as $Node ){
                      //VERIFICANDO O TIPO DE LINHA
                      if($Node->nodeName=="tipodebus") {
                        $tipodebus=$Node->nodeValue;

                      }
                      	if($Node->nodeName=="tipodesituacao") {
                        
                          $tipo=$Node->nodeValue;
                          //INTERNO
                          if($tipodebus=="interno") {
                        switch ((int)$tipo) {
                          case 1:
                            $qtdrecin[0]+=1;
                            # code...
                            break;
                          case 2:
                            $qtdrecin[1]+=1;
                            break;
                          case 3:
                            $qtdrecin[2]+=1;
                            break;
                          case 4:
                            $qtdrecin[3]+=1;
                            break;
                          case 5:
                            $qtdrecin[4]+=1;
                            break;
                          case 6:
                            $qtdrecin[5]+=1;
                            break;    
                          case 7:
                            $qtdrecin[6]+=1;
                            break;  

                          default:
                            # code...

                            break;
                        }
                      }
                    }  
                     if($tipodebus=="interno"){
                     	if($Node->nodeName=="linhabus") {
                        
                          $linhabus=$Node->nodeValue;
                          //INTERNO

                        switch ((int)$linhabus) {
                          case 1:
                            $qtdlinhaufrj[0]+=1;
                            # code...
                            break;
                          case 2:
                            $qtdlinhaufrj[1]+=1;
                            break;
                          case 3:
                            $qtdlinhaufrj[2]+=1;
                            break;
                          case 4:
                            $qtdlinhaufrj[3]+=1;
                            break;
                          case 5:
                            $qtdlinhaufrj[4]+=1;
                            break;
                          case 6:
                            $qtdlinhaufrj[5]+=1;
                            break;
                          case 7:
                            $qtdlinhaufrj[6]+=1;
                            break;
                         



                          default:
                            # code...

                            break;
                        }
                      } 

                      if($Node->nodeName=="hora"){
                        	$teste+=1;
                      		$hora=$Node->nodeValue;
                      		if($hora>=5&&$hora<=12){
                      			$qtdhorarioin[0]+=1;
                      		}
                      		else if($hora>=13&&$hora<=18){
                      			$qtdhorarioin[1]+=1;
                      		}
                      		else if($hora>=19||$hora<=5){
                      	  		$qtdhorarioin[2]+=1;
                      		}
                      	}
                       
                  }






                      if($tipodebus=="convencional") {

                      	if($Node->nodeName=="tipodesituacao") {
                        
                          $tipo=$Node->nodeValue;
                          //EXTERNO

                        switch ((int)$tipo) {
                          case 1:
                            $qtdrecex[0]+=1;
                            # code...
                            break;
                          case 2:
                            $qtdrecex[1]+=1;
                            break;
                          case 3:
                            $qtdrecex[2]+=1;
                            break;
                          case 4:
                            $qtdrecex[3]+=1;
                            break;
                          case 5;
                            $qtdrecex[4]+=1;
                            break;
                          case 6:
                            $qtdrecex[5]+=1;
                          case 7:
                            $qtdrecex[6]+=1;      


                          default:
                            # code...

                            break;
                        }
                      }
                      	if($Node->nodeName=="linhabus"){
                          $linhabus=$Node->nodeValue;
                          //EXTERNO
                          
                        switch ((int)$linhabus) {
                          case 1:
                            $qtdlinhaex[0]+=1;
                            # code...
                            break;
                          case 2:
                            $qtdlinhaex[1]+=1;
                            break;
                          case 3:
                            $qtdlinhaex[2]+=1;
                            break;
                          case 4:
                            $qtdlinhaex[3]+=1;
                            break;
                           case 5:
                            $qtdlinhaex[4]+=1;
                            break;
                          case 6:
                            $qtdlinhaex[5]+=1;
                            break;
                          case 7:
                            $qtdlinhaex[6]+=1;
                            break;
                          case 8:
                            $qtdlinhaex[7]+=1;
                            break;      
                          case 9:
                            $qtdlinhaex[8]+=1;
                            break;  
                          case 10:
                            $qtdlinhaex[9]+=1;
                            # code...
                            break;
                          case 11:
                            $qtdlinhaex[10]+=1;
                            break;
                          case 12:
                            $qtdlinhaex[11]+=1;
                            break;
                          case 13:
                            $qtdlinhaex[12]+=1;
                            break;
                           case 14:
                            $qtdlinhaex[13]+=1;
                            break;
                          case 15:
                            $qtdlinhaex[14]+=1;
                            break;
                          case 16:
                            $qtdlinhaex[15]+=1;
                            break;
                          case 17:
                            $qtdlinhaex[16]+=1;
                            break;      
                          case 18:
                            $qtdlinhaex[17]+=1;
                            break;  
                          case 19:
                            $qtdlinhaex[18]+=1;
                            break;
                          case 20:
                            $qtdlinhaex[19]+=1;
                            break;      
                          case 21:
                            $qtdlinhaex[20]+=1;
                            break;
                          case 22:
                            $qtdlinhaex[21]+=1;
                            break;  
                          case 23:
                            $qtdlinhaex[22]+=1;
                            break;  
                          case 24:
                            $qtdlinhaex[23]+=1;
                            break;   
                          case 25:
                            $qtdlinhaex[24]+=1;
                            break;           
                              
                          default:
                            # code...

                            break;
                        }
                    }
                    if($Node->nodeName=="hora"){
                      		$hora=$Node->nodeValue;
                      		if($hora>=5&&$hora<=12){
                      			$qtdhorarioex[0]+=1;
                      		}
                      		else if($hora>=13&&$hora<=18){
                      			$qtdhorarioex[1]+=1;
                      		}
                      		else if($hora>=19||$hora<=5){
                      	  		$qtdhorarioex[2]+=1;
                      		}
                      	}

                }
                        
                      	

                      } 
             }
 
			$temp++;
			$local= 'xml/reclamacoes' . $temp .'.xml';
}
?>









<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
 
      google.setOnLoadCallback(OnibusExterno);
	  google.setOnLoadCallback(OnibusInterno);
	  google.setOnLoadCallback(ReclamacaoExterno);
	  google.setOnLoadCallback(ReclamacaoInterno);
	  google.setOnLoadCallback(HorarioExterno);
	  google.setOnLoadCallback(HorarioInterno);

      function OnibusExterno() {
      	var qtd616 = <?php echo json_encode($qtdlinhaex[1]); ?>; 
        var qtd485 = <?php echo json_encode($qtdlinhaex[0]); ?>; 
        var qtd410 = <?php echo json_encode($qtdlinhaex[3]); ?>; 
        var qtd761 = <?php echo json_encode($qtdlinhaex[2]); ?>;
        var qtd111c= <?php echo json_encode($qtdlinhaex[4]); ?>;
        var qtd945= <?php echo json_encode($qtdlinhaex[5]); ?>;
        var qtd486= <?php echo json_encode($qtdlinhaex[6]); ?>;
        var qtdilhaavhue = <?php echo json_encode($qtdlinhaex[7]); ?>;
        var qtd905 = <?php echo json_encode($qtdlinhaex[8]); ?>;
        var qtdilhalv = <?php echo json_encode($qtdlinhaex[9]); ?>;
        var qtd386b = <?php echo json_encode($qtdlinhaex[10]); ?>;
        var qtd634 = <?php echo json_encode($qtdlinhaex[11]); ?>;
        var qtd696 = <?php echo json_encode($qtdlinhaex[12]); ?>;
        var qtd901 = <?php echo json_encode($qtdlinhaex[13]); ?>;
        var qtd910 = <?php echo json_encode($qtdlinhaex[14]); ?>;
        var qtd911 = <?php echo json_encode($qtdlinhaex[15]); ?>;
        var qtd914 = <?php echo json_encode($qtdlinhaex[16]); ?>;
        var qtd915 = <?php echo json_encode($qtdlinhaex[17]); ?>;
        var qtd933 = <?php echo json_encode($qtdlinhaex[18]); ?>;
        var qtd936 = <?php echo json_encode($qtdlinhaex[19]); ?>;
        var qtd932 = <?php echo json_encode($qtdlinhaex[20]); ?>;
        var qtd417c = <?php echo json_encode($qtdlinhaex[21]); ?>;  
        var qtd956a = <?php echo json_encode($qtdlinhaex[22]); ?>;
        var qtd956b = <?php echo json_encode($qtdlinhaex[23]); ?>;
        var qtds06 = <?php echo json_encode($qtdlinhaex[24]); ?>;


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Linhas de Onibus');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['485', qtd485],
          ['913/616', qtd616],
          ['761', qtd761],
          ['410T/420T', qtd410],
          ['111C', qtd111c],
          ['945', qtd945],
          ['486', qtd486],
          ['322/324/326/328',qtdilhaavhue],
          ['321/323/325/327',qtdilhalv],
          ['386B',qtd386b],
          ['905' , qtd905],
          ['634/635',qtd634],
          ['696',qtd696],
          ['901',qtd901],
          ['910',qtd910],
          ['911',qtd911],
          ['914',qtd914],
          ['915',qtd915],
          ['933',qtd933],
          ['936',qtd936],
          ['932',qtd932],
          ['417C',qtd417c],
          ['956A',qtd956a],
          ['956B',qtd956b],
          ['qtds06',qtds06]

        ]);

        var options = { 
			title:'Externos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			width:400,
        	height:400,
			is3D: true,
			chartArea:{width:"100%"},
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('OnibusExterno'));
        chart.draw(data, options);
      }
	  function OnibusInterno() {
        
	  	var teste = <?php echo json_encode($teste); ?>;
        var qtdcoppead = <?php echo json_encode($qtdlinhaufrj[0]); ?>; 
        var qtdvila = <?php echo json_encode($qtdlinhaufrj[1]); ?>; 
        var qtdestacao = <?php echo json_encode($qtdlinhaufrj[2]); ?>; 
        var qtdalojamento = <?php echo json_encode($qtdlinhaufrj[3]); ?>;
        var qtdpraia =   <?php echo json_encode($qtdlinhaufrj[4]); ?>;
        var qtdxv =  <?php echo json_encode($qtdlinhaufrj[5]); ?>;
        var qtdxerem =  <?php echo json_encode($qtdlinhaufrj[6]); ?>;

        //console.log( teste);




        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Linhas de Onibus');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['COPPEAD', qtdcoppead],
          ['Vila Residencial', qtdvila],
          ['Estação da UFRJ', qtdestacao],
          ['Alojamento', qtdalojamento],
          ['Praia Vermelha',qtdpraia],
          ['Praça XV', qtdxv],
          ['Xerem',qtdxerem]
        ]);

        var options = { 
			title:'Internos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			chartArea:{width:"100%"},
			width:400,
        	height:400,
			is3D: true,
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('OnibusInterno'));
        chart.draw(data, options);
      }
	  
	  
	  function ReclamacaoExterno() {
	  	var tipo1 = <?php echo json_encode( $qtdrecex[0]); ?>; 
        var tipo2 = <?php echo json_encode( $qtdrecex[1]); ?>; 
        var tipo3 = <?php echo json_encode( $qtdrecex[2]); ?>; 
        var tipo4 = <?php echo json_encode( $qtdrecex[3]); ?>; 
        var tipo5 = <?php echo json_encode( $qtdrecex[4]); ?>;
        var tipo6 = <?php echo json_encode( $qtdrecex[5]); ?>;
        var tipo7 = <?php echo json_encode( $qtdrecex[6]); ?>;



        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Motivo de Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Superlotação', tipo1],
          ['Imprudencia do Motorista', tipo2],
          ['Trajeto Incorreto', tipo3],
          ['Motorista não atendeu ao pedido de embarque/desembarque', tipo5],
          ['Cancelamento da viagem em virtude de problemas mecânicos no ônibus',tipo6],
          ['Descumprimento de horários',tipo7],
          ['Outros', tipo4]
        ]);

        var options = { 
			title:'Externos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			chartArea:{width:"100%"},
			width:400,
        	height:400,
			is3D: true,
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('ReclamacaoExterno'));
        chart.draw(data, options);
      }
	  function ReclamacaoInterno() {
	  	var tipo1 = <?php echo json_encode( $qtdrecin[0]); ?>; 
        var tipo2 = <?php echo json_encode( $qtdrecin[1]); ?>; 
        var tipo3 = <?php echo json_encode( $qtdrecin[2]); ?>; 
        var tipo4 = <?php echo json_encode( $qtdrecin[3]); ?>; 
        var tipo5 = <?php echo json_encode( $qtdrecin[4]); ?>;
        var tipo6 = <?php echo json_encode( $qtdrecin[5]); ?>;
        var tipo7 = <?php echo json_encode( $qtdrecin[6]); ?>;

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Motivo de Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Superlotação', tipo1],
          ['Imprudencia do Motorista', tipo2],
          ['Trajeto Incorreto', tipo3],
          ['Motorista não atendeu ao pedido de embarque/desembarque', tipo5],
          ['Cancelamento da viagem em virtude de problemas mecânicos no ônibus',tipo6],
          ['Descumprimento de horários',tipo7],
          ['Outros', tipo4],
        ]);

        var options = { 
			title:'Internos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			chartArea:{width:"100%"},
			width:400,
        	height:400,
			is3D: true,
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('ReclamacaoInterno'));
        chart.draw(data, options);
      }
	  function HorarioExterno() {
	  	var manha= <?php echo json_encode($qtdhorarioex[0]); ?>; 
        var tarde = <?php echo json_encode($qtdhorarioex[1]); ?>; 
        var noite = <?php echo json_encode($qtdhorarioex[2]); ?>; 

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Horario da Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Manhã', manha],
          ['Tarde', tarde],
          ['Noite', noite],
        ]);

        var options = { 
			title:'Externos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			chartArea:{width:"100%"},
			width:400,
        	height:400,
			is3D: true,
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('HorarioExterno'));
        chart.draw(data, options);
      }
	  function HorarioInterno() {

	  	var manha= <?php echo json_encode($qtdhorarioin[0]); ?>; 
        var tarde = <?php echo json_encode($qtdhorarioin[1]); ?>; 
        var noite = <?php echo json_encode($qtdhorarioin[2]); ?>; 

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Horario da Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Manhã', manha],
          ['Tarde', tarde],
          ['Noite', noite],
        ]);

        var options = { 
			title:'Internos',
			titleTextStyle:{color: '#989898', fontSize: 20, bold:false},
			chartArea:{width:"100%"},
			width:400,
        	height:400,
			is3D: true,
			legend:{
				position:'right',
				alignment:'center'},
			
			};

        var chart = new google.visualization.PieChart(document.getElementById('HorarioInterno'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>

<div id="body_wrapper">
	<div id="wrapper">
    	
        <div id="header">
            <div id="site_title"><h1><a href="index.html"></a></h1></div>
            <div id="menu">
                <ul>
                  <li><a href="index.html" >Home</a></li>
                  <li><a href="reclama.php">Reclame Aqui</a></li>
                  <li><a href="historico.php"class="current">Estatísticas</a></li>
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
         <div id="graf_wrapper">
             <h2>Ônibus</h2>
             <div id="graf_esq">
          	<div id="OnibusExterno"></div>
			</div>
            <div id="graf_dir">
            <div id="OnibusInterno"></div>
			</div> 
        </div>    
         <div id="graf_wrapper">
             <h2>Reclamações</h2>
             <div id="graf_esq">
          	<div id="ReclamacaoExterno"></div>
			</div>
            <div id="graf_dir">
            <div id="ReclamacaoInterno"></div>
			</div> 
        </div>     
      <div id="graf_wrapper">
             <h2>Horários</h2>
             <div id="graf_esq">
          	<div id="HorarioExterno"></div>
			</div>
            <div id="graf_dir">
            <div id="HorarioInterno"></div>
			</div> 
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