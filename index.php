<!DOCTYPE >
<html>
<head>
    <title>TDRPG</title>
    
    <link rel="stylesheet" type="text/css" href="fonts/Bariol-Regular/font.css">
    
    <style>
        body {
            background-color:#EEE;
            font-size:62.5%;
        }
        
        body, input[type=text], input[type=submit], input[type=reset], #content {
            font-family:'Bariol-Regular';
            color:#666;
            outline: none;
            font-smoothing:antialiased;
            -moz-font-smoothing:antialiased;
            -webkit-font-smoothing:antialiased;
            -o-font-smoothing:antialiased;
        }
        
        /*label {
            font-size:1.6em;   
        }*/
        
        input[type=text] {
            width: 260;
        }
        
        /*input[type=text] {
            font-size:1.6em;
        }*/
        
        #section {
            font-size:1.6em;
        }
    </style>
</head>

<body>
<section id="section">
<?php
    include '/pages/index.php';
    _main();
?>
<br />
<br />
<a rel="license" target="_blank" href="http://creativecommons.org/licenses/by/3.0/deed.pt_BR">
    <img alt="Licença Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/88x31.png" />
</a>
</section>    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</body>    
</html>
