<?php
/**
* @author  Xu Ding
* @email   thedilab@gmail.com
* @website http://www.StarTutorial.com
* @modified Carlyle Oliver
**/
class Month {  
     
    /**
     * Initialize
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    //private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
    private $dayLabels = array("Fri","Sat","Sun","Mon","Tue","Wed","Thu");
    private $currentYear=0;
    private $currentMonth=0;
    private $currentDay=0;
    private $currentDate=null;
    private $daysInMonth=0;
    private $naviHref= null;
    
    private $presetHolidays = array(
                            '2015-01-01'=>'New Year\'s Day',
                            '2015-01-26'=>'Republic Day',
                            //'2015-02-17'=>'',
                            '2015-03-06'=>'Holi',
                            '2015-04-03'=>'Good Friday',
                            //'2015-04-14'=>'',
                            '2015-05-01'=>'Maharashtra Day',
                            //'2015-05-04'=>'',
                            //'2015-08-18'=>'',
                            '2015-09-17'=>'Ganesh Chaturthi',
                            //'2015-09-24'=>'',
                            '2015-10-02'=>'Gandhi Jayanti',
                            '2015-10-22'=>'Dusshera',
                            '2015-11-11'=>'Diwali',
                            //'2015-12-24'=>'',
                            '2015-12-25'=>'Christmas',
                        );

    public function GetHolidays() {

        return $this->presetHolidays;
    }


    /**
    * display month-view
    * @year int Required Year
    * @month int Required Month
    */
    public function show($year  = null, $month = null) {
        //$year  == null;
        //$month == null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
        $this->currentMonth=$month;
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="month-view">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /**
    * Generate days, using <li>
    */
    private function _showDay($cellNumber){
        //echo '<hr>';
        //echo '<pre>';var_dump($this);echo '</pre>';//exit;

        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            // +3 makes the week starts on a friday         
            if(intval($cellNumber) == intval($firstDayOfTheWeek)+3){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
            $cellContent = $this->currentDay;
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
            $cellContent=null;
        }
        //echo '<br>'.$this->currentDate;     
        //echo date('l', strtotime($this->currentDate));

        // color the weekend
        $weekend_color = (  date('N', strtotime($this->currentDate))==6 ||
                            date('N', strtotime($this->currentDate))==7  )?'day_hol':'day';     
        if( $cellContent==null ) $weekend_color = 'day_none';

        // check for preset holidays
        if( $this->currentDate!=null && array_key_exists($this->currentDate, $this->presetHolidays) )
           $weekend_color = 'day_hol'; 

        return '<li id="li-'.$this->currentDate.'" class="'.$weekend_color.' '.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'" title="'.$this->presetHolidays[$this->currentDate].'">'.$cellContent.'</li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return 
            '<div class="header">'.
                '<!--a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a-->'.
                    '<span class="title">'.strtoupper(date('F \'y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1'))).'</span>'.
                '<!--a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a-->'.
            '</div>';
    }
         
    /**
    * create month-view week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}