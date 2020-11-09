<?php 
   $conn = mysqli_connect("localhost","root","","fullstackeletro");
   if (!$conn){
    die("falha na conexão com BD".mysqli_connect_errno());
   }
   // else {
   //     echo 'sucesso ao conectar';
   // } 
   
  
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title > Produtos - Full Stack Eletro</title>
   <link rel="stylesheet" href="./css/estilo.css">
   <script src="./Javascript/estilo.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<!--  -->

<body>
   
   <!--inicio do menu-->
   <?php
   include_once("menu.php")
   ?>
   
   <!--fim de menu-->
   <div class="container">
   <div class="jumbotron jumbotron-fluid " style="text-align: center">
    <h1> Produtos  </h1>
   </div>
   </div>   <br> <br>
  <div class="container-fluid">
        <section class="categorias">
         <h2>
         Categorias
        </h2>
         <br>
      <ul>
         <li onclick="retornaTodos()">
            Todos(12)
         </li>
         <li onclick="abrirProduto('geladeira')">
            Geladeiras(3)
         </li>
         <li onclick="abrirProduto('fogões')">
            Fogões(2)
         </li>
         <li onclick="abrirProduto('microondas')">
            Microondas(3)
         </li>
         <li onclick="abrirProduto('lavadora')">
            Lavadora de roupas(2)
         </li>
         <li onclick="abrirProduto('lava-louca')">
            Lava louças(2)
         </li>
      </ul>
      </section>
    
    <div class="produtos">
       <?php
         $sql="select * from produto";
         $result = $conn -> query ($sql);
         if($result->num_rows>0){
         while($rows = $result->fetch_assoc()){
         ?>  
  

         <div class="produto" id="<?php echo $rows["categoria"];?>"  >
            <img src="<?php echo $rows["imagem"];?>" onclick= "amplia(this)" >
            <br>
            <p class="descriçao"> <?php echo $rows["descrição"];?></p> <hr>
            <p class="precoAnt" style="text-decoration: line-through;"><?php echo $rows["preco"];?></p>
            <br>
            <h3 style="font-weight: bolder;" class="preço"><?php echo $rows["precofinal"];?></h3>
            <br>
         </div>
    
          <?php    
          }  
          } else{
           echo "Não existem produtos cadastrados";
          }
         ?>
        
    </div>
</div>
<!-- Inicio rodapé -->
<div class="container" style="align-itens:center">
  <h4 style="color:blue; font-size:25px;"> Formas de Pagamento</h4>
  <img src="./imagens/formas_de_pagamento.png" alt="Formas de Pagamento ">
  <p>&copy;Recode Pro</p>
  <h5> Desenvolvido por Willian Ferreira Santos | No curso Recode-pro</h5>
</div>
<!-- Fim rodapé -->
    
</body>
</html>