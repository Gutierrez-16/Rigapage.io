function resetCounter() {
    $('#counter').text('0'); // Reinicia el contador en la página
    localStorage.removeItem('visitCount'); // Elimina el contador del almacenamiento local
}

// Función para contar las visitas y almacenarlas en el almacenamiento local
function countVisit() {
    var visitCount = localStorage.getItem('visitCount');

    // Verificar si el contador de visitas existe en el almacenamiento local
    if (visitCount) {
        visitCount = parseInt(visitCount) + 1; // Incrementar el contador
    } else {
        visitCount = 1; // Establecer el contador en 1 si no existe
    }

    // Mostrar el contador en la página
    $('#counter').text(visitCount);

    // Guardar el contador de visitas en el almacenamiento local
    localStorage.setItem('visitCount', visitCount);
}

// Llamar a la función para contar las visitas cuando se carga el documento
$(document).ready(function() {
    countVisit();
});

// Agregar un controlador de eventos al botón de restablecimiento para llamar a la función resetCounter
$('#reset-button').click(function() {
    resetCounter();
});

function toggleContent() {
    var content = document.querySelector('.icon .content');
    content.classList.toggle('show');
  }