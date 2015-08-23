<form method="POST" action="">
    <textarea name="text" row="10"></textarea>
    <input type="submit" value="clean" name="clean">
</form>
<?php
if(isset($_POST['clean'])){
    $text= strip_tags($_POST['text']);
    echo $text;
}
?>