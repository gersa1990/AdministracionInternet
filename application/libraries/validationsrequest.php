<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class validationsrequest {

	public $validations = array("name", 
								"maternLastName",
								"paternLastName", 
								"street_address",  
								"administrative_area_level_1",
								"sublocality",
								"neighborhood",
								"postal_code",
								"dayForVisit"
								);

	public $nameOfDays = array(
								0 => "Domingo",
								1 => "Lunes",
							   	2 => "Martes",
							   	3 => "Miercoles",
							   	4 => "Jueves",
							   	5 => "Viernes",
							   	6 => "Sabado",
							   );

	public $nameOfMonths = array(  01 => "Enero",
								   02 => "Febrero",
								   03 => "Marzo",
								   04 => "Abril",
								   05 => "Mayo",
								   06 => "Junio",
								   07 => "Julio",
								   08 => "Agosto",
								   09 => "Septiembre",
								   10 => "Octubre",
								   11 => "Noviembre",
								   12 => "Diciembre");

	public function __construct($validations = null)
	{

		if (!is_null($validations)) {
			
			$this->validations = $validations;
			var_dump($this->validations);
		}
	}

	public function replaceSpecialCharacters($string)
	{
		$string = str_replace("'", "", $string);

		return $string;
	}

    public function UTF8_parserEncode($val)
    {

    }

    public function getDaysOfmonth()
    {
    	return array(
    					'startDate' => date('Y-m-01',strtotime('this month')),
    					'endDate'	=> date('Y-m-t',strtotime('this month'))
    				);
    }

    public function betweenDates($fecha,$dias, $suma=1)
    {
    	$exp = explode("-",$fecha); 
	    $mon = $exp[1]; 
	    $day = (strlen($exp[2]) > 2)? $exp[0] : $exp[2]; 
	    $year = (strlen($exp[0]) < 4)? $exp[2] : $exp[0]; 
	    $mktime = mktime(0,0,0,$mon,$day,$year); 

	    if($suma == 1){ 
	        $rs = $mktime + ($dias * 24 * 60 * 60); 
	    }else{ 
	        $rs = $mktime - ($dias * 24 * 60 * 60); 
	    } 

	    $fecha = (strlen($exp[2]) > 2)? date("d-m-Y",$rs) : date("Y-m-d",$rs); 

	    return $fecha; 
    }

    public function clearPost($string)
	{
		if (is_array($string)) {
			
			$data = array();

			foreach ($string as $key => $value) {
				
				$value = strip_tags($value);
				$value = htmlentities($value, ENT_QUOTES,'UTF-8');
				$data[$key] = $this->replaceSpecialCharacters(stripslashes($value));
			}
		}else{

			$data = $this->replaceSpecialCharacters($string);
		}

		return $data;

		
	}

	public function validate($data)
	{

		foreach ($data as $key => $value) 
		{

			if (in_array($key, $this->validations)) {
				
				if (is_null($value) || $value == "" ) {

					return 0;
				}
			}

		}

		return 1;
	}

    public function getHumanNameOfDay($numberDay)
    {
    	return $this->nameOfDays[$numberDay];
    }

    public function getHumanNameOfMonth($numberMonth)
    {
    	return $this->nameOfMonths[(int)$numberMonth];
    }

    public function convertIntoHumanDate($phpDate)
    {
    	$time = strtotime($phpDate);
    	$day 		= $this->getHumanNameOfDay(date('w',$time));
    	$month 		= $this->getHumanNameOfMonth(date('m',$time));

    	$newformat = explode("-",date('d-Y',$time));

    	$dateFormated = $day.", ".$newformat[0]." de ".$month." del ".$newformat[1];

    	return $dateFormated;
    }

    public function getFirstLetterUpper($string)
    {
    	return ucfirst(strtolower($string));
    }

    public function getMonthOfFacrure($string)
    {
    	$stringArray = explode("-", $string);

    	return $this->nameOfMonths[(int)$stringArray[0]]." del ".$stringArray[1];
    }

    public function getFacturationMonth($string)
    {
    	$stringArray = explode("-", $string);

    	return $stringArray[0]." de ".$this->nameOfMonths[(int)$stringArray[1]];
    }
}