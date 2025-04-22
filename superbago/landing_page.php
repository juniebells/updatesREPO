<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link rel="stylesheet" href="landing_page.css">
    <title>SAS-Admin Homepage</title>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                
                <button id="toggle-btn" type="button">
                    <i class="lni lni-dashboard-square-1"></i>
                </button>

                <div class="sidebar-logo">
                    <a href="#">Admin Portal</a>                
                </div>         
            </div>

            <ul class="sidebar-nav">
                <li class="sidebar-items">
                    <a href="dashboard.html" class="sidebar-link">
                        <i class="lni lni-home-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-items">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-plus"></i>
                        <span>Add Student</span>
                    </a>
                </li>

                <li class="sidebar-items">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-notebook-1"></i>
                        <span>Attendance</span>
                    </a>
                </li>

            </ul>  

            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
            
        </aside>

        <div class="main d-flex justify-content-start align-items-center vh-100">
            <div class="w-50">
                <h1 class="text-start p-5">Make attendance easier with our advance technology.</h1>
            </div>
        </div>
        

    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>