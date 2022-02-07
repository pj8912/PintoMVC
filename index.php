<h1 align="center">
#PintoMVC
A small web framework created using PHP based on MVC pattern
</h1>
<?php

$conn = mysqli_connect('localhost','lookfnbi_jp98', '16uph306','lookfnbi_testing');
if($conn){
	echo 'mysql:working';
}
else{
	echo 'fuck!';
}

