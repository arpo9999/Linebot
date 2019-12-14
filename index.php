<?php
$access_token = '9G7umqWJQG5iSqeGem3E4iYGap1DcuIpV2O6UldOppui5boyKfuoBifVC8lOmcq7w5Ua+oVVloOTlztg9TvZA5wkP2UBe+RmEVK38bdEuzlOjzwbADdMtnkHXQcUzz8N3/WYxwic+ouuIXn4y51SzAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$Light = file_get_contents('https://api.thingspeak.com/channels/509782/fields/3/last.txt');
$HUM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/2/last.txt');
$TEM = file_get_contents('https://api.thingspeak.com/channels/509782/fields/1/last.txt');
$events = json_decode($content, true);
 if ($HUM < 55) {
        $humi = "feling dry and uncomfortable skin"  ;;
    } elseif ( $HUM >= 55  && $HUM < 66) {
        $humi = "feeling cool";
    } else {
       $humi = "feeling hot and sticky";
    }
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => "There are no commands that you type. "."\n"."Please enter the code as required or type [help] to view the menu."
					// "text"
			];
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "HELP"){
				$messages = [
				'type' => 'text',
				'text' => "Please enter the code as required."."\n"."[A] to see how to use"."\n"."[B] to view the travel guide"."\n"."[C] to view the map"."\n"."
[D] to see the itinerary."."\n"."Check weather"."\n"."[1]Muang Trang District"."\n"."[2]Nayong District"."\n"."[3]Yantakhao District"."\n"."[4]Phalean District"."\n"."[5]Hadsumran District"."\n"."[6]Kuntang District"."\n"."[7]Sigao District"."\n"."[8]Wangwiset District"."\n"."[9]Huaiyot District"."\n"."[10]Rassada District"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "A"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://www.picz.in.th/images/2018/06/06/4WVGUQ.jpg",
    				'previewImageUrl' => "https://www.picz.in.th/images/2018/06/06/4WVGUQ.jpg"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "B"){
				$messages = [
				'type' => 'text',
				'text' => "https://www.facebook.com/Easy-Trips-in-Trang-by-using-Graph-Theory-and-IoT-222676888330387/"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "C"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://www.picz.in.th/images/2018/06/08/4z7oub.jpg",
    				'previewImageUrl' => "https://www.picz.in.th/images/2018/06/08/4z7oub.jpg"
			];
			}
			if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "D"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://www.picz.in.th/images/2018/06/22/4rcuIW.jpg",
    				'previewImageUrl' => "https://www.picz.in.th/images/2018/06/22/4rcuIW.jpg"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "1"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "Muang Trang District" .  ""."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "
[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "2"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Nayong District"."\n"." Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light: ". $Light ." lx" . "\n" . "[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "3"){
				$messages = [
				'type' => 'text', 
				'text' => " Place: " . "" .  "Yantakhao District"."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "4"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Phalean District"."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "5"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Hadsumran District"."\n"."Temperature  C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "6"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Kuntang District"."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu "
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "7"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Sigao District"."\n"."Temperature C : " . $TEM . "\n" . " Humidity: " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu "
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "8"){
				$messages = [
				'type' => 'text', 
				'text' => "Place : " . "" .  "Wangwiset District"."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu"
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "9"){
				$messages = [
				'type' => 'text', 
				'text' => "Place: " . "" .  "Huaiyot District"."\n"."Temperature C : " . $TEM . "\n" . "Humidity : " . $humi . "\n" . "Light: ". $Light ." lx" . "\n" . "[help] to view the menu "
			];
			}
			if (ereg_replace('[[:space:]]+', '', trim($text)) == "10"){
				$messages = [
				'type' => 'text', 
				'text' => "Place: " . "" .  "Rassada District"."\n"."Temperature C : " . $TEM . "\n" . " Humidity: " . $humi . "\n" . "Light : ". $Light ." lx" . "\n" . "[help] to view the menu  "
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP11"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP14"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'ศาลเจ้าท่ามกงเยีย.'.'/n'.'Tam Kong Yaer Harbor Shrine',
                		'latitude'=> 7.566338,
               			 'longitude'=> 99.615475
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP18"){
				$messages = [
				'type' => 'location',
				'title'=>  ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'พระโพธิสัตว์กวนอิม.'.'/n'.'Quan Yin Bodhisattva',
                		'latitude'=> 7.555249,
               			 'longitude'=> 99.601392
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP19"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'สวนสมเด็จพระศรีนครินทร์.'.'/n'.'Trang Holiday Park',
                		'latitude'=> 7.571334,
               			 'longitude'=> 99.598054
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP17"){
				$messages = [
				'type' => 'location',
				'title'=>' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'คริสตจักรตรัง.'.'/n'.'Trang Church',
                		'latitude'=> 7.559037,
               			 'longitude'=> 99.604995
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP16"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'สระกะพังสุรินทร์.'.'/n'.'Krapang basin',
                		'latitude'=> 7.575515,
               			 'longitude'=> 99.626205
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP15"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'อนุสาวรีย์พระยารัษฎานุประดิษฐ์มหิศรภักดี.'.'/n'.'Phaya Radsada Monument of History',
                		'latitude'=> 7.564244,
               			 'longitude'=> 99.622264
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP13"){
				$messages = [
				'type' => 'location',
				'title'=>  ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'จวนผู้ว่าราชการ.'.'./n'.'Trang Governor',
                		'latitude'=> 7.561319,
               			 'longitude'=> 99.612805
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP12"){
				$messages = [
				'type' => 'location',
				'title'=>  ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนพะยูน.'.'/n'.'Payoon Circus',
                		'latitude'=> 7.560035,
               			 'longitude'=> 99.611964
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP21"){
				$messages = [
				'type' => 'location',
				'title'=>' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP25"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง.'.'/n'.'Nayong Trang',
                		'address'=> 'น้ำตกกระช่อง.'.'/n'.'Krachong waterfall',
                		'latitude'=> 7.548825,
               			 'longitude'=> 99.786980
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP24"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง.'.'/n'.'Nayong Trang',
                		'address'=> 'ถ้ำเขาช้างหาย.'.'/n'.'khao chang hai cave',
                		'latitude'=> 7.589745,
               			 'longitude'=> 99.667212
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP26"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง.'.'/n'.'Nayong Trang',
                		'address'=> 'อุทยานนกน้ำคลองลำซาน.'.'/n'.'Clong lum san park',
                		'latitude'=> 7.500198,
               			 'longitude'=> 99.777386
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP23"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง.'.'/n'.'Nayong Trang',
                		'address'=> 'กลุ่มทอผ้านาหมื่นศรี.'.'/n'.'Nameunsri Weaving Group',
                		'latitude'=> 7.599657,
               			 'longitude'=> 99.688582
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP22"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.นาโยง จ.ตรัง.'.'/n'.'Nayong Trang',
                		'address'=> 'วัดปากเหมือง .'.'/n '.'Pak meung tample ',
                		'latitude'=> 7.557658,
               			 'longitude'=> 99.694503
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP27"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'น้ําตกไพรสวรรค์.'.'/n'.'Prisawan waterfall',
                		'latitude'=> 7.412434,
               			 'longitude'=> 99.826717
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP31"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=>'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP32"){
				$messages = [
				'type' => 'location',
				'title'=>  'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'สวนพฤกษศาสตร์ภาคใต้(ทุ่งค่าย).'.'/n'.'Southern botanical garden',
                		'latitude'=> 7.468389,
               			 'longitude'=> 99.635796
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP37"){
				$messages = [
				'type' => 'location',
				'title'=>  'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'น้ำตกสายรุ้ง.'.'/n'.'Sairung waterfall',
                		'latitude'=> 7.440224,
               			 'longitude'=> 99.814039
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP33"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'น้ำตกน้ำเค็ม.'.'/n'.'Namkem waterfall',
                		'latitude'=> 7.442214,
               			 'longitude'=> 99.619308
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP36"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'น้ําตกไพรสวรรค์.'.'/n'.'Prisawan waterfall',
                		'latitude'=> 7.412434,
               			 'longitude'=> 99.826717
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP35"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'น้ำตกลำปลอก.'.'/n'.'Lumplok waterfall',
                		'latitude'=> 7.370002,
               			 'longitude'=> 99.823304
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP34"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ย่านตาขาว จ.ตรัง.'.'/n'.'Yantakhao Trang',
                		'address'=> 'ศาลพระร้อยเก้า.'.'/n'.'Roi Kao Shrine',
                		'latitude'=> 7.375451,
               			 'longitude'=> 99.675159
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP41"){
				$messages = [
				'type' => 'location',
				'title'=> ' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP43"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'น้ำตกโตนเต๊ะ.'.'/n'.'Tontae waterfall',
                		'latitude'=> 7.2944939,
               			 'longitude'=> 99.8833453
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP44"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'น้ำตกโตนตก.'.'/n'.'Tontok waterfall',
                		'latitude'=> 7.2759846,
               			 'longitude'=> 99.8923196
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP42"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'น้ำตกช่องบรรพต.'.'/n'.'Chongbanpot waterfall',
                		'latitude'=> 7.282881,
               			 'longitude'=> 99.813623
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP47"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'แหลมหยงสตาร์.'.'/n.'.'Youngstar peaked',
                		'latitude'=> 7.115333,
               			 'longitude'=> 99.667700
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP46"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'น้ำตกธารกระจาย.'.'/n'.'Krajai waterfall',
                		'latitude'=> 7.169977,
               			 'longitude'=> 99.818179
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP45"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ปะเหลียน จ.ตรัง.'.'/n'.'Phalean Trang',
                		'address'=> 'ถ้ำเขาติง.'.'/n.'.'Khaoting cave',
                		'latitude'=> 7.158202,
               			 'longitude'=> 99.801873
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP51"){
				$messages = [
				'type' => 'location',
				'title'=>' อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP52"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.หาดสำราญ จ.ตรัง.'.'/n'.'Hadsumran',
                		'address'=> 'วัดปากปรน.'.'/n'.'Pakpron temple',
                		'latitude'=> 7.266234,
               			 'longitude'=> 99.545218
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP53"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.หาดสำราญ จ.ตรัง.'.'/n'.'Hadsumran',
                		'address'=> 'ท่าเรือปากปรน.'.'/n'.'Pakpron port',
                		'latitude'=> 7.270704,
               			 'longitude'=> 99.538346
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP65"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'วนอุทยานน้ำพุร้อนควนแดง.'.'/n'.'Kuandang Hot spring park',
                		'latitude'=> 7.409409,
               			 'longitude'=> 99.463213
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP62"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'บ้านพระยารัษฎานุประดิษฐ์.'.'/n'.'Radsada Museum',
                		'latitude'=> 7.407587,
               			 'longitude'=> 99.515416
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP64"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'ต้นยางพาราต้นแรก.'.'/n'.' The first Rubber',
                		'latitude'=> 7.409590,
               			 'longitude'=> 99.522842
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP67"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'หาดยาว.'.'/n'.'Yao beach',
                		'latitude'=> 7.309508,
               			 'longitude'=> 99.394908
			];}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP66"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'หาดหยงหลิง.'.'/n'.'Yongling beach',
                		'latitude'=> 7.340928,
               			 'longitude'=> 99.373399
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP63"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'สถานีรถไฟกันตัง.'.'/n'.'Kantang train station',
                		'latitude'=> 7.410813,
               			 'longitude'=> 99.514646
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP61"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.กันตัง จ.ตรัง.'.'/n'.'Kantang Trang',
                		'address'=> 'ควนตําหนักจันทน์.'.'/n'.'Jun palace ',
                		'latitude'=> 7.405329,
               			 'longitude'=> 99.520313
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP71"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=>  'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP73"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.สิเกา จ.ตรัง.'.'/n'.'Sigao Trang',
                		'address'=> 'หาดปากเมง.'.'/n'.'Pak meng beach',
                		'latitude'=> 7.490606,
               			 'longitude'=> 99.329417
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP72"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.สิเกา จ.ตรัง.'.'/n'.'Sigao Trang',
                		'address'=> 'อุทยานแห่งชาติหาดเจ้าไหม.'.'/n'.'Jao mai national park',
                		'latitude'=> 7.412056,
               			 'longitude'=> 99.345359
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP74"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.สิเกา จ.ตรัง.'.'/n'.'Sigao Trang',
                		'address'=> 'พิพิธภัณฑ์สัตว์น้ำราชมงคล.'.'/n'.'Radchamongkol Aquarium' ,
                		'latitude'=> 7.529688,
               			 'longitude'=> 99.309753
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP75"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.สิเกา จ.ตรัง.'.'/n'.'Sigao Trang',
                		'address'=> 'หาดราชมงคล.'.'/n'.'Radchamongkol beach',
                		'latitude'=> 7.528221,
               			 'longitude'=> 99.307916
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP76"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.สิเกา จ.ตรัง.'.'/n'.'Sigao Trang',
                		'address'=> 'วัดเขาไม้แก้ว.'.'/n'.'khaomaikeaw temple',
                		'latitude'=> 7.638053,
               			 'longitude'=> 99.321923
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP81"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP83"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.วังวิเศษ จ.ตรัง.'.'/n'.'Wangwiset District',
                		'address'=> 'วังผาเมฆ.'.'/n'.'Wang pha mek ',
                		'latitude'=> 7.650992,
               			 'longitude'=> 99.363781
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP82"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.วังวิเศษ จ.ตรัง.'.'/n'.'Wangwiset District',
                		'address'=> 'สวนสาธารณะวังนกน้ำ.'.'/n'.'Wang nok nam Park',
                		'latitude'=> 7.643963,
               			 'longitude'=> 99.481688
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP85"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.วังวิเศษ จ.ตรัง.'.'/n'.'Wangwiset District',
                		'address'=> 'น้ําตกร้อยชั้นพันวัง.'.'/n'.'Roi chan pun wang waterfall',
                		'latitude'=> 7.895146,
               			 'longitude'=> 99.317788
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP84"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.วังวิเศษ จ.ตรัง.'.'/n'.'Wangwiset District',
                		'address'=> 'วัดราษฎร์รังสรรค์.'.'/n'.'Rad rung shun temple',
                		'latitude'=> 7.747697,
               			 'longitude'=> 99.389275
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP91"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP96"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'ถ้ำเลเขากอบ.'.'/n'.'Khao gob cave',
                		'latitude'=> 7.794298,
               			 'longitude'=> 99.572331
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP95"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'เขาหัวแตก.'.'/n'.'Hua teag Mountain',
                		'latitude'=> 7.800276,
               			 'longitude'=> 99.580905
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP97"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'วังเทพทาโร.'.'./n'.'Wang Thep Taro',
                		'latitude'=> 7.806683,
               			 'longitude'=> 99.571657
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP93"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'ศูนย์ศิลปะวิถี.'.'/n'.'Art Way Gallery',
                		'latitude'=> 7.715549,
               			 'longitude'=> 99.664868
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP94"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'น้ำตกปากแจ่ม.'.'/n'.'Pak jame waterfall',
                		'latitude'=> 7.748637,
               			 'longitude'=> 99.695031
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP92"){
				$messages = [
				'type' => 'location',
				'title'=>'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'เขาน้ำพราย.'.'/n'.'Nam prie Mountain' ,
                		'latitude'=> 7.715560,
               			 'longitude'=> 99.616667
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP98"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.ห้วยยอด จ.ตรัง.'.'/n'.'Huaiyot District',
                		'address'=> 'ถ้ำเขาปินะ.'.'/n'.'Pi na mountain cave',
                		'latitude'=> 7.749365,
               			 'longitude'=> 99.527385
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP101"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=>'วงเวียนหอนาฬิกา.'.'/n'.'Clock tower',
                		'latitude'=> 7.556767,
               			 'longitude'=> 99.609895
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP103"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.รัษฎา จ.ตรัง.'.'/n'.'Rassada Trang' ,
                		'address'=> 'วัดถํ้าพระพุทธ.'.'/n'.'tum pra put temple',
                		'latitude'=> 7.966571,
               			 'longitude'=> 99.744980
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP102"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.รัษฎา จ.ตรัง.'.'/n'.'Rassada Trang' ,
                		'address'=> 'ถ้ำพระยาพิชัยสงคราม.'.'/n'.'Prayapichaishongkram cave',
                		'latitude'=> 8.007172,
               			 'longitude'=> 99.751283
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP101"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.รัษฎา จ.ตรัง.'.'/n'.'Rassada Trang' ,
                		'address'=> 'วัดคลองเขาจันทร์.'.'/n'.'Clongkhaochan temple',
                		'latitude'=> 7.918779,
               			 'longitude'=> 99.692320
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP111"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'ร้านแกงส้ม.'.'/n'.'Khang som restaurant' ,
                		'latitude'=> 7.559810,
               			 'longitude'=> 99.607043
			];
			}
			   if (ereg_replace('[[:space:]]+', '', strtoupper($text)) == "MAP122"){
				$messages = [
				'type' => 'location',
				'title'=> 'อ.เมือง จ.ตรัง.'.'/n'.'Muang Trang',
                		'address'=> 'เค้กรสเลิศ.'.'/n'.'rodlert cake',
                		'latitude'=> 7.555034,
               			 'longitude'=> 99.604646
			];
			}
			if($text == "รูป"){
				$messages = [
				'type' => 'text',
				'text' => "http://sand.96.lt/images/q.jpg"
			];
			}
			if($text == "23548"){
				$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D",
    				'previewImageUrl' => "https://scontent.furt1-1.fna.fbcdn.net/v/t31.0-8/22829081_903091683188291_6843543102483932368_o.jpg?_nc_cat=0&_nc_eui2=AeHb1OKUTePH4pUIjxrUt-s_xAsTDvklvH-M4KR9TnMWDzTZwxG__lUrCXQgFvOQ3r6wvTL5OdA-AGIuaKlkd7oCsVkMthSUkxC1VTjzDMwnMg&oh=7a1dbeb18ff5e1bb033b2cb78973599f&oe=5B8F562D"
			];
			
            		}
			
			
			/*if($text == "image"){
				$messages = [
				$img_url = "http://sand.96.lt/images/q.jpg";
				$outputText = new LINE\LINEBot\MessageBuilder\ImageMessageBuilder($img_url, $img_url);
				$response = $bot->replyMessage($event->getReplyToken(), $outputText);
			];
			}*/
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
