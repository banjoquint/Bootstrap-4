<!---This is an initial stab at using Bootstrap 4 on a project. The initial idea is to sort out a database, get connected, and using forms and modals process some information in a CRUD way. -->
<!-- Then do the same in Bootstrap 5 -->

<?php 
  $title= 'Index';
  require_once 'includes/header.php';
    ?>
      <body>
          <h1><!--This section will describe the structure of the form which will display the details of the selected record and consequently basically be the structure of -->
        <!-- modal which will display and update that record--> </h1>
        <div id="modal_id">
          <!-- comment -->
          <form>
                <div class="form-group">
                  <label for="exampleUsername">Username</label>
                  <input type="email" class="form-control" id="exampleUsername1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleFirst Name">First Name</label>
                  <input type="password" class="form-control" id="exampleFirst Name">
                </div>
                <div class="form-check">
                  <input type="text" class="form-control" id="exampleLast_Name">
                  <label class="" for="exampleLast_Name">Last Name</label>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Sex</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>F</option>
                    <option>M</option>
                  </select>
                </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <?php 
          require_once 'includes/footer.php';
      ?>
      </body>
