<?php 

require_once('Connection.php');
//echo  $con = Connection::getConn();//$con = new PDO('mysql: host=localhost; dbname=leilao;', 'root', '');
//$con = Connection::getConn();


$id=$_GET['id'];

 try {
        $stmt = $conexao->prepare("DELETE FROM produtos WHERE id_produto = ?");
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Excluído com sucesso!');</script>";
			  echo '<script>location.href="http://localhost/projetoValiacao/index.php/#divb"</script>';
			
          
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
		 echo '<script>location.href="http://localhost/projetoValiacao/index.php/#divb"</script>';
			
    }


?>