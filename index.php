<?php

require_once 'init.php';

 $n=1;

$itemsQuery = $db->prepare("
  SELECT Id, description, isdone, itemPosition
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

     <!--  <ul id="list" class="ui-sortable">
        <li color="1" class="colorBlue draggable  " draggable="true" rel="1" id="2">
          <span id="2listitem" title="Double-click to edit..." style="opacity: 1;">Work
          List</span>

          <div class="draggertab draggable tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab deleted" >
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

          <div class="colortab tab">
              
            </button>

          </div>

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

          <div class="colortab tab" ></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="1" class="colorBlue" rel="6" id="9">
          <span id="9listitem"  title="Double-click to edit...">fasdfasdf</span>

          <div class="draggertab tab"></div>

          <div class="colortab tab"></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>

        <li color="3" class="colorRed " rel="7" id="10">
          <span id="10listitem" class="text-changed"  title="Double-click to edit...">asdasfaf</span>
          <Input id="text1_input" style="display:none"/>
          <div class="draggertab tab"></div>

          <div class="colortab tab" ></div>

          <div class="deletetab tab"></div>

          <div class="donetab tab"></div>
        </li>
      </ul>
	  <br />
 -->

<?php if(!empty($items)): ?>
 <ul id="list" class="listitems ui-sortable">

<?php 
 
foreach($items as $item):

   $in = $item['itemPosition'];
 ?>

        <li data-position="<?php echo $item['itemPosition'];?>" color="<?php echo $item['itemPosition']; ?>listitem" class="colorBlue draggable" draggable="true" rel="1" id="2">
          <span id="changed" class="changed <?php echo $item['isdone'] ? ' isdone' : '' ?>" title="Double-click to edit..."><?php echo $item['description']; ?></span>
         
          <div class="draggertab tab"></div>

          <div class="colortab tab" onclick="randomize(<?php echo $in ?>)"></div>

           <a class="delete" href="del.php?as=done&item=<?php echo $item['Id'];   ?>">
          <div id="delete_tab" class="deletetab tab" >

          </div>
        </a>
<a href="mark.php?as=done&item=<?php echo $item['Id'];   ?>">
          <div class="donetab tab" >
          </div></a>
        </li>

 <?php $n=$n+1; endforeach;?>

      </ul>
      <?php else:?>
        <p>You Haven't added any items yet.</p>
      <?php endif; ?>

      <form action="add.php?n=<?php echo $n ?>" id="add-new" method="post">
        <input type="text" id="new-list-item-text" name="name" />
        <input type="submit" id="add-new-submit" value="Add" class="button" />
      </form>

      <div class="clear"></div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  src="function.js"></script>
    <script>


      function randomize(n) {
     // var x= document.getElementsByClassName('changed');
     // var i=0;
     // // for (i = 0; i < x.length; i++) {
     // x[i].style.background = randomColors();
     // }


    
         
  document.getElementsByClassName('changed')[n-1].style.background = randomColors();
      }
     

// random colors - taken from here:
// http://www.paulirish.com/2009/random-hex-color-code-snippets/

      function randomColors() {
      return  '#' + Math.floor(Math.random() * 16777215).toString(16);
      }
    </script>

</body>
</html>
