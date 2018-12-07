<?php
if(isset($_GET['tag']))
{
    $tag= $_GET['tag'];
    include './api/spoonacularAPI.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Finder</title>

        <!-- 
            THIS IS STYLE SHEET FOR BOOTSTRAP 3
            THE MODAL USES BOOTSTRAP 4, but won't work with 3 still enabled
            So I'll leave this here in case we need it for something
             
            <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet">
        -->
        
        <!--
            !!!!!! IMPORTANT !!!!!
            PLEASE DON'T CHANGE THE ORDER OF THESE STYLE AND SCRIPT TAGS
        -->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <style>@import url("./css/styles.css");</style>
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    </head>
    <body>
        <br><br><br>
        <header>
            <h1>Recipe Search</h1>
        </header>
        <main>
        <form>
            <input type="text" name="tag" placeholder = "Enter Ingredients" value="<?=$_GET['tag']?>"/>
            </br>
            <input type="Submit" value="Search"/>
            <button id="trivia">test</button>
        </form>
        
        <button type="button" class="recipeModalButton" data-toggle="modal" data-target="#recipeModal" onclick="createModal()">
            Recipe Modal
        </button>
        
        <?php
        
    
        echo '<div class="modal fade" id="recipeModal" tabindex="-1" role="dialog" aria-labelledby="recipeModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-lg" role="document">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="recipeModalLabel"></h5>'; //RECIPE NAME GOES IN HERE
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                            echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                        echo '<div style="inline-block" id="recipeImgDiv"></div>'; //RECIPE IMAGE GOES HERE
                        echo '<div style="inline-block" id="recipeInfoDiv" ></div>'; //RECIPE INFO GOES HERE
                    echo '</div>';
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div> <br/>';
        
        
        if(empty($_GET)) // form was not submitted
        { 
            echo "";
        } 
        else // form was submitted
        { 
            if(!empty($tag))
            {
                echo "<h1 style= 'margin: 0'> You searched for: ". $_GET['tag']. "</h1>";
                $recipes = ingredientSearch($_GET['tag'], 5);
                //print_r($recipes);
                echo "<br>";
                for($i = 0; $i < 5; $i++)
                {
                    echo $recipes[$i]['title'];
                    echo "<br>";
                    echo "<img src= " . $recipes[$i]['image'] .">";
                    echo "<br></br>";
                }
            }
        }
        ?>
        </main>
        
        
        <script src="modal/modal.js"></script>
        
    </body>    
</html>