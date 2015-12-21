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
            <table align = 'center'>
                <tr>
                    <td width = '341'>
                        <form action = "1-columnKad.php" method = "POST">
                            <table>
                                <tr>
                                    <input type = "hidden" name = "action" value = "search">
                                    <td><input type = "text" name = "criteria" placeholder = "Keyword" required></td>
                                    <td><input type = "submit" value = "Search"></td></td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td>
                        <form action = "1-columnKad.php" method = "POST">
                            <table>
                                <tr>
                                    <input type = "hidden" name = "action" value = "sort">
                                    <td width ='200'>  
                                        <select name = "criteria" required>
                                            <option value = "" disabled selected>Choose your option</option>
                                            <option value = "Nama">Nama Mahasiswa</option>
                                            <option value = "NIM">NIM Mahasiswa</option>
                                            <option value = "Unit/Himpunan/Organisasi">Unit/Himpunan/Organisasi</option>
                                            <option value = "Event_Kepanitiaan_1">Event 1</option>
                                            <option value = "Event_Kepanitiaan_2">Event 2</option>
                                            <option value = "Event_Kepanitiaan_3">Event 3</option>
                                        </select>
                                    </td>
                                    <td width = '220'>
                                        <select name = "order" required>
                                            <option value = "" disabled selected>Choose your option</option>
                                            <option value = "asc">Ascending</option>
                                            <option value = "desc">Descending</option>
                                        </select>                     
                                    </td>
                                    <td><input type = "submit" value = "Sort"></td>
                                </tr>
                            </table>
                        </form>                                                                
                    </td>
                </tr>
            </table>
        </div>
        <div class="satu-txt">
            <?php 
                function printOut($response) {
                    /* Atur size */
                    echo "<table align = 'center'>";
                        echo "<tr>
                            <td width = '200'><b>Nama Mahasiswa</b></td>
                            <td width = '100'><b>NIM Mahasiswa</b></td>
                            <td width = '250'><b>Unit/Himpunan/Organisasi</b></td>
                            <td width = '160'><b>Event 1</b></td>
                            <td width = '190'><b>Event 2</b></td>
                            <td width = '170'><b>Event 3</b></td>
                        </tr>";
                    foreach ($response as $data) {
                        echo "<tr>";

                        echo "<td align ='center' style = 'vertical-align : top' >";
                        echo $data['data']['Nama'];
                        echo "</td>";

                        echo "<td align ='center' style = 'vertical-align : top'>";
                        echo $data['data']['NIM'];
                        echo "</td>";

                        echo "<td style = 'vertical-align : top'>";
                        echo $data['data']['Unit/Himpunan/Organisasi'];
                        echo "</td>";

                        echo "<td align ='left' style = 'vertical-align : top'>";
                        echo $data['data']['Event_Kepanitiaan_1'] . "<br>";
                        echo "Posisi : <br>" . $data['data']['Posisi_1'];
                        echo "Tahun : <br>" . $data['data']['Tahun_Mulai_1'] . " - " . $data['data']['Tahun_Akhir_1'] . "<br>";
                        echo "</td>";

                        echo "<td align ='left' style = 'vertical-align : top'>";
                        echo $data['data']['Event_Kepanitiaan_2'] . "<br>";
                        echo "Posisi : <br>" . $data['data']['Posisi_2'];
                        echo "Tahun : <br>" . $data['data']['Tahun_Mulai_2'] . " - " . $data['data']['Tahun_Akhir_2'] . "<br>";
                        echo "</td>";

                        echo "<td align ='left' style = 'vertical-align : top'>";
                        echo $data['data']['Event_Kepanitiaan_3'] . "<br>";
                        echo "Posisi : <br>" . $data['data']['Posisi_3'];
                        echo "Tahun : <br>" . $data['data']['Tahun_Mulai_3'] . " - " . $data['data']['Tahun_Akhir_3'] . "<br>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    echo "</table>";                        
                }

                if(isset($_POST["action"])) {
                    $action = $_POST["action"];

                    echo "<hr>";
                    if($action === "search") {
                        $url = "http://localhost/mahasiswa/api3.php?action=search&criteria=" . $_POST["criteria"];
                        $response = file_get_contents($url);
                        $response = json_decode($response, true);
                        if (empty($response)) {
                            echo "Your search did not match any events";
                        } else {
                            printOut($response);                        
                        }
                    } else {
                        if($action === "sort") {
                            $url = "http://localhost/mahasiswa/api3.php?action=sort&criteria=" . $_POST["criteria"] . "&order=" . $_POST["order"];
                            $response = file_get_contents($url);
                            $response = json_decode($response, true);
                            printOut($response);
                        } else {

                        }
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
