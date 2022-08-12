

<?php 
require_once('Connection.php');



?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Loja Interativa</title>

    <!-- Bootstrap -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 	

</head>
  <body>
    <h1 style="text-align:center;margin-top:30px;">CADASTRO DE PRODUTOS</h1>
	
	 
	<div style="text-align:center;margin-top:10%;"class="container">
  <div class="row">
    <div class="col align-self-start">
<form action="fabricanteCategoria.php" method="post">
  <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">FABRICANTE</label>
    <input placeholder="Digite um nome de Fabricante"type="text"id="fabricante"class="form-control" id="fabricante" aria-describedby="emailHelp">
  </div>
   <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;"  for="exampleInputEmail1" class="form-label">CATEGORIA </label>
   <input type="text" placeholder="Digite uma Categoria do Produto"id="categoria1"class="form-control" id="fabricante" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">CATEGORIA </label>
<div class="col align-self-center">
          <input placeholder="Digite uma Categoria do Produto"type="text" id="categoria2"class="form-control" id="fabricante" aria-describedby="emailHelp">
  
    </div> </div>






 <div class="mb-3">
    <label Style="margin-Right:88%;color:#4169E1; for="exampleInputPassword1" class="form-label">CATEGORIA </label>
    <input placeholder="Digite uma Categoria do Produto"type="text" id="categoria3"class="form-control" id="exampleInputPassword1">
  </div>
  
  <a onclick="salvarCategoriFabricant();" id="scf"class="btn btn-primary">SALVAR CATEGORIA E FABRICANTE</a>
</form >
    </div>
 <!--   <div class="col align-self-center">
      <input type="submit" name="buscaVencedor"value="BUSCAR VENCEDOR"class="btn btn-primary">
    </div>-->
    <div class="col align-self-end">
<form action="fabricanteCategoria.php" method="post">
  <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">PRODUTO</label>
    <input type="text"  placeholder="Digite nome do Produto"name="produto"class="form-control" id="fabricante" aria-describedby="emailHelp">
  </div>
   <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;"  for="exampleInputEmail1" class="form-label">FABRICANTE</label>
 
 
 <select name="fabrica"id="fabri" class="form-select" aria-label="Default select example">
 <!-- preenchido pelo ajax -->
 </select></div>
    <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">CATEGORIA</label>
<div class="col align-self-center">
       <select id="selet" name="catego"class="form-select" aria-label="Default select example">
 <!-- preenchido pelo ajax -->
  
  </select>
    </div> </div>






 <div class="mb-3">
    <label Style="margin-Right:88%;color:#4169E1; for="exampleInputPassword1" class="form-label">PREÇO</label>
    <input  placeholder="Digite o Preço do Produto"name="preco"type="text" class="form-control" id="preco">
  </div>
  
  <button name="salvarProduto" type="submit" class="btn btn-primary">SALVAR PRODUTO</button>
</form>
    </div>
  </div>
</div>



 <?php
 if(isset($_POST['buc'])){
	$nome=$_POST['busca'];
	
	?>
	
	<div id="divb1"> 
<div style="margin-top:5%;margin-bottom:5%;"class="row">
  <div class="col-12 col-md-2"></div>
  <div class="col-6 col-md-8">        
   
	  
	  <div class="row">
  <div class="col-12 col-md-6"><form action="http://localhost/projetoValiacao/index.php"method="post"style="margin-bottom:10px;"class="d-flex" role="search">
        <input id="campoBusca"onkeyup="buscarRegistros();"name="busca"class="form-control me-2" type="text" placeholder="BUSCAR PRODUTO" aria-label="Search">
        <button name="buc"class="btn btn-outline-success" type="submit">BUSCAR</button>
      </form>
	  </div>
  
</div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME PRODUTO</th>
      <th scope="col">CATEGORIA</th>
	   <th scope="col">FABRICANTE</th>
      <th scope="col">PREÇO</th>
	   <th scope="col">OPÇÕES<a style="margin-left:10px;"href="http://localhost/projetoValiacao/index.php/#divb" class="btn btn-danger">CANCELAR</a></th>
	  
    </tr>
  </thead>
  <tbody>
    
	 
	
 

	
	
	
	<?php	   
		   
	
	  $dados="";
         
	    $dados = "%" . $_POST['busca'] . "%";
        $stmt = $conexao->prepare(" SELECT * FROM produtos INNER JOIN categorias ON id_categoria=id_categorias INNER JOIN fabricantes ON id_fabricante = id_fabricantes WHERE nome LIKE  ? ORDER BY id_produto DESC ");
        $stmt->bindParam(1, $dados);
        if ($stmt->execute()) {
			
			 while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				 
				 
				?>
				<tr>
				
				 <td><?php echo $rs->id_produto; ?></td>
				  <td><?php echo $rs->nome; ?></td>
				   <td><?php echo $rs->nome_categoria; ?></td>
				  <td><?php echo $rs->nome_fabricantes; ?></td>
				   <td><?php echo $rs->preco; ?></td>
 <td> <a onclick="abrir('<?php echo $rs->id_produto; ?>');"class="btn btn-primary">EDITAR</a> <a class="btn btn-primary" href='#'onclick='confirmacao("<?php echo $rs->id_produto; ?>")'>EXCLUIR</a></td>
	   </tr>

				
		<?php
		
		}

		}
	
		?>
     
     
     
     
	 
  
  
  </tbody>
