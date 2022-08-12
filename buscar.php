<?php require_once('Connection.php');

if(isset($_POST['dados'])){
	

try {
	    $string="";
	        $id = "";
            $nome ="";
			$dados="";
            $fabri =""; 
			$cate =""; 
            $preco="";
	
	
	$dados = "%" . $_POST['dados'] . "%";
        $stmt = $conexao->prepare(" SELECT * FROM produtos INNER JOIN categorias ON id_categoria=id_categorias INNER JOIN fabricantes ON id_fabricante = id_fabricantes WHERE nome LIKE  ? ORDER BY id_produto DESC ");
        $stmt->bindParam(1, $dados);
        if ($stmt->execute()) {
			$string+=' <table class="table">	
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
  <tbody>';
			 while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
				 

				 $string+='
				 
				 
				 
				 <tr>
				<div id="tab">
				 <td>'.$rs->id_produto.'</td>
				  <td>'.$rs->nome.'</td>
				   <td>'.$rs->nome_categoria.'</td>
				  <td>'.$rs->nome_fabricantes.'</td>
				   <td>'.$rs->preco.'</td>
 <td> <a onclick="abrir('.$rs->id_produto.');"class="btn btn-primary">EDITAR</a> <a class="btn btn-primary" href="#"onclick="confirmacao('. $rs->id_produto.')">EXCLUIR</a></td>
	    </div></tr></tbody>
</table>';
				 
			 }
echo $string;
       } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }


}
?>
