<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  </head>
<body>

<style>

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;

  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: #EAECEE;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: #808B96;
  width: 100%;
  z-index: 1;
  padding:5px
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
  <a class="navbar-brand" href="<?=base_url("listar")?>">Fut UMG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url("listarJugador")?>">Jugadores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url("listarGoles")?>">Registro de Goles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="<?=base_url("listartIncidencias")?>">incidencias</a>
      </li>
    <div class="subnav nav-item">
      <button class="subnavbtn nav-link">Reportes <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        <a class="nav-link"  href="<?=base_url("golPDF")?>">Reporte de Goleadores</a>
        <a class="nav-link"  href="<?=base_url("jugadorPDF")?>">Reporte de Jugadores</a>
        <a class="nav-link"  href="<?=base_url("reporteIncidencia")?>">Reporte de Incidencias</a>
        </div>
  </div> 
    </ul>
  </div>
</nav>

<div class="container mt-5">


       