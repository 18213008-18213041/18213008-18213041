<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>*Insert Title* | KM-ITB </title>

    <link href="css/association.css" rel="stylesheet">
    <link href="css/snp.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="title">
                    <a class="navbar-brand" href="#">KM-ITB</a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="menu-bar">
                    <div class= "logo">
                        <img id="logo-img" src="assets/logo.gif"></img>
                    </div>
                    <div class= "menu">
                            <ul class="nav nav-pills">
                                <li><a href="http://localhost/home/index.php">Home</a></li>
									<li><a href="http://localhost/event/event-depan.php?action=get_all">Event</a></li>
									<li><a href="http://localhost/komunitas/od.html">Open Data</a></li>
									<li><a href="http://localhost/mahasiswa/datakader.html">Kader</a></li>
									
									<!-- authentication service -->
									<li><a href="/authentication/logout.php?logout=true">Logout</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    <div class="satu">
        <div class="satu-img">
            <!--<img id="img-satu" src="assets/satu/1-contoh.png"></img> -->
            <form action = "1-columnCal.php" method = "POST">
                <table align = "center">
                    <tr>
                        <input type = "hidden" name = "action" value = "calendar">
                        <td width ='200'>  
                            <select name = "month" required>
                                <option value = "" disabled selected>Choose your option</option>
                                <option value = "01">Januari</option>
                                <option value = "02">Februari</option>
                                <option value = "03">Maret</option>
                                <option value = "04">April</option>
                                <option value = "05">Mei</option>
                                <option value = "06">Juni</option>
                                <option value = "07">Juli</option>
                                <option value = "08">Agustus</option>
                                <option value = "09">September</option>
                                <option value = "10">Oktober</option>
                                <option value = "11">November</option>
                                <option value = "12">Desember</option>
                            </select>
                        </td>
                        <td width = '220'>
                            <select name = "year" required>
                                <option value = "" disabled selected>Choose your option</option>
                                <option value = "2013">2013</option>
                                <option value = "2014">2014</option>
                                <option value = "2015">2015</option>
                            </select>                     
                        </td>
                        <td><input type = "submit" value = "Search"></td>
                    </tr>
                </table>
            </form> 
        </div>
        <div class="satu-txt">
            <?php
                if(isset($_POST["action"])) {
                    $action = $_POST["action"];

                    echo "<hr>";
                    if($action === "calendar") {
                        $info = file_get_contents("http://localhost/event/api.php?action=calendar&year=" . $_POST["year"] . "&month=" . $_POST["month"]);
                        echo "<p align = 'center'>" . $info . "</p>";
                    } else {

                    }
                } else {
                    
                }
            ?>
        </div>
    </div>
    </div>

    <!-- Page Content -->
    <div class="container">
    <div class="center">
        <div class="social-media">
            <a href='https://www.facebook.com/ITB.KM'><img id="icon-fb" src="assets/home/icon-fb.png"></img></a>
            <a href='http://mail.google.com'><img id="icon-mail" src="assets/home/icon-mail.png"></img></a>
            <a href='https://www.instagram.com/km_itb/'><img id="icon-ig" src="assets/home/icon-ig.png"></img></a>  
        </div>
    </div>
    </div>
    
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="copyright">
                        <p>Sistem dan Teknologi Informasi 2013</p>
                    </div>
            </div>
            <!-- /.row -->
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
