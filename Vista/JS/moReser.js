function updateHiddenInput(selectId, hiddenInputId) {
    const selectElement = document.getElementById(selectId);
    const hiddenInput = document.getElementById(hiddenInputId);

    if (selectElement && hiddenInput) {
        hiddenInput.value = selectElement.value; // Actualiza el valor del input
    }
}