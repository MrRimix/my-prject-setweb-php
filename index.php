<?php
// 🔐 جلب Access Token من Azure MSI
function getMSIToken() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://169.254.169.254/metadata/identity/oauth2/token?api-version=2019-08-01&resource=https://vault.azure.net");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Metadata: true"
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    $token = json_decode($result, true);
    return $token['access_token'];
}

// 🔑 جلب قيمة سر من Key Vault
function getSecret($secretName) {
    $vaultName = "mykeysetweb"; // ← اسم الـ Key Vault
    $token = getMSIToken();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://$vaultName.vault.azure.net/secrets/$secretName?api-version=7.2");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $token"
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    return $data['value'];
}

// 🧩 جلب بيانات الاتصال من Key Vault
$servername = getSecret("db-host");
$username   = getSecret("db-user");
$password   = getSecret("db-password");
$dbname     = getSecret("name"); // ← اسم قاعدة البيانات من Key Vault

// 🛠 الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// ⚠️ التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ جلب البيانات من قاعدة البيانات
$sql = "SELECT id, name, email, phone FROM clients";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Client List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>
</body>
</html>
