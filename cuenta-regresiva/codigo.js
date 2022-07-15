$(function(){    
    $('#countdown').countdown({
        timezone:-3, //zona horaria argentina
        
        //establecemos la fecha exacta en qué termina el countdown
        year: 2020,
        month: 2,
        day: 7,
        hour: 20, //formato 24hr
        minute:30,
        second:0,
        
        //Establecemos qué haremos luego que termina el countdown
        onFinish: function () { 
            alert("La cuenta regresiva ha finalizado, pronto anunciaremos al ganador");
        } 
    });
   
});