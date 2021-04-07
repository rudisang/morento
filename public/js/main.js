$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
      coverTrigger : false,
      constrainWidth : false,
    });
    $('.slider').slider();
    $('.materialboxed').materialbox();
    $('.modal').modal();
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $('input#input_text, textarea#textarea2').characterCounter();
    $('.collapsible').collapsible();


  });

  var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer',
    gutter: '.gutter-sizer',


  });
  // layout Masonry after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.masonry();
  });  