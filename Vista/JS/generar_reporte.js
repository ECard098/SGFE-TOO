function exportarPdf() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
  
    // Configuración del encabezado
    doc.text("Funeraria La Esperanza", 14, 10); // Título en la parte superior
    doc.setFontSize(10);
    doc.setTextColor(100);
  
    // Función para agregar el pie de página
    const pageContent = function (data) {
      doc.setFontSize(10);
      doc.text("Página " + data.pageNumber, data.settings.margin.left, doc.internal.pageSize.height - 10);
    };
  
    const table = document.getElementById("reservaciones");
    const columns = Array.from(table.querySelectorAll("thead th")).map((th) => th.textContent);
    const rows = Array.from(table.querySelectorAll("tbody tr")).map((tr) =>
      Array.from(tr.querySelectorAll("td")).map((td) => td.textContent)
    );
  
    // Configuracion de la pagina
    doc.autoTable({
      head: [columns],
      body: rows,
      startY: 20, // Posición de la tabla
      margin: { top: 5 },
      theme: "striped", // Estilos: "striped", "grid", "plain"
      headStyles: { fillColor: [0, 57, 107] }, // Color de fondo del encabezado
      bodyStyles: { textColor: [0, 0, 0] }, // Color del texto del cuerpo
      alternateRowStyles: { fillColor: [230, 240, 255] }, // Color alternado en filas
      foot: [["Funeraria La Esperanza"]], // Pie de la tabla
      footStyles: { fillColor: [100, 100, 100] }, // Estilo de pie de tabla
      didDrawPage: pageContent, // Pie de página en cada página
    });
  
    doc.save("Reservaciones.pdf");
  }
  