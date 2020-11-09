<?php
 $conn = mysqli_connect("localhost","root","","fullstackeletro");
 if (!$conn){
  die("falha na conexão com BD".mysqli_connect_errno());
 
 } 

    if(isset($_POST['nome']) && isset($_POST['mensagem'])){
        $nome = $_POST['nome'];
        $mensagem = $_POST['mensagem'];
        $sql = "insert into comentarios (nome, mensagem) values ('$nome','$mensagem')";
        $result = $conn->query($sql);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Fale conosco -Full Stack Eletro</title>
  <link rel="stylesheet" href="./css/estilo.css">
  <script src="./Javascript/estilo.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>

<?php
include_once("menu.php")
?>

  
  <div class="jumbotron jumbotron-fluid " style="text-align: center">
  <header class="contatos">
    <h1>
      Fale Conosco
    </h1>
  </header>
  </div>
<div class="container">
  <div class="row-sm">
    <div class="col">
      <div class="fale">
        <img src="./imagens/email2.jpg" width="50px">
       <p> contato@fullstackeletro.com</p>
      </div>
  </div>
      <div class="col">
      <div class="fale">
        <img src="./imagens/whatsapp.jpg" width="50px">
       <p> (11) 99999-9999</p>
      </div>
    </div>
  </div>
  <div class="container">
    <form method="POST" action="" >
      <h3> Deixe sugestões|Dúvidas|Reclamações: </h3>
      <div class="form-group">
        <p> Nome : </p>
         <input type="text" name="nome" style=" width= 600px"> 
      </div>
      <div class="form-group">
      <label for= "Mensagem">Deixe sua mensagem</label>
      <input type="text" class="form-control" id="mensagem" rows="5" placeholder="Digite sua mensagem">
        <p><input type="submit" value="Enviar"></p>
      </div>
        <br> <br>
     </form>
  </div>
  <?php
         $sql="select * from comentarios";
         $result = $conn->query ($sql);
         if($result->num_rows>0){
         while($rows = $result->fetch_assoc()){
          echo "<span style='color:blue;'>Nome: </span>",$rows['nome'],"<hr>";
          echo  "<span style='color:blue;'>Mensagem: </span>",$rows['mensagem'],"<hr>";
          echo  "<span style='color:blue;'>Data: </span>",$rows['data'],"<hr>";
          echo "<span style='color:gold;'>Obrigado por sua mensagem,
          <br> sua opinião é muito importante para nós.Volte sempre!!! </span>", "<hr>","<hr>";
          }  
          } else{
           echo "<span style='color:gold;'>Seja o primerio a comentar aqui!!!</span>";
          }
         
          ?>
</div>
        </div>
<!-- Inicio rodapé -->
<div class="container " style="align-itens:center">
  <h4 style="color:blue; font-size:25px;"> Formas de Pagamento</h4>
  <img src="./imagens/formas_de_pagamento.png" alt="Formas de Pagamento ">
  <p>&copy;Recode Pro</p>
  <h5> Desenvolvido por Willian Ferreira Santos | No curso Recode-pro</h5>
</div>
<!-- Fim rodapé -->
</body>
</html>