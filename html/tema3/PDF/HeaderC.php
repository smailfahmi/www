<?

class HeaderC extends FPDF {
    function Header (){

        $this->SetFont('Courier', 'B', 20); 
        $this->SetTextColor (100,100,100);
        $this->SetX(60);
        $this->Write(5,"DAW, Claudio Moyano");
        $this->Ln();
        $this->Ln();

    }

    
    function Footer (){

        $this->SetFont('Courier', 'B', 20); 
        $this->SetTextColor (100,100,100);

        $this->SetY(-20);  //Poner Y primero 
        $this->SetX(-20);  //Cerca al lado derecho. Negativo cuenta por la derecha
        $this->Write(5,$this->PageNo());
        $this->Ln();
        $this->Ln();

    }

}