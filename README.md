[index.php](https://github.com/user-attachments/files/26618809/index.php)
<!DOCTYPE html>
<html>
<head>
    <title>Homework login PHP</title>
</head>
<body>

    <div id="loginPage">
        <h2>Student Login</h2>
        <form id="loginForm">
            <label>Student ID or Email:</label><br>
            <input type="text" id="loginId" required><br><br>

            <label>Password:</label><br>
            <input type="password" id="loginPass" required><br><br>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="#" id="showSignupLink">Sign up here</a></p>
        <p id="loginError" style="color:red; display:none;">Invalid credentials. Try "student/123" or sign up.</p>
    </div>

    <div id="signupPage" style="display:none;">
        <h2>Taiwan Student Sign Up Form</h2>

        <form id="signupForm">
            <label>Full Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label>Date of Birth:</label><br>
            <input type="date" name="dob" required><br><br>

            <label>Age:</label><br>
            <input type="number" name="age" required><br><br>

            <label>Student ID:</label><br>
            <input type="text" name="student_id" required><br><br>

            <label>Degree:</label><br>
            <input type="text" name="degree" required><br><br>

            <label>Year:</label><br>
            <select name="year">
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select><br><br>

            <label>Gender:</label><br>
            <select name="gender">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">I don't know</option>
            </select><br><br>

            <label>University name:</label><br>
            <input type="text" name="university" required><br><br>

            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="#" id="showLoginLink">Login here</a></p>
    </div>

    <script>
        let loginPage = document.getElementById('loginPage');
        let signupPage = document.getElementById('signupPage');
        let loginForm = document.getElementById('loginForm');
        let signupForm = document.getElementById('signupForm');
        let showSignupLink = document.getElementById('showSignupLink');
        let showLoginLink = document.getElementById('showLoginLink');
        let loginError = document.getElementById('loginError');

        let users = [];

        let savedUsers = localStorage.getItem('simpleStudentUsers');
        if (savedUsers) {
            users = JSON.parse(savedUsers);
        } else {
            users.push({
                studentId: "student",
                password: "123",
                fullName: "Demo Student",
                dob: "2000-01-01",
                age: "22",
                degree: "Computer Science",
                year: "3",
                gender: "1",
                university: "Demo University"
            });
            localStorage.setItem('simpleStudentUsers', JSON.stringify(users));
        }

        function showLogin() {
            loginPage.style.display = 'block';
            signupPage.style.display = 'none';
            loginError.style.display = 'none';
        }

        function showSignup() {
            signupPage.style.display = 'block';
            loginPage.style.display = 'none';
        }

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let id = document.getElementById('loginId').value;
            let pass = document.getElementById('loginPass').value;

            let found = users.find(function(user) {
                return (user.studentId === id || (user.email && user.email === id)) && user.password === pass;
            });

            if (found) {
                alert("Login successful! Welcome " + found.fullName);
                showSignup();
            } else {
                loginError.style.display = 'block';
            }
        });

        // Handle sign up
        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get all values
            let fullName = signupForm.querySelector('input[name="name"]').value;
            let dob = signupForm.querySelector('input[name="dob"]').value;
            let age = signupForm.querySelector('input[name="age"]').value;
            let studentId = signupForm.querySelector('input[name="student_id"]').value;
            let degree = signupForm.querySelector('input[name="degree"]').value;
            let year = signupForm.querySelector('select[name="year"]').value;
            let gender = signupForm.querySelector('select[name="gender"]').value;
            let university = signupForm.querySelector('input[name="university"]').value;

            if (!fullName || !dob || !age || !studentId || !degree || !university) {
                alert("Please fill all required fields.");
                return;
            }

            let existing = users.find(function(user) {
                return user.studentId === studentId;
            });

            if (existing) {
                alert("Student ID already registered. Please login.");
                showLogin();
                return;
            }

            let newUser = {
                studentId: studentId,
                password: "123", 
                fullName: fullName,
                dob: dob,
                age: age,
                degree: degree,
                year: year,
                gender: gender,
                university: university
            };
            users.push(newUser);
            localStorage.setItem('simpleStudentUsers', JSON.stringify(users));

            alert("Sign up successful! You can now login with Student ID: " + studentId + " and password: 123");

            signupForm.reset();
            
            showLogin();
        });


        showSignupLink.addEventListener('click', function(e) {
            e.preventDefault();
            showSignup();
        });

        showLoginLink.addEventListener('click', function(e) {
            e.preventDefault();
            showLogin();
        });

    
        showLogin();
    </script>

</body>
</html>
