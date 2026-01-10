$.ajax({
    url: "php/temporada/contar_temporadas.php",
    type: "POST",
    success: function(e)
    {
        let j = JSON.parse(e);
        if(j.temporadas==0)
        {
            $('#modalSinTemporadas').modal({backdrop: 'static', keyboard: false});
            $("#modalSinTemporadas").modal("show");
        }
    }
})