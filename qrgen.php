<?php 
require_once 'C:\xampp\htdocs/qrcodegen/phpqrcode/qrlib.php';
 // how to build raw content - QRCode with Business Card (VCard) + photo         
 $tempDir = QRCODE_PATH; //saves temporary directory path

 // we building raw data 
 $codeContents  = 'BEGIN:VCARD'."\n"; 
 $codeContents .= 'FN:'.$name."\n"; 
 $codeContents .= 'ID:'.$id."\n"; 
 $codeContents .= 'EMAIL:'.$email."\n"; 
 $codeContents .= 'PHOTO;JPEG;ENCODING=BASE64:'.base64_encode(file_get_contents('../'.$userAvatar))."\n"; 
 $codeContents .= 'END:VCARD'; 

 // generating 
 QRcode::png($codeContents, $tempDir.$clientid.'.png', 4, 3); 

$imgpath = QRCODE_PATH.$clientid.'.png';
$src = 'data: '.mime_content_type($imgpath).';base64,'.base64_encode(file_get_contents($imgpath));
echo '<img src="'.$src.'">';


 // displaying 
 return QRCODE_PATH.$clientid.'.png'; 