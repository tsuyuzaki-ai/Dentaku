<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DENTAKU</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h3>Dentaku</h3>

  <form action="dentaku.php" method="post">

    <?php

$one=$_POST["one"];
$two=$_POST["two"];
$num=$_POST["num"];
$button=$_POST["button"];
$result=$_POST['result'];
$ac=$_POST["ac"];


//クリア処理
if(isset($ac)){
  $one="";
  $two="";
  $button="";
  $ans="";
  $ac="";
  echo '<input type="text" value="" name="">';
}else{

// =が押されたら
    if (isset($result)) {
        if ($button==="÷") {
            $ans=$one/$two;
        }
        if ($button==="×") {
            $ans=$one*$two;
        }
        if ($button==="-") {
            $ans=$one-$two;
        }
        if ($button==="+") {
            $ans=$one+$two;
        }

        echo '<input type="text" value="'.$ans.'" name="one" class="one">'; //2?
    } else {

  //以下計算中

        if (isset($button)) { //演算子が押されていれば
        if (isset($one)) { //oneあり
            $ans=$one.$button;
            echo '<input type="text" value="'.$one.'" name="one" class="one">';
            echo '<input type="text" value="'.$button.'" name="button" class="button">';

            if (isset($two)) { //twoが二桁
              $ans=$two.$num; 
              echo '<input type="text" value="'.$ans.'" name="two" class="two">';
            } else { //twoはなし
                echo '<input type="text" value="'.$num.'" name="two" class="two">';
            }
        } else { //oneなし
          echo '<input type="text" value="' .$two.'" name="one" class="one">'; 
          echo '<input type="text" value="' .$button.'" name="button" class="button">';
        }
        } else {

      //以下数字処理
            if (isset($num)) {
                if (isset($two)) { //2桁
                    $ans=$two.$num;
                    echo '<input type="text" value=' .$ans.' name="two" class="two">';
                } else { //一桁
                    echo '<input type="text" value=' .$num.' name="two" class="two">';
                }
            } else {
          //以下何も押されていない場合
                echo '<input type="text" value="" name="ans" class="one">';
            }
        }
    }
}

?>

<!-- 保留 

echo "<br>1 $one<br>";
echo "2 $two<br>";
echo "3 $button<br>";
echo "4 $ans<br>";

    <input type="hidden" name="one" value="<?php echo $one; ?>" />
    <input type="hidden" name="button" value="<?php echo $button; ?>" />
    <input type="hidden" name="two" value="<?php echo $two; ?>" />
    <input type="hidden" name="set" value="<?php echo $ans; ?>" />
 -->

    <table>

      <colgroup>
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
      </colgroup>

      <tbody>
        <tr>
          <td><input type="submit" name="ac" value="AC"></td>
          <td><input type="submit" name="" value="+/-" class="none"></td>
          <td><input type="submit" name="" value="%" class="none"></td>
          <td><input type="submit" name="button" value="÷"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="7"></td>
          <td><input type="submit" name="num" value="8"></td>
          <td><input type="submit" name="num" value="9"></td>
          <td><input type="submit" name="button" value="×"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="4"></td>
          <td><input type="submit" name="num" value="5"></td>
          <td><input type="submit" name="num" value="6"></td>
          <td><input type="submit" name="button" value="-"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="1"></td>
          <td><input type="submit" name="num" value="2"></td>
          <td><input type="submit" name="num" value="3"></td>
          <td><input type="submit" name="button" value="+"></td>
        </tr>

        <tr>
          <td colspan="2" class="zero"><input type="submit" name="num" value="0" class="zero"></td>
          <td><input type="submit" name="button" value="."  class="none"></td>
          <td><input type="submit" name="result" value="="></td>
        </tr>
      </tbody>

    </table>
  </form>

</body>

</html>
