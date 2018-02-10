<div class="container">
     <div class="row">
         <div class="col-lg-6 mx-auto">
             <div class="card">
                 <div class="card-header">
                     Featured
                 </div>
                 <div class="card-body">

                     <form action="controllers/login.php" method="POST">

                         <div class="form-group">
                             <label for="userName">Usuario:</label>
                             <input type="text" class="form-control" name="userName" id="userName" placeholder="Usuario">
                         </div>

                         <div class="form-group">
                             <label for="userPass">Contraseña:</label>
                             <input type="password" class="form-control" name="userPass" id="userPass" placeholder="Password">
                         </div>

                         <div class="form-group">
                             <label for="userTipo">Tipo de Usuario:</label>
                             <select class="form-control" id="userTipo" name="userType">
                              <option value="0">-- Seleccione --</option>
                              <option value="1">Alumno</option>
                              <option value="2">Docente</option>
                            </select>
                         </div>

                         <button type="submit" name="submit" class="btn btn-primary" disabled>Submit</button>
                     </form>

                 </div>
             </div>
         </div>
     </div>

 </div>
