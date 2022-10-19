<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 4</title>
        <meta charset="UTF-8">
        <style>
          * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }

          body {
              background-image: url('https://static8.depositphotos.com/1154062/1071/v/950/depositphotos_10712741-stock-illustration-white-crumpled-abstract-background.jpg');
          }

          .form-register {
            width: 400px;
            background: #24303c;
            padding: 30px;
            margin: auto;
            margin-top: 200px;
            border-radius: 4px;
            font-family: 'calibri';
            color: white;
            box-shadow: 7px 13px 37px #000;
          }

          .form-register h4 {
            font-size: 22px;
            margin-bottom: 20px;
          }

          .controls {
            width: 100%;
            background: #24303c;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            border: 1px solid #1f53c5;
            font-family: 'calibri';
            font-size: 18px;
            color: white;
          }

          .form-register p {
            height: 40px;
            text-align: center;
            font-size: 18px;
            line-height: 40px;
          }

          .form-register a {          
              color: white;
              text-decoration: none;
          }

          .form-register a:hover {            
              color: white;
              text-decoration: underline;
          }

          .form-register .botons {            
              width: 100%;
              background: #1f53c5;
              border: none;
              padding: 12px;
              color: white;
              margin: 16px 0;
              font-size: 16px;
          }
        </style>
    </head>
    <body>
      <?php
      session_start();
      if(!empty($_SESSION["usuario"])){
        echo "Debes cerrar sesion";
        echo"<button onclick=\"window.location.href='cerrarsesion.php'\">Cerrar Sesión</button>";
        }else{
      ?>
        <form action="registro.php" method="post" class="form-register">
            <h4>Ingrese usuario y contraseña</h4>
            <input class="controls" type="text" name="usuario" id="usuario" placeholder="Ingrese su Nombre">
            <input class="controls" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su Contraseña">
            <input class="botons" type="submit" value="Entrar">  
            
        </form>
      <?php
      }
      ?>
        

    </body>
</html>