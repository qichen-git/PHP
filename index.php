<!DOCTYPE html>
<html>
<head>
    <title>Student Sign Up</title>
</head>
<body>

    <h2>Taiwan Student Sign Up Form</h2>

    <form>
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
        <select name="year">
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">I don't know</option>
        </select><br><br>

        <label>University name:</label><br>
        <input type="text" name="university" required><br><br>

        <input type="submit" value="Sign Up">

    </form>

</body>
</html>