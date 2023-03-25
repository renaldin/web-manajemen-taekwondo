<?php
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost", "root", "", "dbtaekwondo");

if (!$conn) {
	echo "gagal connect database";
} else {
};
