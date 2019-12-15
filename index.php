<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form action="buscador.php" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">
            <label for="selectCiudad">Ciudad:</label>
            <?php
              include 'back-end/conection.php';
              $mysqli->real_query("SELECT DISTINCT ciudad FROM t_estado;");
              $query  = $mysqli->store_result();
            ?>
            <select name="ciudad" id="selectCiudad">
              <option value="0" selected>Elige una ciudad</option>
              <?php while($row = $query->fetch_assoc()) {?>
                <option value="<?php echo $row['ciudad'];?>"><?php echo $row['ciudad'];?></option>
              <?php } ?>
            </select>

          </div>
          <div class="filtroTipo input-field">
            <label for="selecTipo">Tipo:</label><br>
            <?php
              $mysqli->real_query("SELECT DISTINCT tipo FROM t_estado;");
              $query  = $mysqli->store_result();
            ?>
             <select name="tipo" id="selectTipo">
              <option value="0" selected>Elige un tipo</option>
                <?php while($row = $query->fetch_assoc()) {?>
                  <option value="<?php echo $row['tipo'];?>"><?php echo $row['tipo'];?></option>
                <?php } ?>
              </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button" onclick="btnSearch()" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="divider">
        </div>
        <div id="content-result"></div>
        <button type="button" name="todos" class="btn-flat waves-effect" onclick="btnSearchAll()" id="mostrarTodos">Mostrar Todos</button>
      </div>

    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  
</body>
</html>
