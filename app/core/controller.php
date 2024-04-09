<?php

class Controller
{
    public function view($view, $data=[])
    {
        extract($data);

        $filename = "../app/views/".$view.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }
        else
        {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }    



    public function scrapeJumiaProduct($productName) {
        try {
            $productName =str_replace(" ", "+", $productName);
            $searchUrl = "https://www.jumia.co.ke/catalog/?q=" . urlencode($productName);
    
    
            $html = file_get_contents($searchUrl);
            
            if ($html === false) {
                throw new Exception('Failed to fetch data from Jumia');
            }
    
            // Load the HTML content into a DOMDocument
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $xpath = new DOMXPath($doc);
    
            $product = array();
    
            // Extract product name

            $nameElement = $xpath->query("//h3[@class='name']");
            if ($nameElement->length > 0) {
                $product['name'] = $nameElement->item(0)->nodeValue;
               
            } else {
                $product['name'] = 'Product Name Not Found';
            }
    
            // Extract product price
            $priceElement = $xpath->query("//div[@class='prc']");
            if ($priceElement->length > 0) {
                $product['price'] = $priceElement->item(0)->nodeValue;
            } else {
                $product['price'] = 'Price Not Found';
            }
    
            // Extract product image URL
            $imgElement = $xpath->query("//div[@class='img-c']/img/@data-src");
            if ($imgElement->length > 0) {
                $product['image'] = $imgElement->item(0)->nodeValue;
            } else {
                $product['image'] = 'Image Not Found';
            }

            $urlElement = $xpath->query("//a[@class='core']");
            if ($urlElement->length > 0) {
                $product['url'] = $urlElement->item(0)->getAttribute('href');
            } else {
                $product['url'] = ''; // Set default URL or handle the case when URL is not found
            }
            
    
            return $product;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }


    
// public function scrapeJijiProduct($keyword) {

//     $url = "https://jiji.co.ke/search?query=" . urlencode($keyword);

//     $curl = curl_init();

    
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//             "cache-control: no-cache",
//         ),
//     ));

//     // Execute cURL request and get the response
//     $response = curl_exec($curl);

//     // Close cURL session
//     curl_close($curl);

//     // Parse the HTML response
//     $dom = new DOMDocument();
//     @$dom->loadHTML($response);

//     // Find all product elements
//     $products = $dom->getElementsByTagName('a');

//     // Array to store scraped product data
//     $scrapedData = array();

//     // Iterate through each product element
//     foreach ($products as $product) {
//         // Check if the product element has the required class
//         if (strpos($product->getAttribute('class'), 'b-list-advert-base--gallery') !== false) {
//             // Extract product details
          
//             $title = $product->getElementsByTagName('div')[2]->nodeValue;
//             $price = $product->getElementsByTagName('div')[6]->nodeValue;
//             $image = $product->getElementsByTagName('img')[0]->getAttribute('src');

//             // Build product data array
//             $productData = array(
//                 'title' => $title,
//                 'price' => $price,
//                 'image' => $image,
//                 'product_link' => $url,
//             );

//             // Add product data to the scraped data array
//             $scrapedData[] = $productData;
//         }
//     }

//     // Sort the products by price
//     usort($scrapedData, function($a, $b) {
//         return floatval($a['price']) - floatval($b['price']);
//     });

//     // Return only the first three cheapest products
//     return array_slice($scrapedData, 0, 3);
// }
public function scrapeJijiProduct($keyword) {
    $url = "https://jiji.co.ke/search?query=" . urlencode($keyword);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
        ),
    ));

    // Execute cURL request and get the response
    $response = curl_exec($curl);

    // Close cURL session
    curl_close($curl);

    // Parse the HTML response
    $dom = new DOMDocument();
    @$dom->loadHTML($response);

    // Find all product elements
    $products = $dom->getElementsByTagName('a');

    // Array to store scraped product data
    $scrapedData = array();

    // Iterate through each product element
    foreach ($products as $product) {
        // Check if the product element has the required class
        if (strpos($product->getAttribute('class'), 'b-list-advert-base--gallery') !== false) {
            // Extract product details
            $title = $product->getElementsByTagName('div')[2]->nodeValue;
            $price = $product->getElementsByTagName('div')[6]->nodeValue;
            $image = $product->getElementsByTagName('img')[0]->getAttribute('src');
            $product_link = $product->getAttribute('href'); // Extract href attribute

            // Build product data array
            $productData = array(
                'title' => $title,
                'price' => $price,
                'image' => $image,
                'product_link' => $product_link, // Add product link to the array
            );

            // Add product data to the scraped data array
            $scrapedData[] = $productData;
        }
    }

    // Sort the products by price
    // usort($scrapedData, function($a, $b) {
    //     return floatval($a['price']) - floatval($b['price']);
    // });

    // Return only the first three cheapest products
    return array_slice($scrapedData, 0, 4);
}


