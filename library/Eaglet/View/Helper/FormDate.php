<?php
class Eaglet_View_Helper_FormDate extends Zend_View_Helper_FormElement
{
    public function formDate ($name, $value = null, $attribs = null)
    {
        $day = '';
        $month = '';
        $year = '';
		if ($value) {
			list($year, $month, $day) = explode('-', $value);
		}
        $dayAttribs = isset($attribs['dayAttribs']) ? $attribs['dayAttribs'] : array();
        $monthAttribs = isset($attribs['monthAttribs']) ? $attribs['monthAttribs'] : array();
        $yearAttribs = isset($attribs['yearAttribs']) ? $attribs['yearAttribs'] : array();

        $dayMultiOptions = array('' => '');
        for ($i = 1; $i < 32; $i ++) {
            $index = str_pad($i, 2, '0', STR_PAD_LEFT);
            $dayMultiOptions[$index] = $i;
        }
        $monthMultiOptions = array(  
        	"0" => "",
		    "01" => "มกราคม",  
		    "02"=> "กุมภาพันธ์",  
		    "03" => "มีนาคม",  
		    "04" => "เมษายน",  
		    "05" => "พฤษภาคม",  
		    "06" => "มิถุนายน",   
		    "07" => "กรกฎาคม",  
		    "08" => "สิงหาคม",  
		    "09" => "กันยายน",  
		    "10" => "ตุลาคม",  
		    "11" => "พฤศจิกายน",  
		    "12" => "ธันวาคม"                    
		);  

        $startYear = date('Y');
        if (isset($attribs['startYear'])) {
            $startYear = $attribs['startYear'];
            unset($attribs['startYear']);
        }

        $stopYear = $startYear + 50;
        if (isset($attribs['stopYear'])) {
            $stopYear = $attribs['stopYear'];
            unset($attribs['stopYear']);
        }

        $yearMultiOptions = array('' => '');

        if ($stopYear < $startYear) {
            for ($i = $startYear; $i >= $stopYear; $i--) {
                $yearMultiOptions[$i] = $i;
            }
        } else {
            for ($i = $startYear; $i <= $stopYear; $i++) {
                $yearMultiOptions[$i] = $i;
            }
        }

        return
            $this->view->formSelect(
                $name . '[day]',
                $day,
                $dayAttribs,
                $dayMultiOptions) . '&nbsp;' .
            $this->view->formSelect(
                $name . '[month]',
                $month,
                $monthAttribs,
                $monthMultiOptions) . '&nbsp;' .
            $this->view->formSelect(
                $name . '[year]',
                $year,
                $yearAttribs,
                $yearMultiOptions
            );
    }
}