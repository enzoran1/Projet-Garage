const navButton = document.querySelector(".navbar__container-burger");
const navMenu = document.querySelector(".navbar__menu");


navButton.addEventListener("click", function(){
    navMenu.classList.toggle("show");
})



    function ajaxModele()
    {
        let marque = $('#marque').val();
        $.ajax(
        {
            url : '/reqAjax',
            type : 'post',
            data : {'marque':marque},

            success:function(retourRes)
            {
            $('#modele').html(retourRes);
            }
        }
        );
    }


