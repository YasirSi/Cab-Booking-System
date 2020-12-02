$(document).ready(function() 
{
    $(".nosamelocation").change(function() 
    {
        $("select option").prop("disabled", false);
        $(".nosamelocation").not($(this)).find("option[value='" + $(this).val() + "']").prop("disabled", true);
    });
});

function cartype()
{
    var cartype = $('#selectcartype').val();
    
    if(cartype=="cedmicro")
    {
        $('#luggage').attr('disabled','disabled');
        $('#luggage').val("");
        
    }
    else
    {
        $('#luggage').removeAttr('disabled');
    }
}

function onlynumber(button) 
{ 
	console.log(button.which);
    var code = button.which;
    if (code > 31 && (code < 48 || code > 57)) 
        return false; 
    return true; 
} 


