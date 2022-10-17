<?php
// simple conexion a la base de datos
function connect()
{
	return new mysqli("localhost", "userdb", "4ccess.d6", "BDAlamun");
}
