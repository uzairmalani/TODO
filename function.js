$(function() {
  $(".colortab").click(function() {

     $(this).parent('li').find('.changed').each(function(index) {
      var back = ["#73b8bf","#91bf4b",'#c15c5c'];
      var rand = back[Math.floor(Math.random() * back.length)];
      // $('div').css('background',rand);
      // var colorR = Math.floor((Math.random() * 256));
      // var colorG = Math.floor((Math.random() * 256));
      // var colorB = Math.floor((Math.random() * 256));
      $(this).css("background", rand);
      var str = $(this).text();

        $.ajax({
        method: 'POST',
        url: 'index.php',
        data: {ajax: 1, Color: rand, Id : str},
       success: function(res){

       console.log('Color', res)
    }
  });

    });
  });
});

// On double click show the input box
$( ".text-changed").dblclick(function() {

  $( ".text-changed").hide();
  $( "#text1_input").val($( ".text-changed" ).html()); // Copies the text of the span to the input box.
  $( "#text1_input").show();
  $( "#text1_input").focus();
  
});

// What to do when user changes the text of the input
function textChanged(){

  $( "#text1_input").hide();
  $( ".text-changed").html($( "#text1_input" ).val()); // Copies the text of the input box to the span.
  $( ".text-changed").show();
      
  // Here update the database
      
}

// On blur and on enter pressed, call the textChanged function
$( "#text1_input").blur(textChanged);
$( "#text1_input").keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    textChanged();
    return false;  
  }
});

jQuery(function($) {
    $('.delete').click(function() {
          $('.deletetab', this).addClass('deleted');
            setTimeout(function () {
           $('.deletetab').removeClass('deleted');
        }, 1000);
           return false;
    }).dblclick(function() {
        window.location = this.href;
        return false;
    });
});

$(function(){
 $(".sortable").sortable({
  stop: function(event, ui){
    var parameters = $(this).sortable("toArray");
    $.post("save.php",{value:parameters}, function(result){})
  }
 })
});



// $( function() 
// {
//     $( ".sortable" ).sortable(
//     {
//       update: function(event, ui)
//       {
//       //   $(this).children().each(function (index){
//       //     if ($(this).attr('data-postion') != (index+1)){
//       //         $(this).attr('data-postion', (index+1)).addClass('updated');
//       //     }
//       //   });

//       //   saveNewPositions();

//         var postData = $(this).sortable('serialize');
//         console.log(postData);
//         $.post('save.php', {list: postData}, function(o){
//             console.log(0);
//         }, 'json');

//      }

//     });
//     // $( ".sortable" ).disableSelection();
// });
    
function saveNewPositions(){
    var positions = [];
    $('.updated').each(function(){
      positions.push([$(this).attr('data-index'), $(this).attr('data-postion')]);
      $(this).removeClass('updated');

    });
    alert(positions);

    $.ajax({
      url: 'index.php',
      method: 'POST',
      dataType: 'text',
      data: {
        update: 1,
        positions: positions
      }, success: function(response){
        console.log(response);
      }
    });
}


$(function() {
  $(".listitems li").sort(sort_li).appendTo('.listitems');
  function sort_li(a, b) {
    return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;
  }
});


// var btn = document.querySelector('.add');
// var remove = document.querySelector('.draggable');
 
// function dragStart(e) {
//   this.style.opacity = '0.4';
//   dragSrcEl = this;
//   e.dataTransfer.effectAllowed = 'move';
//   e.dataTransfer.setData('text/html', this.innerHTML);
// };
 
// function dragEnter(e) {
//   this.classList.add('over');
// }
 
// function dragLeave(e) {
//   e.stopPropagation();
//   this.classList.remove('over');
// }
 
// function dragOver(e) {
//   e.preventDefault();
//   e.dataTransfer.dropEffect = 'move';
//   return false;
// }
 
// function dragDrop(e) {
//   if (dragSrcEl != this) {
//     dragSrcEl.innerHTML = this.innerHTML;
//     this.innerHTML = e.dataTransfer.getData('text/html');
//   }
//   return false;
// }
 
// function dragEnd(e) {
//   var listItens = document.querySelectorAll('.draggable');
//   [].forEach.call(listItens, function(item) {
//     item.classList.remove('over');
//   });
//   this.style.opacity = '1';
// }
 
// function addEventsDragAndDrop(el) {
//   el.addEventListener('dragstart', dragStart, false);
//   el.addEventListener('dragenter', dragEnter, false);
//   el.addEventListener('dragover', dragOver, false);
//   el.addEventListener('dragleave', dragLeave, false);
//   el.addEventListener('drop', dragDrop, false);
//   el.addEventListener('dragend', dragEnd, false);
// }
 
// var listItens = document.querySelectorAll('.draggable');
// [].forEach.call(listItens, function(item) {
//   addEventsDragAndDrop(item);
// });
 
// function addNewItem() {
//   var newItem = document.querySelector('.input').value;
//   if (newItem != '') {
//     document.querySelector('.input').value = '';
//     var li = document.createElement('li');
//     var attr = document.createAttribute('draggable');
//     var ul = document.querySelector('ul');
//     li.className = 'draggable';
//     attr.value = 'true';
//     li.setAttributeNode(attr);
//     li.appendChild(document.createTextNode(newItem));
//     ul.appendChild(li);
//     addEventsDragAndDrop(li);
//   }
// }
 


