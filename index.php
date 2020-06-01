<?php

require_once 'init.php';



$itemsQuery = $db->prepare("
  SELECT Id, description, isdone
  FROM item
  ");

$itemsQuery->execute([

    'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];


/*foreach ($items as $item) {
  # code...
  echo $item['description'], '<br>';
}*/

?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <title></title>
</head>

<body>
  <div id="page-wrap">
    <div id="header">
      <h1><a href="">PHP Sample Test App</a></h1>
    </div>

    <div id="main">
      <noscript>This site just doesn't work, period, without JavaScript</noscript>

      <ul id="list" class="ui-sortable">
        <li color="1" class="colorBlue draggable  " draggable="true" rel="1" id="2">
          <span id="2listitem" title="Double-click to edit..." style="opacity: 1;">Work
          List</span>

          <div class="draggertab draggable tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab" style="width: 44px; display: block; right: -64px;">
          </div>

          <div class="donetab tab"></div>
        </li>

        <li color="4" class="colorGreen "   draggable="true" rel="2" id="4">
          <span id="4listitem" title="Double-click to edit..." style=
          "opacity: 0.5;">Saibaan List<img src="/images/crossout.png" class="crossout"
          style="width: 100%; display: block;" /></span>

          <div class="draggertab  tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="1" class="colorBlue " rel="3" id="6">
          <span id="6listitem" title="Double-click to edit...">adfas</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="1" class="colorBlue " rel="4" id="7">
          <span id="7listitem" title="Double-click to edit...">adfa</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="1" class="colorBlue " rel="5" id="8">
          <span id="8listitem" title="Double-click to edit...">asdfas</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="1" class="colorBlue" rel="6" id="9">
          <span id="9listitem" title="Double-click to edit...">fasdfasdf</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="3" class="colorRed " rel="7" id="10">
          <span id="10listitem" title="Double-click to edit...">asdasfaf</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>
      </ul>
	  <br />


<?php if(!empty($items)): ?>
 <ul id="list" class="ui-sortable">

<?php foreach($items as $item):  ?>
        <li color="1" class="colorBlue draggable  " draggable="true" rel="1" id="2">
          <span id="2listitem" class="<?php echo $item['isdone'] ? ' isdone' : '' ?>" title="Double-click to edit..." style="opacity: 1;"><?php echo $item['description']; ?></span>

          <div class="draggertab draggable tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab sure">
          </div>
<a href="mark.php?as=done&item=<?php echo $item['Id'];   ?>">
          <div class="donetab tab" >
          </div></a>
        </li>
 <?php endforeach; ?>

      </ul>
      <?php else:?>
        <p>You Haven't added any items yet.</p>
      <?php endif; ?>
      <form action="add.php" id="add-new" method="post">
        <input type="text" id="new-list-item-text" name="name" />
        <input type="submit" id="add-new-submit" value="Add" class="button" />
      </form>

      <div class="clear"></div>
    </div>
  </div>

    <script  src="function.js"></script>
</body>
</html>
