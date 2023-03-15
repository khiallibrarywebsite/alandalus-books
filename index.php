<!DOCTYPE html>
<html lang="ar">>  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <style>
            .about .row{
   display: flex;
   align-items: center;
   flex-wrap: wrap;
   gap:1.5rem;
}

.about .row .image{
   flex: 1 1 40rem;
}

.about .row .image img{
   width: 100%;
   height: 50rem;
}

.about .row .content{
   flex: 1 1 40rem;
}

.about .row .content p{
   font-size: 1.7rem;
   line-height: 2;
   color: var(--light-color);
   padding: 1rem 0;
}

.about .row .content h3{
   font-size: 3rem;
   color:var(--black);
   text-transform: capitalize;
}

.about .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
   margin-top: 3rem;
}

.about .box-container .box{
   border-radius: .5rem;
   background-color: var(--white);
   padding: 2rem;
   display: flex;
   align-items: center;
   gap: 2.5rem;
}

.about .box-container .box i{
   font-size: 4rem;
   color: var(--main-color);
}

.about .box-container .box h3{
   font-size: 2.5rem;
   color: var(--black);
   margin-bottom: .3rem;
}

.about .box-container .box p{
   font-size: 1.7rem;
   color:var(--light-color);
}
textarea{
   height: 20rem;
   resize: none;
   background-color: var(--light-bg);
   border-radius: .5rem;
   border: var(--border);
   padding: 1.4rem;
   font-size: 1.8rem;
   color: var(--black);
   width: 100%;
   margin: .5rem 0;
}
        </style>
    </head>
    <body id="page-top">
        	<!-- Loading screen -->
	<div id="loading-screen">
		<img src="img/loading.gif" alt="Loading...">
	</div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="img/logo.png" alt="..."  style="width: 90px;height: 90px;"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#way">طريقة العمل</a></li>
                        <li class="nav-item"><a class="nav-link" href="#schools">المدارس</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">راسلنا</a></li>
                        <li class="nav-item"><a  class="nav-link" href="login.php">تسجيل دخول</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">أهلا بكم في مكتبة مدارس الأندلس</div>
                <div class="masthead-heading text-uppercase">سعدنا بلقائكم</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#way">أخبرني بالمزيد</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="way">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">طريقة العمل</h2>
                    <h3 class="section-subheading text-muted">تصميم بسيط إستخدام سلس وسريع لتجربة أفضل</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-book fa-stack-1x fa-inverse blue"></i>
                        </span>
                        <h4 class="my-3">إختر الكتاب</h4>
                        <p class="text-muted">قم بتصفح مجموعة الكتب المضافة من قبل المعلمين واختر الكتاب الذي يناسبك</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-download fa-stack-1x fa-inverse blue"></i>
                        </span>
                        <h4 class="my-3">قم بالتحميل</h4>
                        <p class="text-muted">قم بتحميل الكتاب بصيغة بي دي اف من خلال النقر علي زر التحميل</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-book-open fa-stack-1x fa-inverse blue"></i>
                        </span>
                        <h4 class="my-3">اقراء</h4>
                        <p class="text-muted">إستمتع بقرائة الكتاب وبعد الإنهاء قم بإجابة الأسئلة لتحصل علي النقاط!   </p>
                    </div>
                </div>
            </div>
            
        </section>
        <center>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="schools">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">المدارس</h2>
                    <h3 class="section-subheading text-muted">انضم إلى مدرستنا واستمتع بأفضل تعليم في كل مكان! فنحن نتواجد في العديد من الفروع لنلبي احتياجات طلابنا الأعزاء في كل مكان</h3>
                </div>
                <div class="row">
                <?php
require_once 'connect.php';