</table> </div>
  <div class="col-6 col-md-2"></div>
</div></div>
	
	
	
	
	
<?php	
}

else{
 
 ?>
 
 
<div id="divb"style="margin-top:5%;margin-bottom:5%;"class="row">
  <div class="col-12 col-md-2"></div>
  <div class="col-6 col-md-8">        
   
	  
	  <div class="row">
  <div class="col-12 col-md-6"><form action="http://localhost/projetoValiacao/index.php"method="post"style="margin-bottom:10px;"class="d-flex" role="search">
        <input id="campoBusca"onkeyup="buscarRegistros();"name="busca"class="form-control me-2" type="text" placeholder="BUSCAR PRODUTO" aria-label="Search">
        <button name="buc"class="btn btn-outline-success" type="submit">BUSCAR</button>
      </form>
	  </div>
  
</div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME PRODUTO</th>
      <th scope="col">CATEGORIA</th>
	   <th scope="col">FABRICANTE</th>
      <th scope="col">PREÇO</th>
	   <th scope="col">OPÇÕES</th>
    </tr>
  </thead>
  <tbody>
    
	 
	
 

	
	
	<?php	   
		   
		   $stmt = $conexao->prepare("SELECT * FROM produtos INNER JOIN categorias ON id_categoria=id_categorias INNER JOIN fabricantes ON id_fabricante = id_fabricantes ORDER BY id_produto DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

				?>
				<tr>
				
				 <td><?php echo $rs->id_produto; ?></td>
				  <td><?php echo $rs->nome; ?></td>
				   <td><?php echo $rs->nome_categoria; ?></td>
				  <td><?php echo $rs->nome_fabricantes; ?></td>
				   <td><?php echo $rs->preco; ?></td>
 <td> <a onclick="abrir('<?php echo $rs->id_produto; ?>');"class="btn btn-primary">EDITAR</a> <a class="btn btn-primary" href='#'onclick='confirmacao("<?php echo $rs->id_produto; ?>")'>EXCLUIR</a></td>
	   </tr>

				
		<?php
		
		}
		}
		
		?>
     
     
     
     
	 
  
  
  </tbody>
</table></div>
  <div class="col-6 col-md-2"></div>
</div>
<?php }?>






<div style="background-color:#FFE4B5;border-radius:10px;"id="dialog">


    <div class="col align-self-end">
<form style="padding:30px;"action="http://localhost/projetoValiacao/editar.php" method="post">
  <div id="prod"> </div>

  <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;"  for="exampleInputEmail1" class="form-label">FABRICANTE</label>
 
 
 <select id="fabrica"name="fabrica"class="form-select" aria-label="Default select example">
 
  <?php 
		   $stmt = $conexao->prepare("SELECT * FROM fabricantes ORDER BY id_fabricantes DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				?>
				 <option selected value="<?php echo $rs->id_fabricantes; ?>"><?php echo $rs->nome_fabricantes; ?></option>
 

				
		<?php
		
		}
		}
		
		?>
	

 
 
 
 
 
  </select></div>
    <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">CATEGORIA</label>
<div class="col align-self-center">
       <select id="catego"name="catego"class="form-select" aria-label="Default select example">
  
  
  
  
   <?php 
		   $stmt = $conexao->prepare("SELECT * FROM categorias ORDER BY id_categorias DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				?>
				 <option selected value="<?php echo $rs->id_categorias; ?>"><?php echo $rs->nome_categoria; ?></option>
 

				
		<?php
		
		}
		}
		
		?>
  
  </select>
    </div> </div>






 
  
  <button id="editar"name="EditarProduto"type="submit" class="btn btn-primary">EDITAR PRODUTO</button>
</form>
    </div>
  </div>
</div>


</div>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 


<script>
var i = setInterval(function () {
    
    clearInterval(i);
  
    // O código desejado é apenas isto:
 window.history.replaceState('Object', 'Titulo da Página', 'http://localhost/projetoValiacao/');

}, 2000);

