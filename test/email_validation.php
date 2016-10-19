
<?php
$email_a = 'joe@example.com';
$email_b = 'bogus';

if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    echo "Esta dirección de correo ($email_a) es válida.";
} else {
	echo "Es incorrecto 1.";
}
if (filter_var($email_b, FILTER_VALIDATE_EMAIL)) {
    echo "Esta dirección de correo ($email_b) es válida.";
} else {
	echo "<br/>Es incorrecto 2222.";
}
?>
