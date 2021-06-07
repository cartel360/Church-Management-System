<?php
function generateRandomString($length = 10)
{
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

?>

<div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Enter Your Giving</i></div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <form method="post">
          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="amount" id="focusedInput" type="text" placeholder="Amount" required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="trcode" id="focusedInput" type="text" value="<?php echo generateRandomString() ?>" readonly required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="for" id="focusedInput" type="text" placeholder="Giving Towards" required>
            </div>
          </div>


          <div class="control-group">
            <div class="controls">
              <button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#save').tooltip('show');
                  $('#save').tooltip('hide');
                });
              </script>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /block -->
</div>

<?php

if (isset($_POST['save'])) {
  $firstname = $_POST['amount'];
  $lastname = $_POST['trcode'];
  $username = $_POST['for'];




  mysqli_query($conn, "insert into giving (Amount,Trcode,na,ya) values('$firstname','$lastname','$session_id','$username')") or die(mysqli_error());

?>
  <script>
    window.location = "giving.php";
    $.jGrowl("The Giving Successfully added", {
      header: 'Giving added'
    });
  </script>
<?php
}

?>