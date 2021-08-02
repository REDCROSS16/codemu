<?php

'<div class="note">'
. '<p>'
. "<span class='date'>" . $row['date'] . "</span>"
. "<span class='name'>" . $row['user'] . "</span>"
. '</p>'
. '<p>' . $row['message'] . '</p></div>';