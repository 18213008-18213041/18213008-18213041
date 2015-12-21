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
                        <form action = "1-column.php" method = "POST">
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
                        <form action = "1-column.php" method = "POST">
                            <table>
                                <tr>
                                    <input type = "hidden" name = "action" value = "sort">
                                    <td width ='200'>  
                                        <select name = "criteria" required>
                                            <option value = "" disabled selected>Choose your option</option>
                                            <option value = "nama">Nama</option>
                                            <option value = "tanggal">Tanggal</option>
                                            <option value = "biaya">Biaya</option>
                                            <option value = "rating">Rating</option>
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
            <br>
            <form action = "1-column.php" method = "POST">
                <input type = "hidden" name = "action" value = "filter">
                <table align ='center'>
                    <tr>
                        <td width = '100'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>
                        <td width = '60'></td>                        
                    </tr>
                    <tr align = 'left'>
                        <td>Year</td>
                        <td colspan = '2'><input type = "checkbox" name = "year_list[]" value = "2015"> 2015</td>
                        <td colspan = '2'><input type = "checkbox" name = "year_list[]" value = "2016"> 2016</td>
                    </tr>
                    <tr align = 'left'>
                        <td>Month</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "1"> Jan</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "2"> Feb</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "3"> Mar</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "4"> Apr</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "5"> May</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "6"> Jun</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "7"> Jul</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "8"> Aug</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "9"> Sep</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "10"> Okt</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "11"> Nov</td>
                        <td><input type = "checkbox" name = "month_list[]" value = "12"> Dec</td>
                    </tr>
                    <tr align = 'left'>
                        <td>Target</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "Alumni"> Alumni</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "Dosen"> Dosen</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "KM"> KM</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "Mahasiswa"> Mahasiswa</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "OrangTua"> Orang Tua</td>
                        <td colspan = "2"><input type = "checkbox" name = "target_list[]" value = "Umum"> Umum</td>
                    </tr>
                    <tr align = 'left'>
                        <td>Location</td>
                        <td colspan = "2"><input type = "checkbox" name = "location_list[]" value = "Aula"> Aula</td>
                        <td colspan = "2"><input type = "checkbox" name = "location_list[]" value = "GKU"> GKU</td>
                        <td colspan = "2"><input type = "checkbox" name = "location_list[]" value = "Jatinangor"> Jatinangor</td>
                        <td colspan = "2"><input type = "checkbox" name = "location_list[]" value = "Lapangan"> Lapangan</td>
                        <td colspan = "2"><input type = "checkbox" name = "location_list[]" value = "Selasar"> Selasar</td>
                    </tr>
                    <tr>
                        <td align = 'left'><input type = "submit" value = "Filter"></td>
                    </tr>
                </table>
            </form>            
		</div>
		<div class="satu-txt">
            <?php 
                function printOut($response) {
                    /* Atur size */
                    echo "<table align = 'center'>";
                        echo "<tr>
                            <td width = '300'><b>NAMA</b></td>
                            <td width = '200'><b>TANGGAL</b></td>
                            <td width = '300'><b>LOKASI</b></td>
                            <td colspan = '2' width = '150'><b>BIAYA</b></td>
                            <td width = '150'><b>RATING</b></td>
                        </tr>";
                    foreach ($response as $data) {
                        echo "<tr>";

                        echo "<td align ='left'>";
                        // echo "<a href = home.php?nama=" . $data['data']['nama'] . ">" . $data['data']['nama'] . "</a><br>";
                        echo "<a href = event-detail.php?id=" . $data['data']['id_event'] . "&action=get_event>" . $data['data']['nama'] . "</a>";
                        echo "</td>";

                        echo "<td>";
                        echo $data['data']['tanggal'];
                        echo "</td>";

                        echo "<td>";
                        echo $data['data']['lokasi'];
                        echo "</td>";

                        echo "<td>Rp.</td>";

                        echo "<td align = 'right'>";
                        echo $data['data']['biaya'];
                        echo "</td>";

                        echo "<td>";
                        echo "<img src='assets/" . $data['data']['rating'] . "Star.png' widht = '60' height = '12'>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    echo "</table>";                        
                }

                if(isset($_POST["action"])) {
                    $action = $_POST["action"];

                    echo "<hr>";
                    if($action === "filter") {
                        $yearArray = isset($_POST['year_list']) ? $_POST['year_list'] : array();
                        $yearString = implode(',',$yearArray);
                        
                        $monthArray = isset($_POST['month_list']) ? $_POST['month_list'] : array();
                        $monthString = implode(',',$monthArray);

                        $targetArray = isset($_POST['target_list']) ? $_POST['target_list'] : array();
                        if(empty($targetArray)) {
                            $targetString = implode(',',$targetArray);
                        } else {
                            $targetString = "'" . implode("','",$targetArray) . "'";
                        }
                        
                        $locationArray = isset($_POST['location_list']) ? $_POST['location_list'] : array();
                        if(empty($locationArray)) {
                            $locationString = implode(',',$locationArray);
                        } else {
                            $locationString = "'" . implode("','",$locationArray) . "'";
                        }

                        $url = "http://localhost/event/api.php?action=filter&year=" . $yearString . "&month=" . $monthString . "&target=" . $targetString . "&location=" . $locationString;
                        $response = file_get_contents($url);            
                        $response = json_decode($response, true);
                        if (empty($response)) {
                            echo "Your filter did not match any events";
                        } else {
                            printOut($response);                            
                        }
                    } else {
                        if($action === "search") {
                            echo $_POST["criteria"] . "<br>";
                            $url = "http://localhost/event/api.php?action=search&criteria=" . $_POST["criteria"];
                            $response = file_get_contents($url);
                            $response = json_decode($response, true);
                            if (empty($response)) {
                                echo "Your search did not match any events";
                            } else {
                                printOut($response);                        
                            }
                        } else {
                            if($action === "sort") {
                                $url = "http://localhost/event/api.php?action=sort&criteria=" . $_POST["criteria"] . "&order=" . $_POST["order"];
                                $response = file_get_contents($url);
                                $response = json_decode($response, true);
                                printOut($response);
                            } else {

                            }
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
