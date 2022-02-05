<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> my.cms </title>
	</head>
    <body>
        <header> 
            <p>my.cms HEADER</p>
            <p>
            <?php 
            if (isset($data['title'])) {
                echo $data['title']; 
            }
            ?>
            </p>
            <div>
                <a href="\"> HOME </a>
                <a href="\users\"> USERS </a> 
                <a href="\products\"> PRODUCTS </a> 
                <a href="\page\"> PAGES </a>
            </div>
        </header> 

