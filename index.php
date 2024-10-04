<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $errors = array();

      if (empty($name)) {
        $errors[] = "Поле ИМЯ не должно быть пустое";
      } elseif (strlen($name) < 5 || strlen($name) > 20) {
        $errors[] = "Имя должно содержать от 5 до 20 символов";
      }

      if (empty($email)) {
        $errors[] = "Поле ПОЧТА не должна быть пуста";
      } elseif (strlen($email) < 5 || strlen($email) > 30) {
        $errors[] = "Поле с почтой должно содержать от 5 до 30 символов";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неверный формат почты";
      }

      if (empty($phone)) {
        $errors[] = "Поле ТЕЛЕФОН не должно быть пустое";
      } elseif (strlen($phone) != 11) {
        $errors[] = "Поле ТЕЛЕФОН должно содержать 11 символов";
      }

      if (!empty($errors)) { ?>
        <form method="post">
          <label for="name">Имя</label>
          <input type="text" id="name" name="name"><br><br>

          <label for="email">Почта</label>
          <input type="email" id="email" name="email"><br><br>

          <label for="phone">Телефон</label>
          <input type="tel" id="phone" name="phone"><br><br>

          <input type="submit" value="Submit">
        </form>
        <? foreach ($errors as $error) { ?>
          <p class="error"><?= $error ?></p>
      <? }
        exit;
      } else {
        echo 'Валидация прошла успещго';
      }
    } else { ?>
      <form method="post">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Почта</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="phone">Телефон</label>
        <input type="tel" id="phone" name="phone"><br><br>

        <input type="submit" value="Submit">
      </form>
    <? }
    ?>
  </section>
</body>

</html>