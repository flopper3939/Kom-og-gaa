<h2>Min Side</h2>


<form method="POST" action="<?php echo _HOST_ ?>/forms/update_student.php">
  <div class="form-group">
    <label for="f_name">Fornavn:</label>
    <input type="text" class="form-control" name="firstname" id="f_name" value="<?php echo $context->student->first_name ?>">
  </div>
  <div class="form-group">
    <label for="l_name">Efternavn:</label>
    <input type="text" class="form-control" name="lastname" id="l_name" value="<?php echo $context->student->last_name ?>">
  </div>
  <input type="hidden" name="student_id" value="<?php echo $context->student->id_student ?>">
  <?php 
  echo CSRF::getFormToken();
  ?>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>