// public function ebay($name) {
//     try {
//         $name1 = str_replace(" ", "+", $name);
//         $ebay_url = 'https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=' . $name1 . '&_sacat=0';

//         // You may need to adjust headers to avoid being blocked by eBay
//         $options = array(
//             'http' => array(
//                 'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0\r\n"
//             )
//         );
//         $context = stream_context_create($options);
//         $res = file_get_contents($ebay_url, false, $context);

//         //show($res);
        
//         if ($res === false) {
//             throw new Exception('Failed to fetch data from eBay');
//         }

//         $html = new DOMDocument();
//         @$html->loadHTML($res);
//         $xpath = new DOMXPath($html);
        
//         $length = $xpath->query("//*[@class='s-item__price']");
//         $ebay_page_length = $length->length;

//         for ($i = 0; $i < $ebay_page_length; $i++) {
//             $infoElement = $xpath->query("//*[@class='SECONDARY_INFO']")->item($i);
//             if ($infoElement !== null) {
//                 $info = strtoupper(trim($infoElement->textContent));
//                 if ($info == 'BRAND NEW') {
//                     $ebay_nameElement = $xpath->query("//*[@class='s-item__title']")->item($i);
//                     if ($ebay_nameElement !== null) {
//                         $ebay_name = strtoupper(trim($ebay_nameElement->textContent));
//                         $name = strtoupper(trim($name));
//                         if (strpos($ebay_name, $name) !== false) {
//                             $ebay_priceElement = $xpath->query("//*[@class='s-item__price']")->item($i);
//                             if ($ebay_priceElement !== null) {
//                                 $ebay_price = $ebay_priceElement->textContent;
//                                 $ebay_price = str_replace("INR", "₹", $ebay_price);
//                                 $ebay_price = substr($ebay_price, 0, 14);
//                                 return "{$ebay_name}\nPrice : {$ebay_price}\n";
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//         return "Product Not Found";
//     } catch (Exception $e) {
//         echo $e->getMessage();
//         return 'Product Not Found';
//     }
// }

public function ebay($name) {
    try {
        $name1 = str_replace(" ", "+", $name);
        $ebay_url = 'https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=' . $name1 . '&_sacat=0';

        // You may need to adjust headers to avoid being blocked by eBay
        $options = array(
            'http' => array(
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0\r\n"
            )
        );
        $context = stream_context_create($options);
        $res = file_get_contents($ebay_url, false, $context);

        if ($res === false) {
            throw new Exception('Failed to fetch data from eBay');
        }

        $html = new DOMDocument();
        @$html->loadHTML($res);
        $xpath = new DOMXPath($html);

        // Get the elements containing product names, prices, and URLs
        $nameElements = $xpath->query("//*[@class='s-item__title']");
        $priceElements = $xpath->query("//*[@class='s-item__price']");
        $urlElements = $xpath->query("//*[@class='s-item__link']");

        // Get the elements containing product images
        $imageElements = $xpath->query("//*[@class='s-item__image']//img");

        // Iterate through each product element
        $productData = [];
        for ($i = 0; $i < $nameElements->length; $i++) {
            // Extract product details
            $name = $nameElements->item($i)->textContent;
            $price = $priceElements->item($i)->textContent;
            $url = $urlElements->item($i)->getAttribute('href');
            $image = $imageElements->item($i)->getAttribute('src');
        
            // Build product data array
            $productDetails = [
                'name' => $name,
                'price' => $price,
                'url' => $url,
                'image' => $image
            ];
        
            // Add product data to the product data array
            $productData = array_slice($productData, 0, 4);
            $productData[] = $productDetails;
            
        }
        
        return $productData;
        //return "Product Not Found";
    } catch (Exception $e) {
        echo $e->getMessage();
        return 'Product Not Found';
    }
}


}