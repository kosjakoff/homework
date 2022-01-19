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
            if (isset($contents['title'])) {
                echo $contents['title']; 
            } elseif (isset($controller->title)) {
                echo $controller->title;
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

        <?php 
        if ($action) {
            require("views/" . $action . ".php");
        }
        ?>
        
        <footer class="footer">
        <p>FOOTER</p>
    </footer>
    </body>
</html>
     