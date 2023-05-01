$(document).ready(function(){
$("#imprimir_factura").on('click', function(){
    
    var urlEmp = $('#rutaURL').val();
    let idVal = $("#imprimir_factura").attr("idFactura");
    
    $.get(urlEmp+"/"+idVal, function (result) {        
   
    var doc = new jsPDF('2', 'pt', 'letter');

   var totalPagesExp = "{total_pages_count_string}";

    var pageContent = function (data) {
        // HEADER
        // doc.addImage(imgBase, 'JPEG', 45, 20, 90, 90);
        doc.setFontSize(20);
        doc.setTextColor(40);
        doc.setFontStyle('normal');
        doc.setDrawColor(38, 45, 52);
        var fecha = new Date();
        let FActual = fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear();
        // encabezado 
        doc.setFontSize(10);
        doc.writeText(-7, 15, `Fecha Impresión: ${FActual}`, { align: 'right' });
        doc.setFontSize(16);
        doc.setFont("times");
        doc.setFontType("bold");
        doc.writeText(10, 20, `${result.cabecera[0].nom_empresa}`, { align: 'center' });
        doc.setFontSize(14);
        doc.setFontType("normal");
        doc.writeText(10, 40, `${result.cabecera[0].nom_sucursal}`, { align: 'center' });
        doc.setFontSize(11);
        doc.writeText(70, 20,`${result.cabecera[0].num_factura}`, { align: 'lefth' });
        doc.writeText(8, 18, `No. Factura:`, { align: 'lefth' });
        //doc.line(7, 20, 140, 20);
        doc.writeText(45, 35,`${result.cabecera[0].fecha}`, { align: 'left' });
        doc.writeText(15, 35, `Fecha:`, { align: 'lefth' });
       // doc.line(570, 127, 745, 127);
        

        // FOOTER
        var str = "Pagina " + data.pageCount;
        //Total page number plugin only available in jspdf v1.0+
        if (typeof doc.putTotalPages === 'function') {
            doc.setFontSize(11);
            doc.setFontType("normal");
            doc.writeText(185, 775, `${parseInt(result.cantidades[0].cantidad)}` , { align: 'lefth' });
            doc.writeText(-120, 775, `${result.cantidades[0].total}`, { align: 'right' });
            doc.setFontType("bold");
            doc.writeText(15, 775, `Total Productos: _______________________________ Total a Facturar: _______________________________`, { align: 'lefth' }); 
            doc.setFontSize(0);
            doc.setFontType("normal");
            str = str + " de " + totalPagesExp;
        }
       
        var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
        doc.text(str, data.settings.margin.left, pageHeight  - 50);
        
    };
    let rows = [];
    var columns = [ 'Id Producto', 'Nombre', 'Cantidad Unidades', 'Precio Unitario', 'Sub Total'];           
        $.each(result.detalles, function(i, item) {
            rows[i] = [result.detalles[i].idProducto, result.detalles[i].nomProducto, parseInt(result.detalles[i].cantidad), parseFloat(result.detalles[i].precio_unit).toFixed(2), parseFloat(result.detalles[i].total_venta).toFixed(2)];
        });
    doc.autoTable(columns, rows, {
        theme: 'grid',
        headerStyles: {fillColor: [48, 55, 62]},
        addPageContent: pageContent,
        margin: { top: 50, bottom: 25},

    });

    // Total page number plugin only available in jspdf v1.0+
    if (typeof doc.putTotalPages === 'function') {
        doc.putTotalPages(totalPagesExp);
    }

    
        doc.autoPrint();

        var iframe = document.getElementById('iframePDF');

        iframe.data = doc.output('dataurlstring');
      })
  });
});