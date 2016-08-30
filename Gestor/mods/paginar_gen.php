<?php

//Agregar previamente antes del include los siguientes valores 
//
// $url = 'example.php'; para la rediccion del paginado.
// $colspan = n; segun el numero de columnas el colspan respectivo.
//
// Engloba el paginado en el tfoot
echo'
<tfoot>
        <tr>
            <td colspan="' . $colspan . '">  
                <nav aria-label="Page navigation" id="no-paging">
                    <ul class="pagination">';

//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

if ($total_paginas > 1) {
    if ($pagina != 1) {
        echo '<li><a href="' . $url . '?pag=' . ($pagina - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    }
    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i) {
            //si muestro el índice de la página actual, no coloco enlace
            echo '<li class="active"><a href="#">' . $pagina . ' <span class="sr-only">(current)</span></a></li>';
        } else {
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '<li><a href="' . $url . '?pag=' . $i . '">' . $i . '</a></li>';
        }
    }
    if ($pagina != $total_paginas) {
        echo '<li><a href="' . $url . '?pag=' . ($pagina + 1) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a><li>';
    }
}
echo '          </ul>
            </nav>
        </td>
    </tr>
</tfoot>';
