google-hot-trends
=================

This is a simple library to extract hot trends by [google hot trends API](http://trends.google.com/).

You can get the top 20 keywords of the world. Currently, supported countries are as below.
+ Austrailia(au)
+ Canada(ca)
+ Hongkong(hk)
+ India(in)
+ Israel(il)
+ Japan(jn)
+ Russia(ru)
+ Singapole(sg)
+ Taiwan(tw)
+ United Kingdom(uk)
+ United State(us

Also, you can get a random hot keyword among the world-wide hot trends.

#### Usage
###### 1. Gets the hot trend keywords as array
```php
$hot = new GHotTrend();
$keywords = $hot->get();
print_r($keywords);
```
###### 2. Gets the hot trend keywords as json
```php
$keywords = $hot->get('json');
echo $keywords;
echo '</br></br>';
```
###### 3. Gets the hot trend keywords as json by using proxy server
```php
$keywords = $hot->get('json','proxy_server_ip:proxy_server_ip');
echo $keywords;
echo '</br></br>';
```
###### 4. Changes the country
```php
$hot->setCountry('au');
$keywords = $hot->get('json');
echo $keywords;
```
###### 5. Gets the random keyword
```php
$random = $hot->randomPick();
echo $random;
```
