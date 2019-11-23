<?php 
require_once('./../config/connection.php'); 
$year = '';
$title = '';
$createdWith = '';
$participation = '';
$doi = '';
$date = '';
$numOfPoints = '';
$conference = '';
$ERROR = array("year"=>'',"title"=>'',"createdWith"=>'', "participation"=>'', "doi"=>'', "date"=>'', "numOfPoints"=>'', "conference"=>'');
if($_POST && isset($_POST['wyslij'])) {
    if(empty($_POST['year'])) {
        $ERROR['year'] = 'is required';
    }
    if(empty($_POST['title'])) {
        $ERROR['title'] = 'is required';
    }
    if(empty($_POST['createdWith'])) {
        $ERROR['createdWith'] = 'is required';
    }
    if(empty($_POST['participation'])) {
        $ERROR['participation'] = 'is required';
    }
    if(empty($_POST['doi'])) {
        $ERROR['doi'] = 'is required';
    }
    if(empty($_POST['date'])) {
        $ERROR['date'] = 'is required';
    }
    if(empty($_POST['numOfPoints'])) {
        $ERROR['numOfPoints'] = 'is required';
    }
    if(empty($_POST['conference'])) {
        $ERROR['conference'] = 'is required';
    }
    if(!empty($_POST['year']) && !empty($_POST['title']) && !empty($_POST['createdWith'])&& !empty($_POST['participation']) && !empty($_POST['doi']) && !empty($_POST['date']) && !empty($_POST['numOfPoints'])&& !empty($_POST['conference'])) {
        try {
            if($_POST['id']) {
                require_once('update.php');
            } else {
                require_once('insert.php');
            }
            $res = $publishes->execute();
            
        if ($res ) {
            header('Location: ./../index.php');
            die(); 
        }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
else {
    require_once('edit.php');
    $res = $publishes->execute();
    foreach($publishes as $row) {
        $year = $row['year'];
        $title = $row['title'];
        $createdWith = $row['createdWith'];
        $participation = $row['participation'];
        $doi = $row['doi'];
        $date = $row['date'];
        $numOfPoints = $row['numOfPoints'];
        $conference = $row['conference'];
    }
}
?>
<html>
<head>
<title> Login </title>
<meta charset = "UTF-8">
<link rel="Stylesheet" href="./../css/style_login.css">
</head>
<body>
    <?php require_once('./../layout/header.php') ?>
    <p><?php echo $_POST['id'] ? 'Edytowanie publikacji' : 'Dodawanie publkacji'?></p>
    <form method="POST">
    <a href="./../index.php"><p>Back</p></a>
    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
    <div class="form-field">
        <label class="form-label">year </label>
        <input type="text" name="year" value="<?php echo $year ?>">
        <span class="error"><?php echo $ERROR['year'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">title</label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <span class="error"><?php echo $ERROR['title'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">createdWith</label>
        <input type="text" name="createdWith" value="<?php echo $createdWith ?>">
        <span class="error"><?php echo $ERROR['createdWith'] ?></span> 
    </div>
    <div class="form-field">
        <label class="form-label">participation </label>
        <input type="text" name="participation" value="<?php echo $participation ?>">
        <span class="error"><?php echo $ERROR['participation'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">doi </label>
        <input type="text" name="doi" value="<?php echo $doi ?>">
        <span class="error"><?php echo $ERROR['doi'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">date </label>
        <input type="text" name="date" value="<?php echo $date ?>">
        <span class="error"><?php echo $ERROR['date'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">num0fPoints </label>
        <input type="text" name="numOfPoints" value="<?php echo $numOfPoints ?>">
        <span class="error"><?php echo $ERROR['numOfPoints'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">conference </label>
        <input type="text" name="conference" value="<?php echo $conference ?>">
        <span class="error"><?php echo $ERROR['conference'] ?></span>
    </div>
    <button name="wyslij" value="wyslij">Save</button> 
    </form>
    </body>
    </html>
