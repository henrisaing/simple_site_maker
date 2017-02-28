$(document).ready(function(){
  $('a').on('click', function(event){
    if(this.hash !==""){
      event.preventDefault();
      hideNav();
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800,function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });

$('nav').hide();

$('#nav-button-close').click(function(e){
  e.preventDefault();
  // $('nav').hide();
  // $('#nav-button-open').show();
  hideNav();
});

$('#nav-button-open').click(function(e){
  e.preventDefault();
  showNav();
  // $('nav').show();
  // $('#nav-button-open').hide();
});

function hideNav(){
  $('nav').hide();
  $('#nav-button-open').show();
}

function showNav(){
  $('nav').show();
  $('#nav-button-open').hide();
}

});