<nav class="nav">
  <a href="<?php echo  base_url() . "" ?>"> Home </a>
  <a href="<?php echo  base_url() . "employee/all" ?>"> All Employees </a>
  <a href="<?php echo  base_url() . "employee/add" ?>"> Add Employee </a>
</nav>


<style>
  nav.nav {
    background-color: #333;
    overflow: hidden;
  }

  nav.nav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  nav.nav a:hover {
    background-color: #ddd;
    color: black;
  }

  nav.nav a.active {
    background-color: #4CAF50;
    color: white;
  }

  nav.nav .icon {
    display: none;
  }
</style>