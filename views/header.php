<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->title; ?></title>

  <!-- Bootstrap -->
  <link href="<?= URL; ?>public/bootstrap-4.5.3/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= URL; ?>public/bootstrap-4.0.0/js/bootstrap.bundle.min.js"></script>
  <link href="<?= URL; ?>public/bootstrap-table-1.18.0/bootstrap-table.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?= URL; ?>public/jquery/jquery-3.5.1.min.js"></script>
  <script src="<?= URL; ?>public/popper/popper.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-4.5.3/js/bootstrap.min.js"></script>

  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/bootstrap-table.min.js"></script>
  <script src="<?= URL; ?>public/jquery/tableExport.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/bootstrap-table-locale-all.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/locale/bootstrap-table-pt-BR.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/extensions/i18n-enhance/bootstrap-table-i18n-enhance.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/extensions/export/bootstrap-table-export.min.js"></script>
  <script src="<?= URL; ?>public/bootstrap-table-1.18.0/bootstrap-table-filter-control.min.js"></script>
  

  <script src="<?= URL; ?>public/highcharts/highcharts.js"></script>
  <script src="<?= URL; ?>public/highcharts/data.js"></script>
  <script src="<?= URL; ?>public/highcharts/drilldown.js"></script>
  <script src="<?= URL; ?>public/highcharts/exporting.js"></script>
  <script src="<?= URL; ?>public/highcharts/export-data.js"></script>
  <script src="<?= URL; ?>public/highcharts/accessibility.js"></script>







  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    main>.container {
      margin-top: 18px;
      margin-bottom: 24px;
      padding: 60px 15px 0;

    }

    .footer {
      background-color: #f5f5f5;
    }

    .footer>.container {
      padding-right: 15px;
      padding-left: 15px;
    }

    code {
      font-size: 80%;
    }
  </style>

  <?php
  if (isset($this->js)) {
    foreach ($this->js as $js) {
      echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
  }
  ?>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="javascript:;">System PHP Javascript</a>
      <a class="navbar-brand" href="http://localhost/system-php-javascript/dashboard">Dashboard</a>
      <a class="navbar-brand" href="http://localhost/system-php-javascript/pessoa">Pessoa</a>
      <a class="navbar-brand" href="http://localhost/system-php-javascript/cidade">Cidade</a>
    </nav>
  </header>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">