//Se envía valor undefined porque no está definida aún la temporada seleccionada. Esto es para que seleccione la temporada abierta previamente de forma automática
addEventListener("DOMContentLoaded", (e)=>{
    leer_pedidos(undefined);
    obtener_temporada_seleccionada();
})