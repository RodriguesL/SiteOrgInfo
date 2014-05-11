<!DOCTYPE html PUBLIC>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reclamônibus - Estatísticas</title>

<link href="style.css" rel="stylesheet" type="text/css" />



<?php
    
    //DEFININDO VARIAVEIS QUE RECEBERÃO OS DADOS ESTATISTICOS
    $qtdhorario=array(0,0,0);     //(MANHA, TARDE,NOITE)
    $qtdlinhaufrj=array(0,0,0,0);   //(COPPEAD,VILA RESIDENCIAL, ESTACAO,ALOJAMENTO)
    $tipodebus="vazio";




    $DOMDocument = new DOMDocument( '1.0', 'utf-8' ); // Fazemnos uma nova instancia de DOMDocument, com uma versão 1.0, e codificação utf-8
    $DOMDocument->formatOutput = true; // Seta a propidade de DOMDocument 'formatOutput' como true, para uma boa identação no xml após mesclado
    /*
     * Propidade 'preserveWhiteSpace' o default é como true, mais em 'false' não irá preservar espaços em branco redundantes
     */
    $DOMDocument->preserveWhiteSpace = false;  
    // então finalmente carrego a string do XML .. 
    $local= 'xml/reclamacoes0.xml';
    $DOMDocument->load($local );

    
   foreach( $DOMDocument->getElementsByTagName( 'reclamacao' ) as $Nodes ){
             foreach( $Nodes->childNodes as $Node ){
                      //VERIFICANDO O TIPO DE LINHA
                      if($Node->nodeName=="tipodebus") {
                        $tipodebus=$Node->nodeValue;

                     
                     }

                     if(($tipodebus=="0")&&($Node->nodeName=="linhabus")) {
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
                            $qtdlinhaufr[3]+=1;
                            break;


                          default:
                            # code...

                            break;
                        }


                      } 
             }
    }

    
    
 /*



    if((int)$tipodeonibus==0) {
      //INTERNO
     
      switch ((int)$linhabus) {
        case 1:
          $qtdlinhaufrj[0]+=1;  
          # code...
          break;
           case 2:
          $qtdlinhaufrj[1]+=1;  
          # code...
          break;
           case 3:
          $qtdlinhaufrj[2]+=1;  
          # code...
          break;
           case 4:
          $qtdlinhaufrj[3]+=1;  
          # code...
          break;
        
        default:
          # code...
          break;
      }


    }



*/


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

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Linhas de Onibus');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['616', 3],
          ['913', 1],
          ['485', 1],
          ['696', 1],
          ['410T', 2]
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
        

        var qtdcoppead = <?php echo json_encode($qtdlinhaufrj[0]); ?>; 
        var qtdvila = <?php echo json_encode($qtdlinhaufrj[1]); ?>; 
        var qtdestacao = <?php echo json_encode($qtdlinhaufrj[0]); ?>; 
        var qtdalojamento = <?php echo json_encode($qtdlinhaufrj[0]); ?>; 




        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Linhas de Onibus');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['COPPEAD', 3],
          ['Vila Residencial', 1],
          ['Estação da UFRJ', 1],
          ['Alojamento', 1],
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

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Motivo de Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Superlotação', 3],
          ['Imprudencia do Motorista', 1],
          ['Trajeto Incorreto', 1],
          ['Outros', 1],
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

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Motivo de Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Superlotação', 3],
          ['Imprudencia do Motorista', 1],
          ['Trajeto Incorreto', 1],
          ['Outros', 1],
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

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Horario da Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Manhã', 3],
          ['Tarde', 1],
          ['Noite', 1],
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

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Horario da Reclamação');
        data.addColumn('number', 'Quantidade de Reclamções');
        data.addRows([
          ['Manhã', 3],
          ['Tarde', 1],
          ['Noite', 1],
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
                  <li><a href="historico.html"class="current">Estatísticas</a></li>
                  <li><a href="contato.html" class="last">Contato</a></li>
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
       Feito por Zueira iLtda
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>