$sql = "SELECT * FROM tables_index";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  $num=0;
    while ($row = mysqli_fetch_assoc($result)) {
      $id_table = $row["id"];
      $table_img = $row["img"];
      $table_name = $row["name"];
      $ql = "SELECT COUNT(*) AS total_books FROM books WHERE school = '$id_table'"; 
      $re = mysqli_query($conn, $ql);
      if (mysqli_num_rows($re) > 0) {
        $ro = mysqli_fetch_assoc($re);
        $total_books = $ro["total_books"];
        $num++;
        echo'
        <div class="col-lg-4 col-sm-6 mb-4">
        <!-- Portfolio item 2-->
        <div class="portfolio-item">
            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal'.$num.'">
                <img class="img-fluid" src="img/'.$table_img.'" alt="..." / style="width:200px; height:200px;">
            </a>
            <div class="portfolio-caption">
                <div class="portfolio-caption-heading">'.$table_name.'</div>
                <div class="portfolio-caption-subheading text-muted">عدد الكتب : '   . $total_books . '</div>
            </div>
        </div>
     </div> ';

      } else {
      $total_books = 0;
      $num++;
      echo'
      <div class="col-lg-4 col-sm-6 mb-4">
      <!-- Portfolio item 2-->
      <div class="portfolio-item">
          <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal'.$num.'">
              <img class="img-fluid" src="img/'.$table_img.'" alt="..." />
          </a>
          <div class="portfolio-caption">
              <div class="portfolio-caption-heading">'.$table_name.'</div>
              <div class="portfolio-caption-subheading text-muted">عدد الكتب : '   . $total_books . '</div>
          </div>
      </div>
   </div>
   ';
    }

    }
  }
?>

                    </div>
        </section>
</center>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">من نحن</h2>
                    <h3 class="section-subheading text-muted">مدارس الأندلس: روح الإبداع والتميز في التعليم</h3>
                </div>
                               <center> <h4>منذ 1984</h4>
                            <div class="timeline-body"><p class="text-muted">من نحن نحن مجموعة مدارس في المملكة العربية السعودية نساهم في نشر العلم وتوعية الطلاب وتثقيفهم لمستقبل وجيل أفضل </p></div>
                        </center>
                        </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/1s.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/2s.png" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/3s.png" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/4s.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <section class="contact">

                <div class="row">
             
                   <div class="image">
                      <img src="../img/logo.svg" alt="">
                   </div>
             
                   <form action="" method="post">
                      <h3>اكتب رسالتك</h3>
                      <input type="text" placeholder="اكتب اسمك" name="name" required class="box">
                      <input type="email" placeholder="اكتب الإميل" name="email" required class="box">
                      <textarea name="msg" class="box" placeholder="اكتب رسالتك ( مشكله في الموقع - فكره لتحسين الموقع - طلب ) وسوف يتم ارسالها الي فريق مختص" required cols="30" rows="10"></textarea>
                      <input type="submit" value="ارسال الرسالة" class="inline-btn" name="send">
                   </form>
             
                </div>
             <?php
                if (isset($_POST['send'])) {
                 require_once '../connect.php';
                 // Check if all form fields are set
                 $requiredFields = [
             
                   'name',
                   'email',
                   'msg'
                 ];
               foreach ($requiredFields as $field) {
                   if (!isset($_POST[$field])) {
                       echo "قم باكمال جميع المتطلبات";
                       return;echo"<script>$('#loading-screen').hide();</script>";
                   } else {
                       // Get variables using mysqli_real_escape_string to prevent SQL injection
                       $name1 = mysqli_real_escape_string($conn, $_POST['name']);
                       $email = mysqli_real_escape_string($conn, $_POST['email']);
                       $msg = mysqli_real_escape_string($conn, $_POST['msg']);
             
                       $current_date = date('Y-m-d H:i:s');
                       $sql = "INSERT INTO contact (`name`, `date`, `message`, `type`, `email`)
                       VALUES ('$name1' ,'$current_date' ,'$msg' ,'guest' ,'$email')";
             
             
                         if (mysqli_query($conn, $sql)) {
             
                             echo "<h3 chass='headers'>تم الارسال بنجاح</h3>";
                         }else{
                             echo "حدث خطا أثناء الإرسال";
                         }
                   }
                 }
             }?>
        </section>
        <footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/jsindex.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <link href="css/css.css.css" rel="stylesheet" />
    </body>
</html>
