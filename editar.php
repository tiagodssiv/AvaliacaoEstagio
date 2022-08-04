<?php
require_once('Connection.php');





	
if(isset($_POST['EditarProduto'])){
	
	
	$nome=$_POST['produto'];
	$catego=$_POST['catego'];
		$fabrica=$_POST['fabrica'];
			$preco=$_POST['preco'];
				$id=$_POST['id'];
	
	
	$stmt = $conexao->prepare("UPDATE produtos SET nome=?, id_categoria=?, id_fabricante=?,preco=? WHERE id_produto = ?");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $catego);
    $stmt->bindParam(3, $fabrica);
    $stmt->bindParam(4, $preco);
	 $stmt->bindParam(5, $id);

if ($stmt->execute()) {
           
                  echo "<script>alert('Alterado com sucesso!');</script>";
			  echo '<script>location.href="http://localhost/projetoValiacao/index.php/#divb"</script>';
             
          
}
}else{
	


try {
        $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id_produto = ?");
        $stmt->bindParam(1, $_POST['id']);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
           // $id = $rs->id;
		   
            $nome = $rs->nome;
            $catego = $rs->id_categoria;
            $fabrica = $rs->id_fabricante;
			$preco= $rs->preco;
			
			
			echo'<div class="mb-3">
    <label Style="margin-Right:85%;color:#4169E1;" for="exampleInputEmail1" class="form-label">PRODUTO</label>
   <input value="'.$nome.'"type="text"  placeholder="Digite nome do Produto"name="produto"class="form-control" id="produto"></div>
  <div class="mb-3">
    <label Style="margin-Right:88%;color:#4169E1; for="exampleInputPassword1" class="form-label">PREÇO</label>
    <input  value="'.$preco.'"placeholder="Digite o Preço do Produto"name="preco"type="text" class="form-control" id="preco">
  
  <input  value="'.$_POST['id'].'"placeholder=""name="id"type="hidden" class="form-control" id="id">
  </div>';
			
			
			//echo json_encode($dados=array("nome"=>$nome,"categoria"=>$catego,"fabricante"=>$fabrica,"preco"=>$preco));
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }

}



?>