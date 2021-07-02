
<?php

session_start();
$connect = mysqli_connect("localhost","root","","bd_reinvisit");

if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"])){
  $user = mysqli_real_escape_string($connect, $_REQUEST["user"]);
  $pass = md5(mysqli_real_escape_string($connect, $_REQUEST["pass"]));
  $sql = "SELECT tb4_codfuncionario, tb4_emailfuncionario,tb4_nomefuncionario FROM tb4_funcionario WHERE tb4_emailfuncionario='$user' AND tb4_senhafuncionario='$pass'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["user"] = $data["tb4_nomefuncionario"];
    $_SESSION["codfuncionario"] = $data["tb4_codfuncionario"];
    // if ($data["status"]== 0){
    //   echo "conta não confirmada";
    // }
    echo "1";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
