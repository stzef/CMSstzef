<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    header('Location: elfinder.php');
    exit();
}

if(!isset($_SESSION['authorized'])){

if(isset($_POST['submit'])){
    if($_POST['username'] =='admin' && $_POST['password'] == 'mypassword'){
        $_SESSION['authorized'] = true;
        header('Location: elfinder.php');
        exit();
    }
}

?>

<form action='' method='post' autocomplete='off'>
<p>Username: <input type="text" name="username" value=""></p>
<p>Password: <input type="password" name="password" value=""></p>
<p><input type="submit" name="submit" value="Login"></p>
</form>

<?php } else { ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>elFinder 2.1.x source version with PHP connector</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
 <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="./js/elfinder.min.js"></script>

    <!-- Require JS (REQUIRED) -->
    <!-- Rename "main.default.js" to "main.js" and edit it if you need configure elFInder options or any things -->
    <script data-main="./main.js" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js"></script>

  </head>
  <body>
    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>
    <script type="text/javascript">
  var FileBrowserDialogue = {
    init: function() {
      // Here goes your code for setting your custom things onLoad.
    },
    mySubmit: function (file, elf) {
      // pass selected file data to TinyMCE
      parent.tinymce.activeEditor.windowManager.getParams().oninsert(file, elf);
      // close popup window
      parent.tinymce.activeEditor.windowManager.close();
    }
  }

  $().ready(function() {
    var elf = $('#elfinder').elfinder({
      // set your elFinder options here
      url: './php/connector.minimal.php',  // connector URL
      getFileCallback: function(file) { // editor callback
        // Require `commandsOptions.getfile.onlyURL = false` (default)
        FileBrowserDialogue.mySubmit(file, elf); // pass selected file path to TinyMCE
      }
    }).elfinder('instance');
  });
</script>
  </body>
</html>
<?php } ?>
