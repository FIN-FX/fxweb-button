<?php
class ExchangeRate
{
             
    // URL, файл в формате XML
    public $exchange_url =
            'https://privat24.privatbank.ua/p24/accountorder?oper=prp&exchange&PUREXML&coursid=5'; // установив coursid=5, расчёт будет относительно ставок привата
    private $xml;
    private $carrency = '../protected-button/cache/currency.xml';
 
    function __construct()
    {
        $this->getXML();
        return $this->xml = simplexml_load_file($this-> carrency);
    }
   
     private function getXML()
     {
   
        if ( !file_exists($this-> carrency) or (time() - filemtime($this->carrency) > 3600) )
            file_put_contents($this->carrency, file_get_contents($this->exchange_url));
       
    }
   
    private function getExchangeVal($val, $do)
    {
 
         if ($this->xml!==FALSE) {
          // все хорошо, можно работать дальше -
          // в XML-данных нет ошибки

                foreach ($this->xml as $currency)
                {
                    if ($currency->exchangerate['ccy'] == $val) 
                    {
                        $curs = floatval($currency->exchangerate[$do]);
                    }
                }
        }
     return $curs;
    }
    public function getExchange($val1, $val2, $summ=0, $round=6)
    {
        $valuta1 = $this->getExchangeVal($val1, 'sale');
        $valuta2 = $this->getExchangeVal($val2, 'sale');

        if ($val1 == 'UAH') 
        {
                if($summ>0) $valuta2 = $summ / $valuta2;
                return round($valuta2, $round);
               
        } elseif ($val2 == 'UAH') 
        {
                if($summ>0) $valuta1 = $summ * $valuta1;
                return round($valuta1, $round);
               
        } else {
                $rate = $valuta1 / $valuta2;
                if($summ>0) $rate = $rate*$summ;
                $res = round($rate, $round);
                return $res;
        }
    }
}
