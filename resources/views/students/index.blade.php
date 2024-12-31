<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>
    <form method="GET" action="{{ route('students.index') }}">
        <select name="department_id">
            <option value="">Select Department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>

        <select name="course_id">
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

        <select name="session_id">
            <option value="">Select Session</option>
            @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->name }}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Course</th>
                <th>Session</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->department->name }}</td>
                    <td>{{ $student->course->name }}</td>
                    <td>{{ $student->session->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
