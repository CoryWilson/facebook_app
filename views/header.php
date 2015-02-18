<head>
  <meta charset="UTF-8">
  <title>Cory Wilson & Victor Cabieles | Lab 6</title>
  <link rel="stylesheet" href="css/foundation.min.css" type="text/css" />
  <link rel="stylesheet" href="css/main.css" type="text/css" />
  <link rel="stylesheet" href="css/slick.css" type="text/css" />
  <link rel="stylesheet" href="css/slick-theme.css" type="text/css" />

  <script src="js/vendor/jquery-1.11.2.min.js"></script>
  <script src="js/vendor/slick.min.js"></script>

  <script src="//use.typekit.net/jpd4eaw.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
</head>
<header>
  <div class="icon-bar four-up">
    <a href="index.php?controller=home" class="item">
      <label>Home</label>
    </a>
    <a href="<?= $par2 ?>" class="item">
      <label>Facebook Log In</label>
    </a> 
    <a href="index.php?controller=home&action=entryForm" class="item">
      <label>Create Entry</label>
    </a>
    <a href="index.php?controller=home&action=displayEntry" class="item">
      <label>Check Entry</label>
    </a>

  </div>
</header>