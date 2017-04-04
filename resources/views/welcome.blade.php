@extends('layouts.app')

@section('content')
<div class="container">
   <div class="jumbotron" style="background-image: url('images/glassesbackground.jpg'); opacity: 0.8;">
      <h1 class="logo-lg"><b>Opti</b>Web</h1>
      <p>Una solución que se ajusta a tus necesidades</p>

      <div class="row">
         <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="background-color: #4b646f;">
               <img src="images/inicio.png" alt="..." style="height: 200px; width: 250px; padding-top: 12px;">
               <div class="caption" style="color: white">
                  <h3>Navegación</h3>
                  <p>Menú intuitivo, sin complejidades.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="background-color: #4b646f;">
               <img src="images/recetas.png" alt="..." style="height: 200px; width: 250px; padding-top: 12px;">
               <div class="caption" style="color: white">
                  <h3>Gestión de recetas</h3>
                  <p>Accede a las recetas de tus clientes de forma rápida y sencilla.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="background-color: #4b646f;">
               <img src="images/ingresoarticulo.png" alt="..." style="height: 200px; width: 250px; padding-top: 12px;">
               <div class="caption" style="color: white">
                  <h3>Inventario</h3>
                  <p>Ten el control de tus productos.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
