function updatePlanId() {
    var selectElement = document.getElementById("cbPlan");
    var selectedPlanId = selectElement.value;
    document.getElementById("planId").value = selectedPlanId;
}


function updatePaqueteId() {
    var selectElement = document.getElementById("cbPaquete");
    var selectedPlanId = selectElement.value;
    document.getElementById("planPaquete").value = selectedPlanId;
}

function updateSala() {
    var selectElement = document.getElementById("salaSelect"); // ID del select
    var selectedSalaId = selectElement.value;
    document.getElementById("salaId").value = selectedSalaId; // ID del input oculto
}

function updateCliente() {
    var selectElement = document.getElementById("clienteSelect"); // ID del select
    var selectedClienteId = selectElement.value;
    document.getElementById("clienteId").value = selectedClienteId; // ID del input oculto
}