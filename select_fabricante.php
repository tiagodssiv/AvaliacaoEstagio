<?php 

require_once('Connection.php');

if(!empty($_POST['preenc_select'])){
		
			$stmt = $conexao->prepare("SELECT * FROM fabricantes ORDER BY id_fabricantes DESC");
       
        $stmt->execute();
			echo json_encode($rs=$stmt->fetchAll(PDO::FETCH_ASSOC));
       
           
		
	}
	


if(!empty($_POST['id_option'])){
	$flowers=array();
		$id_fabricant=$_POST['id_option'];
			$stmt = $conexao->prepare("SELECT * FROM categorias WHERE id_fabricant = ? ORDER BY id_categorias DESC");
            $stmt->bindParam(1, $id_fabricant);
        $stmt->execute();
		
		
			echo json_encode($rs=$stmt->fetchAll(PDO::FETCH_ASSOC));
       
           
		
	}
	


	
	
?>