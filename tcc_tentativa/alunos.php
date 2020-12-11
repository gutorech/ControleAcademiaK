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

    <title> Cadastrar Alunos</title>
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
                        <h6><a class="plr-20 color-white btn-fill-primary" href="cadastro.php">Alunos</a></h6>
                </div><!-- right-area -->     
                
                <section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <h2></h2>
                        <h5 class="mt-10 mb-30">Cadastrar Aluno</h5>
                        <p class="mx-w-700x mlr-auto"></p>
                </div>

		<form method="post" action="server.php" >
		<input type="hidden" name="idAluno" value="<?php echo $id; ?>">				
							
					
		<div class="input-group">
		<label>Nome</label>
		<input type="text" name="nome" value="<?php echo $nome; ?>">
            </div>
            
            <div class="input-group">
              <label> Faixa Atual</label>
              <select class="form-control" name="faixaAtual" value="<?php echo $faixaAtual; ?>">
                            <option>Faixa Branca</option>
                            <option>Faixa Amarela</option>
                            <option>Faixa Vermelha</option>
                            <option>Faixa Laranja</option>
                            <option>Faixa Verde</option>
                            <option>Faixa Roxa</option>
                            <option>Faixa Marrom</option>
                            <option>Faixa Preta</option>
                        </select>   
							</div>
                         <?php if ($update == true): ?>
                                <div class="input-group">
		<label>Progresso</label>
		<input type="text" name="progresso" value="<?php echo $progresso; ?>">
            </div>
            <?php endif ?>
            
            
						<div class="input-group">
							<?php if ($update == true): ?>
							<button class="btn" type="submit" name="update" style="background: #556B2F;" >Editar Aluno</button>
						<?php else: ?>
							<button class="btn" type="submit" name="save" >Cadastrar Aluno</button>
						<?php endif ?>
						</div>
					</form>							

								
                        </div><!-- row -->
						
						
                </form>
        </div><!-- container -->
</section>
<?php $results = mysqli_query($db, "SELECT * FROM db_alunos"); ?>
         

   

  </body>
</html>
