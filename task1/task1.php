<!DOCTYPE html>
<html>
  <head>
    <title>Генератор пароля</title>
  </head>

    <body>
      <h1>Генератор пароля</h1>
    
    <?php
      function generatePassword($lenght = 0) {
        $characters = implode(array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9)));
        $generatedPassword = "";
        for ($i=0; $i<$lenght; $i++) {
            $generatedPassword .= $characters[rand(0, strlen($characters) -1)];
        }
        return $generatedPassword;
      }

      $password = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $passwordLength = $_POST["passwordLength"];
          $password = generatePassword($passwordLength);
      }
    ?>
      
      <form action="" method="post">
        <label for="passwordLength">Количество знаков пароля:</label>
        <input type="number" id="passwordLength" name="passwordLength" required>
        
        <label for="generatedPassword">Полученный пароль:</label>
        <input type="text" id="generatedPassword" name="generatedPassword" value="<?php echo $password?>" readonly>
        
        <button type="submit">Сгенерировать</button>
      </form>
    

    </body>
</html>

