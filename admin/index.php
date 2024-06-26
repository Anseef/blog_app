<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Admin Panel</title>
    <base href="/fekxs/Project%201%20Blog/blog_app/admin/">
    <link rel="stylesheet" href="../Style/Admin.css?v=<?php echo time()?>">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/admin.js?v=<?php echo time()?>"></script>
</head>
<body>
<?php include '../common/Common_functions.php';?>

    <div id="spinner" class="the-spinner show">
        <div class="spinner-border" role="status">
        </div>
    </div>
    <div class="main-body">
        <header></header>
        <section>
            <aside class="side-bar">
                <h5>Menu</h5>
                <nav>
                    <ul class="navigations">
                        <a href="Dashboard"><li id="nav-options" class="bi-clipboard-check">Dashboard</li></a>
                        <a href="User"><li id="nav-options" class="bi-person">Users</li></a>
                        <a href="Posts"><li id="nav-options" class="bi-pen">Posts</li></a>
                        <a href="Reports"><li id="nav-options" class="bi-inbox">Reports</li></a>
                    </ul>
                </nav>
            </aside>
            <div class="content" id="the-content">
            <?php
                $requestUri = trim($_SERVER['REQUEST_URI'], '/');
                $baseDir = 'fekxs/Project%201%20Blog/blog_app/admin';
                if (strpos($requestUri, $baseDir) === 0) {
                    $page = substr($requestUri, strlen($baseDir));
                    $page = trim($page, '/'); 
                    $tr=explode('/',$page);
                    $page=end($tr);
                } else {
                    $page = $requestUri;
                }
                if($page!='PostView'){
                    echo "<script>open_post(0,404)</script>";
                }
                if($page=='PostView'){
                    if($tr[0]=='User'){
                        $page="404";
                    }
                }
                if($page==''){
                    include('Dashboard.php');
                }else{
                    if(file_exists("$page.php")){
                        include($page.".php");
                    }
                    else{
                        echo "<div style='color:red;height:100%;width:100%;display:flex;align-items:center;justify-content:center;flex-direction:column;font-size:70px'><ion-icon style='font-size:200px;' name='alert-circle-outline'></ion-icon>Page Not Found</div>";
                    }
                }
            ?>


            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</body>
</html>