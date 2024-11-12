function exportarPdf() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
  
    // Encabezado
    doc.text("Reporte de reservaciones", 14, 10); // Título en la parte superior
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
  
    // Generar la tabla  
  doc.autoTable({
    head: [columns],
    body: rows,
    startY: 20,
    theme: "grid",
    headStyles: { fillColor: [0, 57, 107] },
    bodyStyles: { textColor: [0, 0, 0] },
    alternateRowStyles: { fillColor: [230, 240, 255] },
   
    styles: {
      cellPadding: 2,  
      fontSize: 10,   
      lineColor: [200, 200, 200],  
      lineWidth: 0.1,  
    },
    margin: { top: 20, right: 10, bottom: 10, left: 10 },
    foot: [["Funeraria La Esperanza"]], // Pie de la tabla
    footStyles: { fillColor: [100, 100, 100] }, 
    didDrawPage: pageContent,  
  });

  doc.save("Reporte_Reservaciones.pdf");
}