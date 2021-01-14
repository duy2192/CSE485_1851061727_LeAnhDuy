<?php
$day= date_diff(date_create('2000/12/29'), date_create('today'))->y;
echo password_hash('1',PASSWORD_DEFAULT);
