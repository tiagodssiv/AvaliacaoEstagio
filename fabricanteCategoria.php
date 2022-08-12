<?php
require_once('Connection.php');
  
  
  
  $salavarCategoria="";
  $categoria=array();
  $categoria1="";
  $categoria2="";
  $categoria3="";
  $fabricante="";
  $catego="";
  $fabrica="";
  $preco="";
  $retorn="";
   $cod_fabri="";

  
  
  
  


if(!empty($_POST['scf'])){
if(!empty($_POST['categoria1'])){
	 $categoria1=$_POST['categoria1'];
	 array_push($categoria,$categoria1);
}
	
	if(!empty($_POST['categoria2'])){
	 $categoria2=$_POST['categoria2'];
	  array_push($categoria,$categoria2);
}
	if(!empty($_POST['categoria3'])){
	 $categoria3=$_POST['categoria3'];
	  array_push($categoria,$categoria3);
}

	if(!empty($_POST['fabricante'])){
$fabricante=$_POST['fabricante'];




        $stmt = $conexao->prepare("SELECT * FROM fabricantes WHERE nome_fabricantes = ?");
        $stmt->bindParam(1, $fabricante);
        $stmt->execute();
			  
       
            $rs = $stmt->fetchAll();
			if($count=count($rs) > 0){
				$retorn="Fabricante já Cadastrado!";
				echo json_encode($retorn);
				
			}else{
				
				//se não existir o fabricante vAI CADASTRAR NOVO FABRICANTE E CATEGORIA
				
					
					//cadastra fabricante			
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
					
					
					
					
			//pega o id do fabricante que foi cadastrado no banco		
			$stmt = $conexao->prepare("SELECT * FROM fabricantes WHERE nome_fabricantes = ?");
           $stmt->bindParam(1, $fabricante);
           $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
			$cod_fabri = $rs->id_fabricantes;
			//---------------
			

	
         
 
			//CADASTRA AS CATEGORIAS REFERENTES AO FABRICANTE	
				
			
 $result = count($categoria);
 for($i=0;$i < $result ;$i++){
	 
	 
    try {
        $stmt = $conexao->prepare("INSERT INTO categorias (nome_categoria,id_fabricant) VALUES (?,?)");
        $stmt->bindParam(1, $categoria[$i]);
		$stmt->bindParam(2,	$cod_fabri);
       
         
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
  
	 
	 
 }

	  
  
  
	
	
   $retorn="ok";
	 echo json_encode($retorn);
	
	







			
			}
		
            
			
        
		

	}

	


	
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