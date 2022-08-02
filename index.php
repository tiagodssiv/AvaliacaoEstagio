

<?php 
require_once('Connection.php');
//echo  $con = Connection::getConn();//$con = new PDO('mysql: host=localhost; dbname=leilao;', 'root', '');
//$con = Connection::getConn();




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

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 style="text-align:center;margin-top:30px;">CADASTRO DE PRODUTOS</h1>
	
	 
	 <!-- O INPUT SELECT ESTÁ PREENCHIDA COM OS NOMES DOS LEILÕES CADASTRADOS NO BANCO DE DADOS 
	 O USUÁRIO ESCOLHE O NOME DO LEILÃO E CLICA EM UM DOS BOTÕES PARA ACESSAR A PÁGINA DE INTERESSE.
	 
	 O FORMULÁRIO ENVIA OS DADOS UM DOCUMENTO PHP QUE FILTRA A INTENÇÃO DO USUÁRIO E DIRECIONA PARA A PÁGINA CORRESPONDENTE-->
	<div style="text-align:center;margin-top:10%;"class="container">
  <div class="row">
    <div class="col align-self-start">
<form action="fabricanteCategoria.php" method="post">
  <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">FABRICANTE</label>
    <input placeholder="Digite um nome de Fabricante"type="text" name="fabricante"class="form-control" id="fabricante" aria-describedby="emailHelp">
  </div>
   <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;"  for="exampleInputEmail1" class="form-label">CATEGORIA </label>
   <input type="text" placeholder="Digite uma Categoria do Produto"name="categoria1"class="form-control" id="fabricante" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">CATEGORIA </label>
<div class="col align-self-center">
          <input placeholder="Digite uma Categoria do Produto"type="text" name="categoria2"class="form-control" id="fabricante" aria-describedby="emailHelp">
  
    </div> </div>






 <div class="mb-3">
    <label Style="margin-Right:88%;color:#4169E1; for="exampleInputPassword1" class="form-label">CATEGORIA </label>
    <input placeholder="Digite uma Categoria do Produto"type="text" name="categoria3"class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="scf"class="btn btn-primary">SALVAR CATEGORIA E FABRICANTE</button>
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
 
 
 <select name="fabrica"class="form-select" aria-label="Default select example">
  <option selected>SELECIONAR FABRICANTE</option>
  <?php 
		   $stmt = $conexao->prepare("SELECT * FROM fabricantes ORDER BY id_fabricantes DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				?>
				 <option value="<?php echo $rs->id_fabricantes; ?>"><?php echo $rs->nome_fabricantes; ?></option>
 

				
		<?php
		
		}
		}
		
		?>
	

 
 
 
 
 
  </select></div>
    <div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">CATEGORIA</label>
<div class="col align-self-center">
       <select name="catego"class="form-select" aria-label="Default select example">
  <option selected>SELECIONAR CATEGORIA</option>
  
  
  
   <?php 
		   $stmt = $conexao->prepare("SELECT * FROM categorias ORDER BY id_categorias DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				?>
				 <option value="<?php echo $rs->id_categorias; ?>"><?php echo $rs->nome_categoria; ?></option>
 

				
		<?php
		
		}
		}
		
		?>
  
  </select>
    </div> </div>






 <div class="mb-3">
    <label Style="margin-Right:88%;color:#4169E1; for="exampleInputPassword1" class="form-label">PREÇO</label>
    <input  placeholder="Digite o Preço do Produto"name="preco"type="text" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button name="salvarProduto"type="submit" class="btn btn-primary">SALVAR PRODUTO</button>
</form>
    </div>
  </div>
</div>
</form>


 
<div style="margin-top:5%;margin-bottom:5%;"class="row">
  <div class="col-12 col-md-2"></div>
  <div class="col-6 col-md-8">        
   
	  
	  <div class="row">
  <div class="col-12 col-md-6"><form style="margin-bottom:10px;"class="d-flex" role="search">
        <input name="busca"class="form-control me-2" type="text" placeholder="BUSCAR PRODUTO" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">BUSCAR</button>
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
    <tr>
	 
	
 <?php 
		   $stmt = $conexao->prepare("SELECT * FROM produtos ORDER BY id_produto DESC");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				?>
				<tr>
				 <td><?php echo $rs->id_produto; ?></td>
				  <td><?php echo $rs->nome; ?></td>
				   <td><?php echo $rs->id_categoria; ?></td>
				  <td><?php echo $rs->id_fabricante; ?></td>
				   <td><?php echo $rs->preco; ?></td>
 <td> <button type="submit" class="btn btn-primary">EDITAR</button> <a class="btn btn-primary" href='#'onclick='confirmacao("<?php echo $rs->id_produto; ?>")'>EXCLUIR</a></td>
	   </tr>

				
		<?php
		
		}
		}
		
		?>
     
     
     
     
	  
  
  
  </tbody>
</table></div>
  <div class="col-6 col-md-2"></div>
</div>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>


		function confirmacao(id) {

if(confirm('Deseja realmente excluir este registro?')){
	window.location.href = "http://localhost/projetoValiacao/excluir.php?id="+id;

		}}

</script>


  </body>
</html>