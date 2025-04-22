<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records - Smart Attendance System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .modal-header {
            background-color: #343a40;
            color: white;
        }

        .modal-title {
            font-weight: bold;
        }

        .table th, .table td {
            vertical-align: middle;
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
                <a class="nav-link" href="adminAttRecords.php">
                    <i class="fas fa-calendar-check"></i> Attendance Records
                </a>
            </li>   
            <li class="nav-item">
                <a class="nav-link" href="adminStudentlist.php">
                    <i class="fas fa-users"></i> Student List
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="addstudent.php" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    <i class="lni lni-plus"></i> Add Student                 
                </a>
            </li>

            <div class="n-footer">
                <a href="logout.php">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </ul>
    </div>

    

    <!-- Main Content -->
    <div class="container mt-5">
        <h3><b>Student List</b></h3>

        <div class="container">
            <div class="card bg-transparent border-white align-items-end">
                <div>
                    <p id="currentDate" class="fs-4 fw-bold"></p>
                </div>
            </div>
        </div>
        
        <!-- Student Records Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year Level</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="studentList">
                <!-- Example of a student record -->
                <tr>
                    <td>STU1001</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john.doe@example.com</td>
                    <td>21</td>
                    <td>Computer Science</td>
                    <td>3rd Year</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                            Edit
                        </button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>STU1002</td>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>jane.smith@example.com</td>
                    <td>22</td>
                    <td>Information Technology</td>
                    <td>2nd Year</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                            Edit
                        </button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <!-- Additional students will be added dynamically here -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding New Student -->
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
    
    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Handle form submission for adding new student
        document.getElementById('studentForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Get input values
            const studentId = document.getElementById('student_number').value;
            const firstName = document.getElementById('student_fname').value;
            const lastName = document.getElementById('student_lname').value;
            const email = document.getElementById('studentEmail').value;
            const age = document.getElementById('studentAge').value;
            const course = document.getElementById('studentCourse').value;
            const yearLevel = document.getElementById('studentYearLevel').value;

            // Add new student to the table
            const studentList = document.getElementById('studentList');
            const newRow = studentList.insertRow();

            newRow.innerHTML = `
                <td>${studentId}</td>
                <td>${firstName}</td>
                <td>${lastName}</td>
                <td>${email}</td>
                <td>${age}</td>
                <td>${course}</td>
                <td>${yearLevel}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteStudent(this)">Delete</button>
                </td>
            `;

            // Reset the form
            document.getElementById('studentForm').reset();

            // Close the modal
            const addStudentModal = new bootstrap.Modal(document.getElementById('addStudentModal'));
            addStudentModal.hide();
        });

        // Function to delete a student record
        function deleteStudent(button) {
            const row = button.closest('tr');
            row.remove();
        }

         function updateDate() {
          let today = new Date();
          let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          document.getElementById("currentDate").innerText = today.toLocaleDateString("en-US", options);
      }
      updateDate();
    </script>
</div>
</body>

</html>
