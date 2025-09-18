function abrirModalSugerencia(id, nombre, sugerencia)
{
    $("#modalVerSugerencia").modal("show")
    $("#cont_sugerencia").html(sugerencia);
    $("#nom_clte_sugerencia").html(nombre);
    marcar_sugerencia_leida(id);
}