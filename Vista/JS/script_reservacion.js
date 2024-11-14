// Función para establecer la fecha actual en el campo de fecha y deshabilitarlo
document.addEventListener("DOMContentLoaded", function() {
    const fechaInput = document.getElementById('fechaR');
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    fechaInput.value = formattedDate;
    fechaInput.disabled = false;
});

// Inicializar select2 para selectores específicos
$(document).ready(function() {
    $('select[name="cbCliente"]').select2({
        placeholder: "Seleccione un cliente",
        allowClear: true
    });
    $('select[name="cbSala"]').select2({
        placeholder: "Seleccione una sala",
        allowClear: true
    });
});

