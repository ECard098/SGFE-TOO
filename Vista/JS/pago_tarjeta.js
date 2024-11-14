document.getElementById('cbPlan').addEventListener('change', function() {
    const selectedPlan = this.options[this.selectedIndex].text;
    if (selectedPlan === "Tarjeta") {
        openModal();
    }
});

function openModal() {
    document.getElementById('paymentModal').style.display = 'block';
    var cbNombre = document.getElementById('cbCliente');
    var nombre = document.getElementById('nombre');

    const clienteSelectd = cbNombre.options[clienteSelectd.selectedIndex].text;
    nombre.value = clienteSelectd;

  
}

function closeModal() {
    document.getElementById('paymentModal').style.display = 'none';
}