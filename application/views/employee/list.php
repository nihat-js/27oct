<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
  }
    table tbody tr .actions {
      opacity: 0;
    }
    table tbody tr:hover > .actions {
      opacity: 1;
    }
    table button {
      background-color: transparent;
      border: none;
    }
    table button:hover{
      transform: scale(1.1);
    }
    .group{
      display: flex;
      align-items: center;
      gap : 10px;
      margin-bottom: 6px;
    }
    input {
      border : 1px solid #ccc;
      padding : 8px 12px;
      border-radius: 6px;
    }
    .searchbar{
      position: relative;
    }
    .searchbar input{
      width: 100%;
    }
    .searchbar .suggestions{
      border : 1px solid #efefef;
      position: relative;
    }
  </style>
</head>

<body>
  <?php
  $this->load->view('components/nav');
  ?>


  <div class="container">


    <form class="filter" action="">
      <h2> Filter </h2>
      <div class="searchbar">
        <input type="text" class="fullName"  name="fullName"   placeholder="Full Name">
        <div class="suggestions ">
          <!-- <p>Nihat A</p>
          <p> Zaur</p> -->
        </div>
      </div>

        <div class="group salary">
          <p>Salary </p>
          <input type="number" name="salaryMin" placeholder="Min ">
          <input type="number" name="salaryMax" placeholder=" Max ">
        </div>

        <div class="group">
          <p> Position </p>
          <select name="position">
            <option value="-1"> All </option>
            <?php foreach ($positions as $position) : ?>
              <option value="<?= $position->id ?>"> <?= $position->name ?> </option>
            <?php endforeach; ?>

          </select>
        </div>

        <button class="btn btn-primary" type="button" name="button"> Search </button>

    </form>

    <table class="table">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Start Date</th>
          <th>Position</th>
          <th>Salary</th>
          <th>  </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($employees as $employee) : ?>
          <tr>
            <td> <?= $employee->first_name ?> </td>
            <td> <?= $employee->last_name ?> </td>
            <td> <?= $employee->start_date ?> </td>
            <td> <?= $employee->position ?> </td>
            <td> <?= $employee->salary ?> </td>
            <td class="actions">
              <button onclick="handleDelete(<?=$employee->id?>)" >
                <svg width="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 496.158 496.158" xml:space="preserve" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path style="fill:#E04F5F;" d="M0,248.085C0,111.063,111.069,0.003,248.075,0.003c137.013,0,248.083,111.061,248.083,248.082 c0,137.002-111.07,248.07-248.083,248.07C111.069,496.155,0,385.087,0,248.085z"></path>
                    <path style="fill:#FFFFFF;" d="M383.546,206.286H112.612c-3.976,0-7.199,3.225-7.199,7.2v69.187c0,3.976,3.224,7.199,7.199,7.199 h270.934c3.976,0,7.199-3.224,7.199-7.199v-69.187C390.745,209.511,387.521,206.286,383.546,206.286z"></path>
                  </g>
                </svg>
              </button>

            </td>
          </tr>

        <?php endforeach  ?>
      </tbody>
    </table>

  </div>
  <script>
  const base_url = "<?= base_url() ?>"
  const button = document.querySelector("form button")
  const form = document.querySelector(".filter")
  const fullName = document.querySelector(".fullName")
  const suggestions = document.querySelector('.suggestions')



  fullName.onkeyup = handleSearchKeywords
  button.onclick = handleSearchFull


  async function handleSearchKeywords(){
    let formData = new FormData()
    let arr = form.fullName.value.trim().split(" ")
    formData.append('firstName',arr[0]?.toLowerCase() || '')
    formData.append('lastName',arr[1]?.toLowerCase() || '' )
    let response = await fetch(base_url + "employee/search_keyword_action", {
      method: "post",
      body: formData,
    })
    let data
    try{
      data = await response.json();
      suggestions.innerHTML=""
      data.forEach((item, i) => {
        let p = document.createElement('p')
        p.textContent =  ` ${item.first_name}  ${item.last_name}`
        suggestions.append(p)
      });

    }catch(e){
       data = await response.text();
    }finally{
      console.log({response,data})
    }
  }

  async function handleSearchFull(){
    let response = await fetch(base_url + "employee/search_full_action", {
      method: "post",
      body: formData,
    })
    let data
    try{
      data = await response.json();
      data.forEach((item, i) => {
        let t = `
        <tr>
            <td>  ${item.first_name} </td>
            <td> ${item.last_name} </td>
            <td>  ${item.start_date} </td>
            <td> ${item.position} </td>
            <td> ${item.salary}  </td>
            <td class="actions">
              <button onclick="handleDelete()" >
                <svg width="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 496.158 496.158" xml:space="preserve" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path style="fill:#E04F5F;" d="M0,248.085C0,111.063,111.069,0.003,248.075,0.003c137.013,0,248.083,111.061,248.083,248.082 c0,137.002-111.07,248.07-248.083,248.07C111.069,496.155,0,385.087,0,248.085z"></path>
                    <path style="fill:#FFFFFF;" d="M383.546,206.286H112.612c-3.976,0-7.199,3.225-7.199,7.2v69.187c0,3.976,3.224,7.199,7.199,7.199 h270.934c3.976,0,7.199-3.224,7.199-7.199v-69.187C390.745,209.511,387.521,206.286,383.546,206.286z"></path>
                  </g>
                </svg>
              </button>

            </td>
          </tr>
          `
          suggestions.append(t)

      });

    }catch(e){
       data = await response.text();
    }finally{
      console.log({response,data})
    }
    
  }



    function handleDelete(id){
      const answer = confirm('Are you sure you wanna delete user with  id ' + id)
      if (!answer) return false
    }
    // function
    // fetch("").then()
  </script>
</body>

</html>
