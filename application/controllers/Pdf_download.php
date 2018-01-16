<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf_download extends CI_Controller {

	/**
	 * Example: FPDF 
	 *
	 * Documentation: 
	 * http://www.fpdf.org/ > Manual
	 *
	 */
	 public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('asset_model');


	}
	public function index() {	
		$this->load->library('fpdf_gen');
		
		$this->fpdf->SetFont('Arial','B',16);
		$this->fpdf->Cell(40,10,'Hello World!');
		
		echo $this->fpdf->Output('hello_world.pdf','D');
	}
	public function parform($id) {	
		$this->load->library('fpdf_gen');
		$pdf = new FPDF('p','mm','A4');
		 // le mettre au debut car plante si on declare $mysqli avant !
    //$pdf = new FPDF( 'P', 'mm', 'A4' );

    // on declare $mysqli apres !
    //$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    // cnx a la base
   // mysqli_select_db($mysqli, DATABASE) or die('Erreur de connection à la BDD : ' .mysqli_connect_error());
    // FORCE UTF-8
//    mysqli_query($mysqli, "SET NAMES UTF8");


    //$var_id_facture = $_GET['id_param'];

    // on sup les 2 cm en bas
    $pdf->SetAutoPagebreak(False);
    $pdf->SetMargins(0,0,0);

    // nb de page pour le multi-page : 18 lignes
   // $sql = 'select count(*) FROM ligne_facture where id_facture=' .$var_id_facture;
	//$row_client = $this->asset_model->getparitemspdf('4');
	//$row = mysqli_fetch_row($qry)
    //$result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    //$row_client = mysqli_fetch_row($row_client);
    //mysqli_free_result($result);
	
    //$nb_page = $row_client;
    //$sql = 'select abs(FLOOR(-' . $nb_page . '/18))';
	//$row_client = $this->db->query($sql);
	
    //$result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    //$row_client = mysqli_fetch_row($result);
    //mysqli_free_result($result);
    //$nb_page = $row_client[0];
	$nb_page = 2;
    $num_page = 1; $limit_inf = 0; $limit_sup = 20;
    While ($num_page <= $nb_page)
    {
        $pdf->AddPage();
        
        // logo : 80 de largeur et 55 de hauteur
        //$pdf->Image('logo.png', 10, 10, 80, 55);

        // n° page en haute à droite
        $pdf->SetXY( 120, 5 ); $pdf->SetFont( "Arial", "B", 12 ); $pdf->Cell( 160, 8, $num_page . '/' . $nb_page, 0, 0, 'C');
        
        // n° facture, date echeance et reglement et obs
        //$select = 'select date,numero,mnt_ttc,mnt_ht,mnt_tva,obs,reglement,date_echeance FROM facture where id_facture=' .$var_id_facture;
        //$result = mysqli_query($mysqli, $select)  or die ('Erreur SQL : ' .$select .mysqli_connect_error() );
        //$row = mysqli_fetch_row($result);
       // mysqli_free_result($result);
        $annee = "annee";
       // $champ_date = date_create($row[0]); $annee = date_format($champ_date, 'Y');
        $num_fact = "PROPERTY ACKNOWLEDGEMENT RECEIPT";
        $pdf->SetLineWidth(0.1); 
		//$pdf->SetFillColor(192); 
		//$pdf->Rect(120, 15, 85, 8, "DF");
        $pdf->SetXY( 50, 15 ); 
		$pdf->SetFont( "Arial", "B", 12 ); 
		$pdf->Cell( 85, 8, $num_fact, 0, 0, 'C');
        
        // nom du fichier final
        $nom_file = "fact_" . $annee .'-' . ".pdf";
        
        // date facture
        $champ_date = "d/m/y"; 
		$date_fact = "d/m/y"; 
        $pdf->SetFont('Arial','',11); $pdf->SetXY( 10, 30 );
        $pdf->Cell( 10, 8, "Entity Name:______________________", 0, 0, '');
		$pdf->SetFont('Arial','',11); $pdf->SetXY( 10, 35 );
        $pdf->Cell( 10, 8, "Fund Cluster:______________________", 0, 0, '');
		$pdf->SetFont('Arial','',11); $pdf->SetXY( 110, 35 );
        $pdf->Cell( 10, 8, "PAR No:_____________", 0, 0, '');
        
		//footer settings here
        // si derniere page alors afficher total
        if ($num_page == $nb_page)
        {
            // les totaux, on n'affiche que le HT. le cadre après les lignes, demarre a 213
            //$pdf->SetLineWidth(0.1); $pdf->SetFillColor(192); $pdf->Rect(5, 213, 90, 8, "DF");
            // HT, la TVA et TTC sont calculés après
            //$nombre_format_francais = "Total HT : " . number_format("1.00", 2, ',', ' ') . " €";
            //$pdf->SetFont('Arial','',10); $pdf->SetXY( 95, 213 ); $pdf->Cell( 63, 8, $nombre_format_francais, 0, 0, 'C');
            // en bas à droite
            //$pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 227 ); $pdf->Cell( 24, 6, number_format("1.00", 2, ',', ' '), 0, 0, 'R');

            // trait vertical cadre totaux, 8 de hauteur -> 213 + 8 = 221
            $pdf->Rect(5, 213, 200, 8, "D"); 
			//$pdf->Line(95, 213, 95, 221); $pdf->Line(158, 213, 158, 221);

            // reglement
            $pdf->SetXY( 5, 225 ); $pdf->Cell( 38, 5, "Mode de Règlement :", 0, 0, 'R'); $pdf->Cell( 55, 5, "1.00", 0, 0, 'L');
            // echeance
            $champ_date = date_create("1.00"); $date_ech = date_format($champ_date, 'd/m/Y');
            $pdf->SetXY( 5, 230 ); $pdf->Cell( 38, 5, "Date Echéance :", 0, 0, 'R'); $pdf->Cell( 38, 5, $date_ech, 0, 0, 'L');
        }
        
        // observations
        //$pdf->SetFont( "Arial", "BU", 10 ); $pdf->SetXY( 5, 75 ) ; $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");
        //$pdf->SetFont( "Arial", "", 10 ); $pdf->SetXY( 5, 78 ) ; $pdf->MultiCell(190, 4,"1", 0, "L");

        // adr fact du client
        //$select = "select nom,adr1,adr2,adr3,cp,ville,num_tva from client c join facture f on c.id_client=f.id_client where id_facture=" . $var_id_facture;
        //$result = mysqli_query($mysqli, $select)  or die ('Erreur SQL : ' .$select .mysqli_connect_error() );
        //$row_client = mysqli_fetch_row($result);
        //mysqli_free_result($result);
       /* $pdf->SetFont('Arial','B',11); $x = 110 ; $y = 50;
        $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, "test", 0, 0, ''); $y += 4;
        if ( "test") { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8,  "test", 0, 0, ''); $y += 4;}
        if ( "test") { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, "test", 0, 0, ''); $y += 4;}
        if ( "test") { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8,  "test", 0, 0, ''); $y += 4;}
        if ( "test" ||  "test") { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8,  "test" . ' ' . "test" , 0, 0, ''); $y += 4;}
        if ("test") { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, 'N° TVA Intra : ' .  "test", 0, 0, '');}
        */
        // ***********************
        // le cadre des articles
        // ***********************
        // cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
		
		//data here....
		//$paritems = $this->asset_model->getparitems($id);
		$paritems_query = $this->db->query("SELECT * FROM equipments_par_items LEFT JOIN equipments ON equipments_par_items.equipno = equipments.equipNo LEFT JOIN assets ON equipments_par_items.assetid = assets.assetid WHERE parid=$id LIMIT $limit_inf,$limit_sup");
		$paritems = $paritems_query->result_array();
		$pdf->SetFont('Arial','',8);
        $y = 50;
		$qty='1';
		foreach($paritems as $par_items):
			$pdf->SetXY( 9, $y+9 ); $pdf->Cell( 140, 5, $qty, 0, 0, 'L');
			$pdf->SetXY( 20, $y+9 ); $pdf->Cell( 13, 5, wordwrap($par_items['asset_unit'], 1, ' ', true), 0, 0, 'C');
			$pdf->SetXY( 40, $y+9 ); 
			$pdf->MultiCell( 75, 3, $par_items['particulars'], 0, 'L');
			//count the text length and if more than 75 add more y value
			$string_length = strlen($par_items['particulars']);
			
			$additional_len = intval($string_length/75);
			
			$y+=$additional_len*4;
			 $pdf->Line(5, $y+14, 205, $y+14);
			$y += 6;
		endforeach;
		/*
		// les articles
        
        // 1ere page = LIMIT 0,18 ;  2eme page = LIMIT 18,36 etc...
        $sql = 'select libelle,qte,pu,taux_tva FROM ligne_facture where id_facture=' .$var_id_facture . ' order by libelle';
        $sql .= ' LIMIT ' . $limit_inf . ',' . $limit_sup;
        $res = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
        while ($data =  mysqli_fetch_assoc($res))
        {
            // libelle
            $pdf->SetXY( 7, $y+9 ); $pdf->Cell( 140, 5, $data['libelle'], 0, 0, 'L');
            // qte
            $pdf->SetXY( 145, $y+9 ); $pdf->Cell( 13, 5, strrev(wordwrap(strrev($data['qte']), 3, ' ', true)), 0, 0, 'R');
            // PU
            $nombre_format_francais = number_format($data['pu'], 2, ',', ' ');
            $pdf->SetXY( 158, $y+9 ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            // Taux
            $nombre_format_francais = number_format($data['taux_tva'], 2, ',', ' ');
            $pdf->SetXY( 177, $y+9 ); $pdf->Cell( 10, 5, $nombre_format_francais, 0, 0, 'R');
            // total
            $nombre_format_francais = number_format($data['pu']*$data['qte'], 2, ',', ' ');
            $pdf->SetXY( 187, $y+9 ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');
            
            $pdf->Line(5, $y+14, 205, $y+14);
            
            $y += 6;
        }
		*/
        $pdf->SetLineWidth(0.1); 
		$pdf->Rect(5, 45, 200, 200, "D");
        // cadre titre des colonnes
        $pdf->Line(5, 55, 205, 55);
        // les traits verticaux colonnes
        $pdf->Line(20, 45, 20, 221); 
		$pdf->Line(35, 45, 35, 221); 
		$pdf->Line(120, 45, 120, 221); 
		$pdf->Line(150, 45, 150, 221);
		$pdf->Line(180, 45, 180, 221);
		
        // titre colonne
		$pdf->SetXY( 5, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 13, 8, "Quantity", 0, 0, 'C');
		
		$pdf->SetXY( 20, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 13, 8, "Unit", 0, 0, 'C');
		
        $pdf->SetXY( 1, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 140, 8, "Description", 0, 0, 'C');
		
        $pdf->SetXY( 130, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 13, 8, "Property Number", 0, 0, 'C');
		
        $pdf->SetXY( 155, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 22, 8, "Date Acquired", 0, 0, 'C');
		
        $pdf->SetXY( 185, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 10, 8, "Amount", 0, 0, 'C');
		
       /* $pdf->SetXY( 185, 46 ); 
		$pdf->SetFont('Arial','B',8); 
		$pdf->Cell( 22, 8, "TOTAL HT", 0, 0, 'C');
       */
        // par page de 18 lignes
        $num_page++; $limit_inf += 18; $limit_sup += 18; 
    }
    
    $pdf->Output("I", $nom_file);
		//$pdf -> output ('your_file_pdf.pdf','D');     
	}
	
	
}
