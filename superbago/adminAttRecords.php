<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link rel="stylesheet" href="studentDashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
      a:link{
        text-decoration: none;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar .nav-link {
            color: white;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .main-content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h3 class="text-warning">ADMIN PORTAL</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="adminDashboard.php">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-calendar-check"></i> Attendance Records
                    </a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="adminStudentlist.php">
                        <i class="fas fa-users"></i> Student List
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        <i class="lni lni-plus"></i> Add Student                 
                    </a>
                </li>

                <div class="navbar-footer">
                    <a href="logout.php" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
           
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <h3><b>Attendance Records</b></h3>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
             <!--DATE-->
             <div class="container">
                <div class="card bg-transparent border-white align-items-end">
                    <div>
                        <p id="currentDate" class="fs-4 fw-bold"></p>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel"><span class="text-warning">Smart Attendance System</span> - Add New Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="studentForm">
                                <!-- Student ID -->
                                <div class="mb-3">
                                    <label for="student_number" class="form-label">Student ID</label>
                                    <input type="number" class="form-control" id="student_number" required>
                                </div>
                                
                                <!-- First Name -->
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="student_fname" required>
                                </div>
            
                                <!-- Last Name -->
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="student_lname" required>
                                </div>
            
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="studentEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="studentEmail" required>
                                </div>
            
                                <!-- Age -->
                                <div class="mb-3">
                                    <label for="studentAge" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="studentAge" required>
                                </div>
            
                                <!-- Course -->
                                <div class="mb-3">
                                    <label for="studentCourse" class="form-label">Course</label>
                                    <select class="form-select" id="studentCourse" required>
                                        <option value="" disabled selected>Select Course</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Engineering">Computer Engineering</option>
                                        <option value="Business Administration">Business Administration</option>
                                        <!-- Add other courses as needed -->
                                    </select>
                                </div>
            
                                <!-- Year Level -->
                                <div class="mb-3">
                                    <label for="studentYearLevel" class="form-label">Year Level</label>
                                    <select class="form-select" id="studentYearLevel" required>
                                        <option value="" disabled selected>Select Year Level</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                        
                                    </select>
                                </div>
            
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="student-records" class="container mt-4">

                <!-- Student Records Table -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time in</th>
                            <th scope="col">Time out</th>
                            <th scope="col">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>STU1001</td>
                            <td>John Doe</td>
                            <td>March 11, 2025</td>
                            <td>9:30 am</td>
                            <td>3:30 am</td>
                            <td>
                                absent
                            </td>
                        </tr>
                        <tr>
                            <td>STU1002</td>
                            <td>Jane Smith</td>
                            <td>March 11, 2025</td>
                            <td>9:30 am</td>
                            <td>3:30 am</td>
                            <td>
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function updateDate() {
         let today = new Date();
         let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
         document.getElementById("currentDate").innerText = today.toLocaleDateString("en-US", options);
     }
     updateDate();
   </script>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
