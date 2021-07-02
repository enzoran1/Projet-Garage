

  jQuery(document).ready(function($) {

    const marque = document.getElementById('marque');

    marque.addEventListener('change', (event) => {
    console.log('prout');
        let marque = $('#marque').val();
        let myHeaders = new Headers();
 let url = 'reqajax.php?marque='+ marque;
 let options = {
   method: 'GET',
   headers: myHeaders,
   mode: 'cors',
   cache: 'default'
 };

 fetch(url, options)
   .then((res) => {
     if(res.ok) {
       return res.json();
     }
   })
   .then((response) => {
console.log(response);
     }
   )
    }
    
  );
  
    
 });


 



