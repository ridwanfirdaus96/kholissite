<?php
include('header/header.php');?>
<section class="section">
    <div class="container">
      <h1 class="title">
        Hallo
      </h1>
      <p class="subtitle">
        Nama saya <strong>Kholis</strong>!
      </p>
    </div>
  </section>
<?php
$variablename = 'foo';
$foo = 'bar';
$data = ["response" => "Hello World"];
echo json_encode($data);
echo '<p>' . $foo . '</p>';
echo ${$variablename};
echo $$variablename;
?>
</body>
</html>

