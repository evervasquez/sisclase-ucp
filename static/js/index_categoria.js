/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function eliminar(id, nombre) {
    var respuesta = confirm("Estas seguro de eliminar la categoria " + nombre);
    if (respuesta) {
        location.href = "eliminar_categoria.php?id=" + id;
    } else {
        return false;
    }
}
