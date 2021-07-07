function ajaxModele()
{
    let marque = $('#modele').val();
    $.ajax(
    {
        url : '/reqAjax',
        type : 'get',
        data : {'marque':marque},
        dataType : 'JSON',
        
        success:function(retourRes)
        {
        $('#modele').html(retourRes);
        }
    }
    );
}
    
// let marque = $('#marque').val();
// $.ajax(
// {
//     url : '/reqAjax',
//     type : 'post',
//     data : {'marque':marque}   
//     success:function(retourRes)
//     {
//     $('#modele').html(retourRes);
//     }
// }
// );