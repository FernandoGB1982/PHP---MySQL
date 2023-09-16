<!DOCTYPE HTML>  
<html>
<head>
  <title>PHP-MySQL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      /*background-color: rgb(185, 169, 169);*/
      background-image: url(imagenes/fondo.gif);
    }

    @font-face {
      font-family: 'vintage2';
      src: url('fuentes/vintage2.ttf') ;
    }

    h1{
      color: rgb(196, 13, 92);
      text-align: center;
      margin: 0 auto;
      font-family: 'vintage2';
      font-style: italic;
      font-size: 60px;
    }
  
  
    h2 {
      color: #333;
      text-align: center;
      margin: 0 auto;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color:rgb(198, 100, 207,0.8);
      border-radius: 5px;
      box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.4);
    }

    #salida {
      display: block;
      margin-bottom: 10px;
      text-align: center;
    }

    input[type=text]{
      width: 100%;
      box-sizing: border-box;
    }
    
    input[type=email]{
      width: 100%;
      box-sizing: border-box;
    }

    input[type=date]{
      width: 100%;
      box-sizing: border-box;
    }

    #volver{
      color: rgb(196, 13, 92);
      display: block;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Consulta por Provincia</h1>
  <hr>
  <?php
    $conexion = mysqli_connect("localhost", "root", "", "base1") or
      die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "select DISTINCT provincia
                          from alumnos order by provincia") or
      die("Problemas en el select:" . mysqli_error($conexion));
  ?>
  <form action="listadoAlumnosProvincia.php" method="post">
    Seleccione la provincia:
    <select name="provincia">
        <option value="">Selecciona una provincia</option>';
      <?php
      while ($reg = mysqli_fetch_array($registros)) {
        $provincia = $reg['provincia'];
        echo '<option value="'.$provincia.'">'.$provincia.'</option>';
      }
      ?>

    </select>
    <br><br>
    <input type="submit" value="Consultar">
  </form>
  <br><a id='volver' href="index.html">Volver al inicio</a><br>
</body>
</html>