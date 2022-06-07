<?php

//echo md5($_GET['pwd']);


echo password_hash($_GET['pwd'], PASSWORD_BCRYPT);