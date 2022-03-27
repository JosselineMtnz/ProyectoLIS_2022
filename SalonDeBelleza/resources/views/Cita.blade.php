<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="css/bootstrap.min.css">
    @section('title', 'Servicios')
</head>
<body>
    @extends('Navbar')
    @section('navbar')
    <div class="container mt-5 mb-5">
        <h1>Haz tu Cita.</h1>
        <form action="" class="border rounded p-3">
          <div class="d-md-flex">
            <div class="col-md-8">
              <div class="form-group">
                <label for="fecha">Fecha</label>
                <input
                  type="date"
                  name="fecha"
                  placeholder="Ingresa Fecha.."
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="hora">Hora</label>
                <input
                  type="time"
                  name="hora"
                  placeholder="Ingresa Hora.."
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="servicio">Servicio</label>
                <div class="d-flex flex-row">
                  <select class="form-control" id="sel1">
                    <option>Maquillaje</option>
                    <option>Peinado</option>
                    <option>Manicure</option>
                    <option>Pedicure</option>
                  </select>
                  <button class="btn btn-success d-inline mx-2" type="button">
                    +
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label for="mesaje">Mensaje</label>
                <textarea
                  class="form-control"
                  rows="5"
                  id="mesaje"
                  name="text"
                  placeholder="Describe tu cita aqui..."
                ></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <label for="sel2">Tus Servicios (max 3)</label>
              <select multiple class="form-control" id="sel2" name="sellist2">
                <option>Maquillaje</option>
                <option>Peinado</option>
                <option>Manicure</option>
              </select>
            </div>
          </div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary mt-2">Agendar</button>
          </div>
        </form>
      </div>
  
      <!-- jQuery library -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  
      <!-- Popper JS -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  
      <!-- Latest compiled JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection

</body>
</html>