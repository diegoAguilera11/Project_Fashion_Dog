

document.addEventListener('DOMContentLoaded', function() {

  let formulario = document.querySelector("form");


  var calendarEl = document.getElementById('agenda');


  var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'dayGridMonth',
      locale: "es",/** Idioma: Español */

      /** Ocpciones de FullCalendar */

      headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,listWeek'
      },

      dateClick:function(info){
          $("#cliente").modal("show");
      }



  });
  calendar.render();


  //Recuperar la información (Datos)
  document.getElementById("btnGuardar").addEventListener("click",function(){
      const datos= new FormData(formulario);
      console.log(datos);
  });

});
