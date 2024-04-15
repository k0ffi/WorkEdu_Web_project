<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$data['page_title'] . " - " .WEBSITE_TITLE?></title>

    <link rel="stylesheet" href="<?=ASSETS?>css/elements.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/qcm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?=ASSETS?>/js/header.js"></script>
    </header>

    <main>   
        
    <div class="form-container">
        <h1>Faire QCM</h1>

        <form method="post" >
        <label for="sujet"><h2>Sujet</h2></label>
        <div class="sujet"><input type="text" id="sujet" name="sujet" required value="<?php echo $data['cour']?>" readonly><br><br></div>


        <label for="question"><h2>Question :</h2></label>
        <div class="form-input"><input type="text" id="question" name="question" value="<?php echo $data[0]['question']?>" readonly><br><br></div>
        

        <label for="proposition1"><h3>A :</h3></label> &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-input"> <input type="text" id="proposition1" name="proposition1" value="<?php echo $data[0]['propositions'][1]?>" readonly></div>
        

        <label for="proposition2"><h3>B :</h3></label>&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-input"><input type="text" id="proposition2" name="proposition2" value="<?php echo $data[0]['propositions'][2]?>" readonly></div>
        

        <label for="proposition3"><h3>C :</h3></label>&nbsp;&nbsp;&nbsp;&nbsp; 
        <div class="form-input"><input type="text" id="proposition3" name="proposition3" value="<?php echo $data[0]['propositions'][2]?>" readonly></div>
        
        <input type="reset"  value="effacer" class="btn-effacer" >&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="valider" class="btn-valider">
        
        </form>
    </div>

    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
    <script>
        var input  =  document.getElementById("proposition1") ; 
        input.addEventListener("click" , function()
        {
            input.style.backgroundColor = "#8ac926" ;  
        })
    </script>
</body>
</html>