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


$(function() {
  $(".listitems li").sort(sort_li).appendTo('.listitems');
  function sort_li(a, b) {
    return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;
  }
});


var btn = document.querySelector('.add');
var remove = document.querySelector('.draggable');
 
function dragStart(e) {
  this.style.opacity = '0.4';
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
};
 
function dragEnter(e) {
  this.classList.add('over');
}
 
function dragLeave(e) {
  e.stopPropagation();
  this.classList.remove('over');
}
 
function dragOver(e) {
  e.preventDefault();
  e.dataTransfer.dropEffect = 'move';
  return false;
}
 
function dragDrop(e) {
  if (dragSrcEl != this) {
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }
  return false;
}
 
function dragEnd(e) {
  var listItens = document.querySelectorAll('.draggable');
  [].forEach.call(listItens, function(item) {
    item.classList.remove('over');
  });
  this.style.opacity = '1';
}
 
function addEventsDragAndDrop(el) {
  el.addEventListener('dragstart', dragStart, false);
  el.addEventListener('dragenter', dragEnter, false);
  el.addEventListener('dragover', dragOver, false);
  el.addEventListener('dragleave', dragLeave, false);
  el.addEventListener('drop', dragDrop, false);
  el.addEventListener('dragend', dragEnd, false);
}
 
var listItens = document.querySelectorAll('.draggable');
[].forEach.call(listItens, function(item) {
  addEventsDragAndDrop(item);
});
 
function addNewItem() {
  var newItem = document.querySelector('.input').value;
  if (newItem != '') {
    document.querySelector('.input').value = '';
    var li = document.createElement('li');
    var attr = document.createAttribute('draggable');
    var ul = document.querySelector('ul');
    li.className = 'draggable';
    attr.value = 'true';
    li.setAttributeNode(attr);
    li.appendChild(document.createTextNode(newItem));
    ul.appendChild(li);
    addEventsDragAndDrop(li);
  }
}
 


