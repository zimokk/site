<?php
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($email) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, �������� ����� � ��������� ��� ����!");
}
//���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
$email = stripslashes($login);
$email = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//������� ������ �������
$email = trim($email);
$password = trim($password);


// ������������ � ����
include ("db_connection.php");// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������ �������� ���� 

// �������� �� ������������� ������������ � ����� �� �������
$result = mysql_query("SELECT id FROM users WHERE email='$email'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("��������, �������� ���� ����� ��� ���������������. ������� ������ �����.");
}

// ���� ������ ���, �� ��������� ������
$result2 = mysql_query ("INSERT INTO users (email,password) VALUES('$email','$password')");
// ���������, ���� �� ������
if ($result2=='TRUE')
{
echo "�� ������� ����������������! ������ �� ������ ����� �� ����. <a href='../index.html'>������� ��������</a>";
}

else {
echo "������! �� �� ����������������.";
     }
?>