$(document).ready(function(){
  //hides all but first page on startup
  $('.horizontal').each(function(){
    $(this).hide();
  });
  $('.horizontal').first().show().addClass('current');

  var myElement = document.getElementById('body');
  var touch = new Hammer(myElement);

  touch.on("swipeleft", next);
  touch.on("swiperight", previous);

  //nav click
  $('a.nav-link').on('click', function(event){
    if (this.hash != ""){
      event.preventDefault();
      var hash = this.hash;
      show(hash);
    }
  });

  //arrow clicks
  $('#previous').click(function(){
    previous();
  });
  $('#next').click(function(){
    next();
  });
});

function next(){
  if ($('.current').next('.horizontal').length > 0) {
    var next_id = $('.current').next().attr('id');
    show('#' + next_id);
  }
} 

function previous(){
  if ($('.current').prev('.horizontal').length > 0) {
    var previous_id = $('.current').prev().attr('id');
    show('#' + previous_id);
  }
} 

function show(div_id){
  $('.horizontal').each(function(){
    $(this).hide().removeClass('current');
  });
  $(div_id).show("fade").addClass('current');
}