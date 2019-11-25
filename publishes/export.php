<?php
$doc_body ="


";
?>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php require_once('../layout/header.php');  ?> 
<form name = "proposal_form" action="export.php" method="post">
<input type = "submit" name="submit_docs" value="Export as MS Word" class="input-button" />
</form> 
<?php
if(isset($_POST['submit_docs'])){
header("Content-Type: application/vnd.msword");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-chceck=0, pre-check=0");
header("content-disposition: attachment; filename=sampleword.doc");
}
echo "<html>";
echo "$doc_body";
echo "</html>";
?>