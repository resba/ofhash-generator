 <?php
 //I don't believe in errors, therefore they are dead.
error_reporting(E_ERROR | E_PARSE);
//time to get rollin! hell yeah this is where the fun lives!
//Basically, the system works like this: if the $_GET function 'form' equals one
//s
if($_GET['form']=="1"){
require("hash/OfHash.php");
$hash = new OfHash();
$password = $_GET['string'];
$inputresult = $hash->hash($password);
}
if($_GET['form']=="2"){
    require("hash/OfHash.php");
    $hash = new OfHash();
    $input_password_string = $_GET['string1'];
    $stored_password_hash = $_GET['string2'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>OfHash Hash Generator For OpenFlame.</title>
    </head>
    <body>

        <h1>OfHash Hash Generator</h1>
<?php if($_GET['form']=="1"){ ?>
        <p>Hash Result: <input name="textfield" type="text" id="textfield" value="<?php echo $inputresult; ?>" size="150" readonly="readonly" /></p>
        <p>Your Hash Has been printed out above. Care to go another round?</p>
        <?php }else{ ?>
        <p>Put a text string in below to generate a hash.</p><?php } ?>
        <form id="form1" name="form1" method="get" action="index.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right">String:</td>
      <td><label>
        <input type="text" name="string" id="string" />
        <input type="hidden" name="form" id="form" value="1" />
      </label></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><label>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </label></td>
    </tr>
  </table>
</form>
        <hr />
        <h2>Hash Check</h2>
        <p>The hash check allows you to check the a password hash against an input string. You must supply the hash and the correct input string for this form to work.</p>
        <?php if($_GET['form']=="2"){ ?>
        <p><?php if($hash->check($input_password_string, $stored_password_hash)){
        echo "Hash check has succeeded. The input string does match the hash.";
    }else{
        echo "Hash check has failed.";
    } ?></p>
        <?php }else{ ?>
        <p>Put a text string in below to generate a hash.</p><?php } ?>
                <form id="form2" name="form2" method="get" action="index.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right">String:</td>
      <td><label>
        <input type="text" name="string1" id="string1" />
        <input type="hidden" name="form" id="form" value="2" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Stored Hash:</td>
      <td><label>
        <input type="text" name="string2" id="string2" />
      </label></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><label>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </label></td>
    </tr>
  </table>
</form>
        <hr />
        <p>OfHash Generator by <a href="http://www.github.com/resba">resba</a>. <a href="https://github.com/OpenFlame/OpenFlame-Framework">OfHash and OpenFlame Framework</a> by <a href="https://github.com/OpenFlame/">OpenFlame.</a></p>
        <ul>
            <li><a href="https://github.com/OpenFlame/OpenFlame-Framework/">OpenFlame Framework GitHub Repo</a></li>
            <li><a href="https://github.com/OpenFlame/OpenFlame-Framework/blob/master/readme.markdown">What is OpenFlame and OfHash OpenFlame README?</a></li>
            <li><a href="https://github.com/resba/ofhash-generator">OfHash Generator GitHub Repo</a></li>
            <li><a href="https://github.com/resba/ofhash-generator/blob/master/README.md">OfHash Generator README</a></li>
        </ul>
        <hr />
    </body>
</html>
