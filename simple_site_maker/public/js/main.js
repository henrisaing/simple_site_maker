$(document).ready(function(){
  $('a.lightbox-open , button.lightbox-open').click(function(e){
    e.preventDefault();
    $('#fade').css('display','block');
    $('#light').css('display','block');

    //get func attr
    // console.log($(this).attr('func'));
    $.get($(this).attr('func'), function(data){
      $("#lightbox-content").html(data);
    });
  });
  
  // undarkens background
  $('a.lightbox-close , button.lightbox-close').click(function(){
    $('#fade').css('display','none');
    $('#light').css('display','none');
  });

  //main ajax calls
  $('a.ajax-main , button.ajax-main').click(function(){
    $.get($(this).attr('func'), function(data){
      $("#main").html(data);
    });
  });

  // $('.preview-thumb').each(function(){
  //   var siteId = $(this).attr('id'); 
  //   console.log(siteId);
  //   $.get('/site/'+siteId+'/preview', function(data){
  //     $('#'+siteId).html(data);
  //     console.log('abc');

  //   });
  // });

});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}