<html lang="pt-br">
  <head>
  <?php  include('server.php'); ?>
		<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM db_alunos WHERE idAluno=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$nome = $n['nome'];
			$faixaAtual = $n['faixaAtual'];
			$progresso = $n['progresso'];
		}
	}
?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js"> 
    <link rel="stylesheet" type="text/css" href="style.css"> 

    <title>Alunos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="common/styles.css">
        <link href="common/styles.css" rel="stylesheet">
  </head>
  <body>
  
 

<div class="right-area">
        <h6><a class="plr-20 color-white btn-fill-primary" href="alunos.php">Cadastrar</a></h6>
</div><!-- right-area -->         

<?php $results = mysqli_query($db, "SELECT * FROM db_alunos"); ?>

<table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>Faixa Atual</th>
			<th>Progresso</th>
			<th colspan="2">Avaliar Aluno</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['nome']; ?></td>
			<td><?php echo $row['faixaAtual']; ?></td>
            <td> <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $row['progresso']; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['progresso']; ?>">     
  <?php echo $row['progresso']; ?>/360</div>
</div>   
            <td>
				<a href="cadastro.php?avaliarRegular=<?php echo $row['idAluno']; ?>" class="edit_btn" style="background: #FFFF33;" >Regular</a>
			</td>
			<td>
				<a href="cadastro.php?avaliarBom=<?php echo $row['idAluno']; ?>" class="edit_btn" >Bom</a>
            </td>
            <td>
				<a href="cadastro.php?zerar=<?php echo $row['idAluno']; ?>" class="edit_btn" name="zerar" type="submit" style="background: #1338BE;" >✓</a>
				<!--<button class="edit_btn" style="background: #1338BE;" type="submit" name="zerar" >✓</button>-->
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['idAluno']; ?>" class="del_btn"> X </a>
			</td>
			<td>
				<a href="alunos.php?edit=<?php echo $row['idAluno']; ?>" class="edit_btn" >↑</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


<!--
  <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" style="width:40%">     
  </div>
</div>-->
<?php $results = mysqli_query($db, "SELECT * FROM db_alunos"); ?>
    </body>
</html>
