<?php
require_once('Connection.php');
  
  
  
  $salavarCategoria="";
  $categoria="";
    
	  $fabricante="";
  
  
  
  
  
  $catego="";
  $fabrica="";
  $preco="";


if(isset($_POST['scf'])){
if(!empty($_POST['categoria1'])){
	 $categoria=$_POST['categoria1'];
}
	
	if(!empty($_POST['categoria2'])){
	 $categoria=$_POST['categoria2'];
}
	if(!empty($_POST['categoria3'])){
	 $categoria=$_POST['categoria3'];
}

	if(!empty($_POST['fabricante'])){
$fabricante=$_POST['fabricante'];
}

	
	
	//echo '<script>alert('.$cliente.');</script>';
  // echo '<script>location.href="vencedorLeilao.php?leilao='.$var.'"</script>';


 

	  
  
    try {
        $stmt = $conexao->prepare("INSERT INTO categorias (nome_categoria) VALUES (?)");
        $stmt->bindParam(1, $categoria);
       
         
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
               // echo "Dados cadastrados com sucesso!";
             
            } else {
             //   echo "Erro ao tentar efetivar cadastro";
            }
        } else {
               throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
  
  
	    try {
        $stmt = $conexao->prepare("INSERT INTO fabricantes (nome_fabricantes) VALUES (?)");
        $stmt->bindParam(1, $fabricante);
       
         
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
               // echo "Dados cadastrados com sucesso!";
             
            } else {
             //   echo "Erro ao tentar efetivar cadastro";
            }
        } else {
               throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
  
	 echo '<script>location.href="http://localhost/projetoValiacao/"</script>';
	
	
	
}
  




if(isset($_POST['salvarProduto'])){
	
	
	 $catego=$_POST['catego'];
  $fabrica=$_POST['fabrica'];
  $preco=$_POST['preco'];
 $produto=$_POST['produto'];
	
	
	

   try {
        $stmt = $conexao->prepare("INSERT INTO produtos(nome, id_categoria, id_fabricante,preco) VALUES (?, ?, ?,?)");
        $stmt->bindParam(1, $produto);
        $stmt->bindParam(2, $catego);
        $stmt->bindParam(3, $fabrica);
		  $stmt->bindParam(4, $preco);
         
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<script>alert('Produto Cadastrado com Sucesso!');</script>";
             	 echo '<script>location.href="http://localhost/projetoValiacao/index.php/#divb"</script>';
            } else {
               // echo "Erro ao tentar efetivar cadastro";
            }
        } else {
               throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
       // echo "Erro: " . $erro->getMessage();
    }

	
	
	
	
}
	



  

?>