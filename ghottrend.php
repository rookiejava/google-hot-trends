<?php
class GHotTrend
{
    protected $url;
    protected $country;
    
    public function __construct($country = 'us')
    {
        $this->setCountry($country);
    }

    public function setCountry($country = null)
    {
        switch ($country) {
            case 'austrailia':
            case 'au':
                $this->$country = 'google.com.au';
                break;
            case 'canada':
            case 'ca':
                $this->$country = 'google.ca';
                break;
            case 'hongkong':
            case 'hk':
                $this->$country = 'google.com.hk';
                break;
            case 'india':
            case 'in':
                $this->$country = 'google.co.in';
                break;
            case 'israel':
            case 'il':
                $this->$country = 'google.co.il';
                break;
            case 'japan':
            case 'jp':
                $this->$country = 'google.co.jp';
                break;
            case 'russia':
            case 'ru':
                $this->$country = 'google.ru';
                break;
            case 'singapole':
            case 'sg':
                $this->$country = 'google.com.sg';
                break;
            case 'taiwan':
            case 'tw':
                $this->$country = 'google.com.tw';
                break;
            case 'united kingdom':
            case 'uk':
                $this->$country = 'google.co.uk';
                break;
            case 'united state':
            case 'us':
            default:
                $this->$country = 'google.com';
                break;
        }
        $this->url = 'http://www.'.$this->$country.'/trends/hottrends/atom/hourly';
    }

    public function get($format = 'json',$proxy = null)
    {
        if($proxy != null)
        {
            $proxySetting = array(
                'http' => array(
                    'proxy' => 'tcp://'.$proxy,
                    'request_fulluri' => true,
                ),
            );
            $context = stream_context_create($proxySetting);
            $page = file_get_contents($this->url, False, $context);
        }
        else
        {
            $page = file_get_contents($this->url);
        }

        preg_match_all('(<a href="(.+)">(.*)</a>)siU', $page, $matches);
        return $format == 'json' ? json_encode($matches[2]) : $matches[2];
    }

    public function randomPick($proxy = null)
    {
        $countryArray = array('au','ca','hk','in','is','jp','ru','sg','tw','uk','us');
        $countryCount = count($countryArray);
        $countrySel = mt_rand(0, $countryCount-1);
        //echo 'From : '.$countryArray[$countrySel].'</br>';
        $this->setCountry($countryArray[$countrySel]);

        $trend = $this->get(null, $proxy);
        $rstCount = count($trend);
        $sel = mt_rand(0, $rstCount-1);
        return $trend[$sel];
    }
}
?>
