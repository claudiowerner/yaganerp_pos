function acciones_select()
{
    let value = $("#slctPlan").val();
    if(value==1)
    {
        $("#slctPlazoPago option[value=0]").prop("selected", true);
        $("#slctPlazoPago").attr("disabled", true);

        
        $("#tipoPago option[value=5]").prop("selected", true);
        $("#tipoPago").attr("disabled", true);
    }
}