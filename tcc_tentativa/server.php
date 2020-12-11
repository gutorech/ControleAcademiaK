<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'usbw', 'db_alunos');

	// initialize variables
	$nome = "";
	$faixaAtual = "";
	$progresso = 0;
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$nome = $_POST['nome'];
		$faixaAtual = $_POST['faixaAtual'];
		$progresso = $_POST['progresso'];

		mysqli_query($db, "INSERT INTO db_alunos (nome, faixaAtual, progresso) VALUES 
        ('$nome', '$faixaAtual', '$progresso')"); 
		$_SESSION['message'] = "Aluno salvo"; 
		header('location: cadastro.php');
	}
	if (isset($_POST['avaliarRegular'])) {
		$id = $_POST['idAluno'];
		$progresso = $_POST['progresso'];

		mysqli_query($db, "UPDATE db_alunos SET progresso= $progresso + 5 WHERE idAluno=$id"); 
		$_SESSION['message'] = "Avaliação regular"; 
		header('location: cadastro.php');
	}
	if (isset($_POST['avaliarBom'])) {
		$id = $_POST['idAluno'];
		$progresso = $_POST['progresso'];

		mysqli_query($db, "UPDATE db_alunos SET progresso= $progresso + 10 WHERE idAluno=$id"); 
		$_SESSION['message'] = "Avaliação boa"; 
		header('location: cadastro.php');
	}
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM db_alunos WHERE idAluno=$id");
	$_SESSION['message'] = "Aluno deletado"; 
	header('location: cadastro.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['idAluno'];
		$nome = $_POST['nome'];
		$faixaAtual = $_POST['faixaAtual'];
		$progresso = $_POST['progresso'];

		mysqli_query($db, "UPDATE db_alunos SET nome='$nome', faixaAtual='$faixaAtual',
         progresso='$progresso' WHERE idAluno=$id");
		$_SESSION['message'] = "Aluno atualizado"; 
		header('location: cadastro.php');
	}
	if (isset($_POST['zerar'])) {
		$id = $_POST['idAluno'];
		$progresso = $_POST['progresso'];

		mysqli_query($db, "UPDATE db_alunos SET progresso = $progresso = 0 WHERE idAluno = $id"); 
		$_SESSION['message'] = "Progresso zerado"; 
		header('location: cadastro.php');
	}
