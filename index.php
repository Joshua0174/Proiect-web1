<?php
session_start();
require "login/User.php";

if (!User::isLoggedIn()) {
    header("Location: login.php");
    exit;
}
list(
        'username' => $username,
        "email" => $email
        ) = User::details();
?>
<?php

class CV {

    private $CV;

    public function setCV($CV) {
        $this->CV = $CV;
    }

    public function getCV() {
        return $this->CV;
    }

}

$CV = new CV();
$CV->setCV('CV');
?>
<?php
require_once('connect.php');
if (isset($_POST['submit'])) {
    $image = $_POST['image'];
    $details = $_POST['details'];
    

    $sql = "insert into `items` (image, details) values('$image', '$details')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        //echo "Data inserted succesfully";
        header('location:ceva.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stylish Portfolio - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Start Bootstrap</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">About</a></li>
                <li class="sidebar-nav-item"><a href="#services">Services</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Perfection</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">This is your jam for today!</span>
                                <audio controls>
                                    <source src="assets\mp3.mp3" type="audio/mpeg">
                                </audio>
                            </h2>
                <h2 style="margin-top:0;">Welcome, <?= $username ?> </h2>
                

                <p><?= $email ?></p>
                <a href="logout.php">Logout</a>
                <svg class="smiley" width="256" height="256" 0 0 256 256>
                    <cirlce class="face" cx="128" cy="128" r="120"/>
                    <circle class="left-eye" cx="100" cy="104" r="12"/>
                    <circle class="right-eye" cx="156" cy="104" r="12"/>
                    <path class="mouth" d="M100,160,Q128, 190 156,160"/>
                </svg>
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Do you believe that your portfolio is not good enough or it needs some changes?</h2>
                        <p class="lead mb-5">
                            You can send it to us to analyze it and explain to you which are the changes you need to make to create your perfect 
                            <span class="section-heading-upper">
                               <?php
                                 echo "<br>";
                                 echo $CV->getCV();
                                 ?> </span>

                            !
                        </p>
                        <h2 class="section-heading mb-0">
                            <div class="container">
                                <span class="section-heading-upper"></span>
                                <form action="upload_client.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" /><!-- comment -->
                                    <button type="submit" name="upload">Upload file</button>
                                </form>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services and products</h3>
                    <h2 class="mb-5">What We Offer</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <th>Image</th>
                                            
                                            <th>Details</th>
                                        </tr>
                                        <?php
                                        $res=mysqli_query($db,"SELECT * FROM items ORDER BY id DESC");
                                        while($row= mysqli_fetch_array($res)){
                                            echo '<br><tr>
                                                <td><img src="upload/'.$row['image'].'" height="200"></td>
                                                <td>'.$row['details'].'</td>
                                                
                                                </tr>';
                                                   
                                        }
                                        ?>
                                    </table>
                                    Are you looking for a certain service or product that we can offer you? Take a look by yourself!
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Id</td>
                                                <td>Image</td>
                                                <td>Details</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","items");
                                            
                                            if(isset($_GET['search'])){
                                                $filtervalues=$_GET['search'];
                                                $query="SELECT * FROM `items` WHERE CONCAT(image,details) LIKE '%$filtervalues%'";
                                                $query_run=mysqli_query($con,$query);
                                                
                                                if(mysqli_num_rows($query_run)>0){
                                                    foreach($query_run as $items){
                                                        ?>
                                                            <tr>
                                                                <td><?=$items['id'];?></td>
                                                                <td><?=$items['image'];?></td>
                                                                <td><?=$items['details'];?></td>
                                                               
                                                            </tr>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                        <tr>
                                                            <td colspan="3">No record found!</td>
                                                        </tr> 
                                                    <?php
                                                    
                                                }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </p></div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    <iframe width="600" height="500" src="https://youtube.com/embed/0lbzmZeS-BY"></iframe>
                </h2>

            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">We are perfectionists</h3>
                    <h2 class="mb-5">We are</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Hard-working</div>
                                    <p class="mb-0">You will receive from us every answer you'll need to achieve perfection.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-1.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Creative</div>
                                    <p class="mb-0">We will give you the best ideas for your portfolio!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-2.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Responsible</div>
                                    <p class="mb-0">We are going to take good care for you during your visits here!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-3.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Workspace</div>
                                    <p class="mb-0">I believe that all can relate to this:)</p>
                                </div>
                            </div>
                            <div class="cta-inner bg-faded text-center rounded">
                            <video width="600" height="400" controls>
                                <source src="assets/mp4.mp4" type="video/mp4">
                            </video>
                            
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">The button below is impossible to resist...Do you want to know which is the meme of the day?</h2>
                <div class="product-item-description d-flex me-auto">
                    <p></p>
                    <img id="leslie" src="assets/img/leslie.png.jpg" alt="Leslie" width="0" height="0">
                    <p>Press the button to find out...        </p>
                    <canvas id="myCanvas" width="460" height="350" style="border:1px solid #d3d3d3;">
                        Your browser does not support the HTML canvas tag.
                    </canvas>

                    <p><button onclick="myCanvas()">Try it</button></p>

                    <script>
                        function myCanvas() {
                            var c = document.getElementById("myCanvas");
                            var ctx = c.getContext("2d");
                            var img = document.getElementById("leslie");
                            ctx.drawImage(img, 5, 5);
                        }
                    </script>
                </div>

            </div>
        </section>
        <!-- Map-->
        <div class="map" id="contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5424.314376978654!2d27.567126634887696!3d47.17435889999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D!5e0!3m2!1sro!2sro!4v1686491437577!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            <br />
            <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small>
        </div>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                <p class="text-muted small mb-0"></p>
            </div>
            <div class="container"><p class="m-0 small">
                    <button id="like" onclick="liked()">
                        <i class="fa fa-thumbs-up"></i>
                        <span class="icon">Like</span>
                    </button>
                    <script>
                        function liked() {
                            var element = document.getElementById("like");
                            element.classList.toggle("liked");
                        }
                    </script>
                    <button id="share" onclick="shared()">
                        <i class="share"></i>
                        <span class="icon">Share</span>
                    </button>
                    <script>
                        function shared() {
                            var element = document.getElementById("share");
                            element.classList.toggle("shared");
                        }
                    </script>
                </p>

            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
