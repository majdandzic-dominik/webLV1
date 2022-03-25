<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("DiplomskiRadovi.php"); ?>
    <?php include("simple_html_dom.php"); ?>
    <title>Zad1</title>
</head>

<body>
    <?php
    $url = 'http://stup.ferit.hr/index.php/zavrsni-radovi/page/2';

    function dlPage($href)
    {
        //setting curl options 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $href);
        curl_setopt($curl, CURLOPT_REFERER, $href);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.125 Safari/533.4");
        $str = curl_exec($curl);
        curl_close($curl);

        //create a DOM object
        $dom = new simple_html_dom();
        //load HTML from a string
        $dom->load($str);

        return $dom;
    }


    $data = dlPage($url);

    //get each article, each article contains data we need
    foreach ($data->find('article') as $article) {

        //find img in each article, it contains the OIB
        foreach ($article->find('ul.slides img') as $img) {
        }

        //find the title link, contains the title and link to the text thesis
        foreach ($article->find('h4 a') as $title) {
            //get link to text of the thesis
            $thesisText = dlPage($title->href);
            foreach ($thesisText->find('div.post-content') as $text) {
            }
        }
        //put data into array, create object and save to database
        $thesisData = array(
            'naziv_rada' => $title->plaintext,
            'tekst_rada' => $text->plaintext,
            'link_rada' => $title->href,
            'oib_tvrtke' => preg_replace('/[^0-9]/', '', $img->src)
        );
        $thesis = new DiplomskiRad($thesisData);
        //$thesis->read();
        $thesis->save();
    }



    ?>
</body>

</html>