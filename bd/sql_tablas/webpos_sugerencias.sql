SELECT s.id, s.id_cl, cl.nombre, DATE_FORMAT(s.fecha_sugerencia, 'Recibida el %d-%m-%Y a las %H:%i:%s') AS fecha_sugerencia, s.sugerencia, s.estado 
    FROM sugerencias s
    JOIN cliente cl
    ON cl.id = s.id_cl
    WHERE s.estado !='N'