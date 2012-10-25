--TEST--
phpiredis reader resetting
--SKIPIF--
<?php include 'skipif.inc'; ?>
--FILE--
<?php
$reader = phpiredis_reader_create();
phpiredis_reader_feed($reader, "+OK\r\n");
phpiredis_reader_reset($reader);
phpiredis_reader_feed($reader, "$3\r\nSET\r\n");
var_dump(phpiredis_reader_get_reply($reader) === 'SET');
phpiredis_reader_feed($reader, "OK\r\n");
phpiredis_reader_reset($reader);
phpiredis_reader_feed($reader, "$3\r\nSET\r\n");
var_dump(phpiredis_reader_get_reply($reader) === 'SET');
?>
--EXPECTF--
bool(true)
bool(true)
