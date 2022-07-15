$(document).on('ready',function()
                {
      $('.contenedor-menu').on('click',function(){
          
      $('.menu-burger').toggleClass('cruz'); 
          
      $('.menu').toggleClass('fondo'); 
      })

      var height = $(window).height();

      $('.fondo').height(height);
    })




      


