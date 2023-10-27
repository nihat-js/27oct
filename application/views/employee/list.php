<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
      $this->load->view('components/nav');
    ?>

    <form name="filter" action="">
      <h2> Filter </h2>
        <input type="text" name="keywords">

        <input type="text" name="minWage" placeholder="Min wage">
        <input type="text" name="maxWage" placeholder=" Max wage">
        <select>
          <?php foreach ($positions as $position): ?>
            <option value="<?=$position->id ?>">   <?=$position->name ?>  </option>
          <?php endforeach; ?>

        </select>
        <input type="text">
    </form>

      <table>
      </table>

    <script>
        fetch("").then()
    </script>
</body>

</html>
