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
            <div>
                <a href="\"> HOME </a>
                <a href="\users\"> USERS </a> 
                <a href="\products\"> PRODUCTS </a> 
                <a href="\page\"> PAGES </a>
            </div>
        </header> 
        
        
     