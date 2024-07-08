@extends('coordinador.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Panel de información coordinador</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Personal</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Entrevistas</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Promociones</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Programas activos</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>






    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="section-header">
            <h1>Actividades de hoy</h1>
          </div>

          <div class="card-body">
            <div class="card-header">
              <h4>Entrevistas</h4>
            </div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Tema</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Modalidad</th>
                  <th scope="col">Programa</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Juanes</td>
                  <td>Nuevo èxito</td>
                  <td>8:00pm</td>
                  <td>Presencial</td>
                  <td>Frente Cuarenta</td>
                  <td><a href="info-entrevista.html" class="btn btn-info" > <i class="bi bi-eye-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="editar_entrevista.html" class="btn btn-warning"><i class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="" class="btn btn-danger" ><i class="bi bi-trash3-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Juanes</td>
                  <td>Nuevo èxito</td>
                  <td>8:00pm</td>
                  <td>Presencial</td>
                  <td>Frente Cuarenta</td>
                  <td><a href="info-entrevista.html" class="btn btn-info" > <i class="bi bi-eye-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="editar_entrevista.html" class="btn btn-warning"><i class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="" class="btn btn-danger" ><i class="bi bi-trash3-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a></td>
              
                </tr>

              </tbody>
            </table>


            <div class="card-header">
              <h4>Promociones </h4>
            </div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripciòn</th>
                  <th scape="col">Acción</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Entras</td>
                  <td>Entradas para ver a juanes</td>
                  <td><a href="" class="btn btn-info" > <i class="bi bi-eye-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="editar_entrevista.html" class="btn btn-warning"><i class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="" class="btn btn-danger" ><i class="bi bi-trash3-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a></td>
              

                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Entras</td>
                  <td>Entradas para ver a juanes</td>
                  <td><a href="" class="btn btn-info" > <i class="bi bi-eye-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="editar_entrevista.html" class="btn btn-warning"><i class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a>|<a href="" class="btn btn-danger" ><i class="bi bi-trash3-fill" style="font-size: 1rem; color: rgb(255, 255, 255);"></i></a></td>
              

                </tr>

              </tbody>
            </table>




          </div>
        </div>
      </div>

    </div>




  </section>
@endsection