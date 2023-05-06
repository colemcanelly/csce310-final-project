<!-- All Written By: Cole McAnelly                  -->
<!-- 
    This file acts as a basic layout for the entire
    website for uniformity, all pages use this layout
    this is made possible through PHP. Because every page
    uses this, I also include some global styles (like bootstrap)
    and scripts.
 -->
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  
  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  <!-- BOOTSTRAP STYLES -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="h-100 d-flex flex-column">
  <?php include('api/config.php'); ?>
  <?php include("components/header.php"); ?>
  <?php include($childView); ?>

  <!-- BOOTSTRAP SCRIPTS -->
  <!-- MDB https://mdbootstrap.com/docs/ -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>