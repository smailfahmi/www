<?

class HeaderC extends FPDF {
    function Header (){
        $this->SetFont('helvetica', 'B', 20); 
        $this->SetTextColor (50, 50, 150); // Cambio en el color del texto
        $this->Image("./Logo.jpg", 30, 60, 60, 30); // Cambio en la imagen y su posición
        $this->SetY(80); // Cambio en la posición Y
        $this->SetX(80); // Cambio en la posición X
        $this->Write(5,"SMAIL EL INIMITABLE ");
        $this->Ln();
        $this->Ln();
        $this->SetFont('helvetica', '', 20); 
        $this->SetX(80);
        $this->SetFontSize(13);
        $this->SetX(80);
        $this->Write(5,"NIF: GUARDA ESTO ");
        $this->Ln();
        $this->SetX(80);
        $this->Write(5,"CALLE INVENTADA s/n");
        $this->Ln();
        $this->SetX(80);
        $this->Write(5,"49022 Zamora ");
        $this->Ln();
        $this->SetX(80);
        $this->Write(5,"www.SMAIL.es ");
        $this->SetLineWidth(1.5); // Cambio en el ancho de la línea
        $this->SetDrawColor(200, 50, 50); // Cambio en el color de la línea
        $this->Line(79,79, 79,110); // Cambio en la posición de la línea
        $this->Ln();
    }
    
    function Footer (){
        // Puedes añadir contenido al pie de página si lo necesitas
    }

}