function salvarCategoriFabricant(){
	
        var scf="scf";
        var option="select";
	    var fab  = $("#fabricante").val();
		var cad1 = $("#categoria1").val();
		var cad2 = $("#categoria2").val();
		var cad3 = $("#categoria3").val();
		
		if(fab==""){
			alert("Infome um Fabricante");
		}
		else if(cad1 =="" & cad2 =="" & cad3 ==""){
			
				alert("Infome pelo menos uma categoria");
			
			
		}
		
		
		else{
			
			
			//se campo fabricante estiver cheio e pelo menos uma cadegoria 
			
					 $.ajax({
	 
        type: 'POST',
        url: "http://localhost/projetoValiacao/fabricanteCategoria.php",
        dataType: 'json',
        beforeSend: function () {
		  $("#scf").attr("disabled", true);
     
        },
        data: {scf:scf,fabricante:fab,categoria1:cad1,categoria2:cad2,categoria3:cad3},
        success: function (msg){
			
			if(msg=="ok"){
			//limpa todos os campos que foram cadastrados e lista o select com o fabricante cadastrado	
		 
		 $("#scf").attr("disabled",false);	
		 $("#fabricante").val("");
		 $("#categoria1").val("");
		 $("#categoria2").val("");
		 $("#categoria3").val("");
		 	
		preencherSelect();	
			}else{alert(msg);
				
		preencherSelect();	
			
			}
			
			
		
			 
		 }
		 //fim if
	
		   
		
		
		
		///fim success
    });//fim ajax
	   
		
			
		
			
			
			
		}
			
			
		
		preencherSelect();		
			
		}
		
		

//fim método

function preencherSelect(){
	
//salvarCategoriFabricant();
var option="select";
	
  $.ajax({
	 
        type: 'POST',
        url: "http://localhost/projetoValiacao/select_fabricante.php",
        dataType: 'json',
        beforeSend: function () {
           $("#fabri").html("<option value=''>Carregando...</option>");
        },
        data: {preenc_select:option},
        success: function (msg){
		 var lista = msg
	
		 $("#fabri").html("<option value=''>Selecione Um Fabricante</option>");
		 if(lista.length > 0){
			 
			 
			 
			   for ( var i = 0 ; i < lista.length ; i++ ) {
				       $('#fabri').append("<option value='"+lista[i].id_fabricantes+"'>"+lista[i].nome_fabricantes+"</option>");
				//	alert(lista[i].nome);
	  }//fim for
			 
			 
		 }
		 //fim if
	
		   
		
		}
		
		///fim success
    });//fim ajax
	   
	 $('#selet').html("<option value=''></option>");

}
//fim método


//preenche select de caategoria de acordo com o id do fabricante
$('#fabri').change(function() {// fim mudar select fabfi
	
var option = $('#fabri').val();


  $.ajax({
        type: 'POST',
        url: "http://localhost/projetoValiacao/select_fabricante.php",
        dataType: 'json',
        beforeSend: function () {
           $("#selet").html("<option value=''>Carregando...</option>");
        },
        data: {id_option:option},
        success: function (msg){
			
			
		 var lista = msg
		 $("#selet").html("<option value=''>Selecione Uma Categoria</option>");
		 if(lista.length > 0){
			 
			  for ( var i = 0 ; i < lista.length ; i++ ) {
				       $('#selet').append("<option value='"+lista[i].id_categorias+"'>"+lista[i].nome_categoria+"</option>");
			 
		 }
	
		   	//	alert(lista[i].nome);
	  }//fim for
		
		}
		
		///fim success
    });//fim ajax
	   
	
	
	
});//fim mudar select fabfi


//$( '#id_do_select :selected' ). text()
		$(function() {
  $('#preco').maskMoney({ decimal: ',', thousands: '.', precision: 2 });
  //$('#dinheiroSemZero').maskMoney({ decimal: ',', thousands: '.', precision: 0 });
 // $('#dinheiroVirgula').maskMoney({ decimal: '.', thousands: ',', precision: 2 });
});
	

		function confirmacao(id) {

if(confirm('Deseja realmente excluir este registro?')){
	window.location.href = "http://localhost/projetoValiacao/excluir.php?id="+id;

		}}



$(document).ready(function () {
			
			$( "#dialog" ).hide();
			});




//ajax preenche modal de ediçao


function preencherEditar(id){
	

 
 $.ajax({
     type: "POST",
	  
     url: "http://localhost/projetoValiacao/editar.php",
	  
     data: {id:id},
     success: function(msg){
		 

       $("#prod").html(msg);
    }	
  });

	
}//fim método
  function abrir(id){
	  
	  
	  
	  
	  
	  
	
	 
	 $( "#dialog" ).dialog();  
	 preencherEditar(id);
	
  }
  
  function buscarRegistros(){

  var dados = document.getElementById("campoBusca").value;

      
	 
 $.ajax({
     type: "POST",
	  
     url: "http://localhost/projetoValiacao/buscar.php",
	  
     data: {dados:dados},
     success: function(msg){
		 
 //alert(msg);
//  $("#tab").hide();
       $("#tab").html("");
	   $("#tab").html(msg);
    }	
  });

}
  
</script>


  </body>
</html>