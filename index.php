<?php

require_once 'init.php';

 $n=1;

 
$itemsQuery = $db->prepare("
  SELECT Id, description, isdone, itemPosition, listColor
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

if( isset($_POST['Color']) && isset($_POST['Id']) ){
 echo $_POST['Color'];
 echo $_POST['Id'];

 $Color = $_POST['Color'];
 $description    = $_POST['Id'];
require_once 'init.php';

    if ($Color =="#c15c5c") {
     $up = $db->prepare("
       UPDATE item
       SET listColor = '#c15c5c'
      WHERE description = '$description' 
        ");
      $up->execute([
     'user' => $_SESSION['user_id']
      ]);
  echo "red";
}elseif($Color =="#91bf4b"){
  $up = $db->prepare("
       UPDATE item
       SET listColor = '#91bf4b'
      WHERE description = '$description' 
        ");
      $up->execute([
     'user' => $_SESSION['user_id']
      ]);
  echo "green";

}elseif($Color =="#73b8bf"){
  $up = $db->prepare("
       UPDATE item
       SET listColor = '#73b8bf'
      WHERE description = '$description' 
        ");
      $up->execute([
     'user' => $_SESSION['user_id']
      ]);
  echo "blue";

}else{
    echo "not success";
}

 exit;
}


// if (isset($_POST['update'])){
//   echo $_POST['update'];
//   print_r($_POST['postions']);
//   foreach ($_POST['postions'] as $postion => $update) {
//     $index = $postion[0];
//     $newPosition = $postion[1];

//       require_once 'init.php';

//        $pos = $db->prepare("
//        UPDATE item
//        SET itemPosition = $newPosition
//       WHERE Id = $index
//         ");
//       $pos->execute([
//      'user' => $_SESSION['user_id']
//       ]);


//     # code...
//   }
//   exit('success');
// }


?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
  <link rel="stylesheet" href="style.css" type="text/css" />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

   <div id='response'></div>
<?php if(!empty($items)): ?>
 <ul id="list" class="sortable listitems ui-sortable">

<?php 
 
foreach($items as $item):

   $in = $item['itemPosition'];
 ?>
      <?php
      $col=$item['listColor'];
    
      if ($col=="#91bf4b") {
       $bgcl="colorGreen";
      }elseif($col=="#c15c5c"){
        $bgcl="colorRed";
      }elseif($col=="#73b8bf"){
        $bgcl="colorBlue";
      }
      ?>

        <li data-index="<?php echo $item['Id'];?>" id="<?php echo $item['itemPosition'];?>"  color="<?php echo $item['itemPosition']; ?>listitem" class="<?php echo $bgcl ?>" rel="1" data-position="<?php echo $item['itemPosition'];?>" >
          <span  class="changed  <?php echo $item['isdone'] ? ' isdone' : '' ?>" title="Double-click to edit..."><?php echo $item['description']; ?> </span>
         
          <div class="draggertab tab"></div>

          <div id="color_tab" class="colortab tab" ></div>

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
<!--     <script>


      function randomize(obj , n) {
     // var x= document.getElementsByClassName('changed');
     // var i=0;
     // // for (i = 0; i < x.length; i++) {
     // x[i].style.background = randomColors();
     // }        
     $(this).parent('li').find('.changed').css('background', randomColors());
    // document.getElementsByClassName('changed')[n-1].style.background = randomColors();
      }
     

// random colors - taken from here:
// http://www.paulirish.com/2009/random-hex-color-code-snippets/

      function randomColors() {
      return  '#' + Math.floor(Math.random() * 16777215).toString(16);
      }
    </script> -->

    <!--  <script>
    $( function() {
    $( ".sortable" ).sortable({
      update: function(event, ui){
        $(this).sortable('serialize');
      }

    });
    // $( ".sortable" ).disableSelection();
  } );
  </script> -->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>
