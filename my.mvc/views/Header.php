<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
        <?php 
        if (isset($contents['title'])) {
                echo $contents['title']; 
        }
        ?>
        </title> 
	</head>
    <body>
        <header> 
            <p>my.cms HEADER</p>
            <span>
            <?php 
            if (isset($contents['title'])) {
                echo $contents['title']; 
            }
            ?> </span>
        </header> 
        
        
     