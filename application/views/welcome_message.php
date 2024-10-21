<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scope Data</title>
    <style>
        /* Style for the container to center the table and add spacing */
        .table-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            overflow-x: auto;
        }

        /* Style for table headers */
        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Make table header standout */
        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Zebra striping effect */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Center heading */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Style the filter form */
        .filter-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .filter-form select,
        .filter-form input {
            padding: 8px;
            font-size: 16px;
        }

        .filter-form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .filter-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="table-container">
        <h1>Scope Data</h1>

        <!-- Filter Form -->
        <div class="filter-form">
            <form method="GET" action="">
                <label for="priority">Filter by Priority:</label>
                <select name="priority" id="priority">
                    <option value="">All</option>
                    <option value="1" <?php echo ($selected_priority == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($selected_priority == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($selected_priority == '3') ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($selected_priority == '4') ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo ($selected_priority == '5') ? 'selected' : ''; ?>>5</option>

                </select>

                <label for="microservice">Search by Microservice:</label>
                <input type="text" name="microservice" id="microservice" value="<?php echo isset($selected_microservice) ? $selected_microservice : ''; ?>" placeholder="Enter Microservice">

                <!-- Add Status Filter -->
                <label for="status">Filter by Status:</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="Done" <?php echo ($selected_status == 'Done') ? 'selected' : ''; ?>>Done</option>
                    <option value="Inprogress" <?php echo ($selected_status == 'In Progress') ? 'selected' : ''; ?>>Inprogress</option>
                </select>

                <button type="submit">Filter</button>
            </form>
        </div>

        <table>
            <tr>
                <th>Sr No.</th>
                <th>Feature</th>
                <th>Priority</th>
                <th>Microservice</th>
                <th>Status</th>
            </tr>
            <?php if (!empty($scope_data)): ?>
                <?php
                $sr_no = 1;
                foreach ($scope_data as $scope): ?>
                    <tr>
                        <td><?php echo $sr_no++; ?></td>
                        <td><?php echo $scope['Feature']; ?></td>
                        <td><?php echo $scope['Priority']; ?></td>
                        <td><?php echo $scope['Microservice']; ?></td>
                        <td><?php echo $scope['Status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No data found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</body>

</html>