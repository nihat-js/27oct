<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Add </title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php $this->load->view("components/nav");  ?>
  <div class="container mt-5">

    <form method="POST" class="form-add" onsubmit="handleForm" autocomplete="on">
      <h2> Add Employee </h2>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter your first name" value="">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter your last name">
      </div>
      <div class="form-group">
        <label for="startDate">Start Date</label>
        <input type="date" name="startDate" class="form-control" id="startDate" value="<?php echo date('Y-m-d'); ?>" >
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <select class="form-control" id="position" name="position">

          <?php foreach ($positions as $position) : ?>
            <option value="<?= $position->id ?>"> <?= $position->name ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" min="0" name="salary" class="form-control" id="salary" placeholder="Enter your salary">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>



  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    const base_url = "<?= base_url() ?>"
    const button = document.querySelector("form button")
    const form = document.querySelector(".form-add")

    button.onclick = handleForm


    async function handleForm(e) {
      e.preventDefault();
      let formData = new FormData(form)
      // for (var pair of formData.entries()) {
      //   console.log(pair[0] + ', ' + pair[1]);
      // }
      // formData.set("salary","yoxlamaq")
      let response = await fetch(base_url + "employee/add_action", {
        method: "post",
        body: formData,
      })
      let data = await response.text();
      console.log({response,data})

      if (response.status != 201){
        alert('something went wrong.Error code ' +data);
        return false;
      }

      alert('Added Successfully');
      form.reset();



    }
  </script>


</body>

</html>
