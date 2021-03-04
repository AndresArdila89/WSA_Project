<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php 
    if(isset($_GET['color'])){
        $color = htmlspecialchars(trim($_GET['color']));
        if($color == 'red'){
            $class='class="blueFont"';
        }elseif($color == 'blue'){
            $class='class="blueFont"';
        }
        else{
            $class = '';
        }
    }

    

    #ternary operator 

    ?>

    <p <?php echo $class?> >Helloooooooo</p>

</body>
</html>