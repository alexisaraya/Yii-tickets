<?php

class ConsiderSla extends CWidget
{
    //параметры по-умолчанию
    private $params = array(
        'create_time' => null,
        'reaction_time' => null,
        'A_time' => null,
        'S_time' => null,
        'spent_time' => null,
        'start_work' => null,
        'end_work' =>null
    );
    private $workTime = array();
    public function run()
    {
       $result = null; 
       $chkempty = true;
       foreach ( $this->params as $key => $value ) {
           if (empty($value)) {
               $chkempty = false;
           }
       }
       if ($chkempty) {
           $result = $this->calculate_sla();
       }
      if (!empty($result)) {
        array_push($result, $this->params['A_time']);
        array_push($result, $this->params['S_time']);
        $this->render('sla', array('sla'=>$result));
      }
    }
    
    private function calculate_sla(){
      $data = $this->params;
      $data ['create_time'] = new dateTime($data['create_time']);
      if($data ['create_time']->format('w') == 0 || $data ['create_time']->format('w') == 6){
        $data ['create_time'] = $this->calculate_nextDay($data ['create_time']);
      }
      $start_work = new dateTime(
        $data['create_time']->format('Y-m-d')." ".$data['start_work']->format('%H:%i:%s') 
      );
      $end_work = new dateTime(
        $data['create_time']->format('Y-m-d')." ".$data['end_work']->format('%H:%i:%s') 
      );

      if ($data['create_time'] < $start_work) {
        $reactEnd  = $start_work->add($data['reaction_time']);
      }else{
        $reactEnd  = $data['create_time']->add($data['reaction_time']);
      }
      if ($reactEnd > $end_work) {
        $interval = $end_work->diff($reactEnd);
        $nextDay = $this->calculate_nextDay($start_work->format('Y-m-d H:i:s'));
        $end_work->setDate($nextDay->format('Y'),$nextDay->format('m'),$nextDay->format('d'));
        $reactEnd = $nextDay->add($interval);
      }

      $tmp = new dateTime($reactEnd->format("Y-m-d H:i:s"));
      $solveEnd = $tmp->add($data['spent_time']);
      if ($solveEnd > $end_work){
        $interval = $end_work->diff($solveEnd);
        $nextDay = $this->calculate_nextDay($start_work->format('Y-m-d H:i:s'));
        $solveEnd = $nextDay->add($interval);
      }
      return array($reactEnd,$solveEnd);
    }

    private function calculate_nextDay($date){
      $day = new dateTime($date);
      $day->modify('+1 day');
      if($day->format('w') == 0 || $day->format('w') == 6){
        $this->calculate_nextDay($day);
      }else{
        return $day;
      }
    }

    public function setParams($array)
    {
        $this->params = array_merge($this->params, $array);
    }
}
