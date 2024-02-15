
   //sätter cookien om sortTypen ändras
   document.getElementById('sortType').addEventListener("change", function(e){
        document.cookie='sort='+this.value;
        
  })
  
  //vid inläsning av sidan sätts scroll positionen av hemsidan
  document.addEventListener("DOMContentLoaded", function(event) { 
      var scroll = sessionStorage.getItem('scrollPos');
      window.scrollTo(0, scroll);
  });
  
  //innan användaren lämnar sidan sparas scroll positionen 
  window.addEventListener("beforeunload", function(event) { 
    sessionStorage.setItem('scrollPos', window.scrollY);

   });
