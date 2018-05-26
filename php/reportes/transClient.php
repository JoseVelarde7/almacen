<?php 
	ob_start();
    include(dirname(__FILE__).'/repCliente.php');
    $contenido = ob_get_clean();
	require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');
		$html2pdf = new HTML2PDF('L', 'A4', 'es');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($contenido);
        $html2pdf->Output('repCliente.pdf');

 ?>