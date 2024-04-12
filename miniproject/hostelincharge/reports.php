<html>
    <head>
    <title>incharges dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.png" />
        <style>
          #interface .chart{
                width:85%;
                text-align:center; 
                margin:5%; 
                height:200px;   
          }
          h2{
            margin:15px 0px;
          }
          #interface .chart .card{
            background-color:white;
            margin:20px;
            padding:25px 20px;
          }
        </style>
    </head>
<body>
<section id="menu">
            <div class="head">
                <img src="../images/favicon.png">
                <h1>GPMS</h1>
            </div>
            
            <div class="pages">
                <li><i class='bx bxs-dashboard'></i><a href="incharges_dashboard.html">Dashboard</a></li>
                <li><i class='bx bx-git-pull-request'></i><a href="requests.php">Requests</a></li>
                <li><i class='bx bxs-face'></i><a href="student.php">Student Details</a></li>
                <li><i class='bx bxs-pie-chart'></i><a href="hostelincharge/report.php">Reports</a></li>
                <li><i class='bx bx-brightness'></i><a href="setting.php">Settings</a></li>
            </div>
        </section>
        <section id="interface">
        <div class="navigation">
                <div class="n1">
                    <div>
                        <i id="menu-btn" class='bx bx-menu'></i>
                    </div>
                    <div class="search">
                        <i class='bx bx-search-alt-2'></i>
                        <input type="text" placeholder="search">
                    </div>
                </div>
                <div class="profile">
                    <i class='bx bx-bell'></i>
                    <img src="images/profile.jpg">
                </div>
           </div>
            <h3 class="i-name">
                Reports
            </h3>
            <div class="chart">
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                       <h2 class="card-title">Student Availability status</h2>
                       <canvas id="doughnutChart" style="height:250px"></canvas>
                     </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Total Number Of Students</h2>
                    <canvas id="barChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <script>
            $('#menu-btn').click(function(){
                $('#menu').toggleClass("active");
            })
        </script>
           
          
          <script src="../js1/vendor.bundle.base.js"></script>
        <script src="../js1/Chart.min.js"></script>
        <!-- End plugin js for this page -->
        <script src="../js1/chart.js"></script>
</body>
</html>