/* clean submit query by
 * removing empty inputs from url */
var base_url = window.location.origin;
$("form[method='GET']").submit(function(){
    $("input").each(function(index, input){
        if($(input).val() == "") {
            $(input).attr("name", '');
        }
    });
});



function deleteItem(path)
{
    //module = module.toLowerCase();
    var sure = confirm('are you sure');
    if(!sure)
    {
        return false;
    }
    
    $.ajax({
        url:  path,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $("meta[name='token']").attr('content') },
        dataType : 'html',
        success: function (response) {
            location.reload();       
            toastr.success('Successfully Deleted');    
        },
        error: function(response) {
            if(response.status == '404')
            {
                alert("Item not found");
            }
            else
            alert(response.statusText);
        }
    });
    return true;
}

   function convertUrl(str)
    {
        str = str.toLowerCase();
        str=str.replaceAll('&',' and');
        str=str.replaceAll('+',' plus');
        str=str.replace(/[^\w\s]/gi, '');
        str = str.replace(/\s\s+/g, " ");
        str= str.replace(/^\s+|\s+$/gm,'');
        return str.replace(/(?![a-z0-9])./gi, "-");
    }
