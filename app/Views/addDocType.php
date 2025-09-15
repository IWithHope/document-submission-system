<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('/assets/images/Background.png') no-repeat center center fixed;
            background-size: cover;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        .form-container input,
        .form-container button,
        .form-container select,
        .form-container textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .form-container input,
        .form-container select,
        .form-container textarea {
            border: 1px solid #ccc;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .selected-users {
            margin-top: 20px;
            text-align: left;
        }
        .selected-users ul {
            list-style: none;
            padding: 0;
        }
        .selected-users li {
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }
        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 5px;
        }
        .remove-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Document</h1>
        <form action="/adminPage/saveDocType" method="POST">
        <input type="text" name="DocTypeName" placeholder="Enter Document Type" required>
        <textarea name="Description" placeholder="Enter Document Description" rows="4" required></textarea>

        <select id="userType" required>
            <option value="" disabled selected>Select User Type</option>
            <?php foreach ($userTypes as $userType): ?>
                <option value="<?= $userType['UserTypeID'] ?>"><?= $userType['UserTypeName'] ?></option>
            <?php endforeach; ?>
        </select>

        <div class="selected-users">
            <strong>Approval Order:</strong>
            <ul id="approvalOrder"></ul>
        </div>

    <!-- Hidden input to store selected user order -->
    <input type="hidden" name="selectedUsers" id="selectedUsers">

    <button type="submit">Save</button>
</form>
    </div>

    <script>
    const userTypeSelect = document.getElementById('userType');
    const approvalOrderList = document.getElementById('approvalOrder');
    const selectedUsersInput = document.getElementById('selectedUsers');

    let selectedUsers = [];

    userTypeSelect.addEventListener('change', () => {
        const selectedOption = userTypeSelect.options[userTypeSelect.selectedIndex];
        const userId = selectedOption.value;
        const userName = selectedOption.text;

        // Prevent duplicates
        if (selectedUsers.some(user => user.id === userId)) {
            alert('User already added!');
            return;
        }

        // Add the selected user to the list
        selectedUsers.push({ id: userId, name: userName });
        updateApprovalOrder();
    });

    function updateApprovalOrder() {
        approvalOrderList.innerHTML = '';
        selectedUsers.forEach((user, index) => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `
                ${index + 1}. ${user.name}
                <button class="remove-btn" onclick="removeUser('${user.id}')">Remove</button>
            `;
            approvalOrderList.appendChild(listItem);
        });

        // Update hidden input value
        selectedUsersInput.value = JSON.stringify(selectedUsers.map(user => user.id));
    }

    function removeUser(userId) {
        selectedUsers = selectedUsers.filter(user => user.id !== userId);
        updateApprovalOrder();
    }
</script>
</body>
</html>

