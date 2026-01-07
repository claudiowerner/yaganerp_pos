//Se envía valor undefined porque no está definida aún la temporada seleccionada. Esto es para que seleccione la temporada abierta previamente de forma automática
addEventListener("DOMContentLoaded", (e)=>{
    obtener_temporada_seleccionada();
    imprimirMontoTotalPedido();
})