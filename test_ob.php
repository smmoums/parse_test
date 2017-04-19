<?php
//echo microtime();
//echo urlencode("eyJNZXJjaGFuZGlzZU5hbWUiOiI2MOmSu+efsyIsIk9yZGVyTW9uZXkiOiIxLjAwIiwiU3RhcnREYXRlVGltZSI6IjIwMTYtMDktMTQgMTE6NDU6MzMiLCJCYW5rRGF0ZVRpbWUiOiIyMDE2LTA5LTE0IDExOjQ1OjQ4IiwiT3JkZXJTdGF0dXMiOjEsIlN0YXR1c01zZyI6IuaIkOWKnyIsIkV4dEluZm8iOiIzNWIwNWZlNC0zYTY0LTRlOTUtOTEzMS1iYjFiZTA3ODNjM2MxMDAwMS0xLTEtMTEwMDAwIiwiVm91Y2hlck1vbmV5IjowLCJVSUQiOiIyMzE4NTA5MjIwIn0=");
//AppID=8276613&OrderSerial=dd2a8c1109934336_01125_2016091411_000000&CooperatorOrderSerial=35b05fe4-3a64-4e95-9131-bb1be0783c3c&Content=eyJNZXJjaGFuZGlzZU5hbWUiOiI2MOmSu%2BefsyIsIk9yZGVyTW9uZXkiOiIxLjAwIiwiU3RhcnREYXRlVGltZSI6IjIwMTYtMDktMTQgMTE6NDU6MzMiLCJCYW5rRGF0ZVRpbWUiOiIyMDE2LTA5LTE0IDExOjQ1OjQ4IiwiT3JkZXJTdGF0dXMiOjEsIlN0YXR1c01zZyI6IuaIkOWKnyIsIkV4dEluZm8iOiIzNWIwNWZlNC0zYTY0LTRlOTUtOTEzMS1iYjFiZTA3ODNjM2MxMDAwMS0xLTEtMTEwMDAwIiwiVm91Y2hlck1vbmV5IjowLCJVSUQiOiIyMzE4NTA5MjIwIn0%3D&Sign=d45d0b742ee411d865588e638cd68c09
/*
echo __FILE__;
echo "\n";
var_dump( __DIR__ );
echo "\n";
echo "realpath(./../): ".realpath("./../");
echo "\n";
echo "realpath(): ".realpath("");
echo "\n";
echo $_SERVER['PHP_SELF'];
echo "\n";
echo $_SERVER['SCRIPT_NAME'];
echo "\n";
echo '$_SERVER["DOCUMENT_ROOT"]: '.$_SERVER['DOCUMENT_ROOT'];
echo "\n";
echo "getcwd():  ========>  ".getcwd();
*/
//__DIR__=(__DIR__)."/path";
//$dir=(&__DIR__);
//ini_set("__DIR__","aaa");
//$dir="";
$path_sep=PATH_SEPARATOR;
var_dump( $path_sep );var_dump(PATH_SEPARATOR);
$path="D:".PATH_SEPARATOR."www".PATH_SEPARATOR."test".PATH_SEPARATOR."path";
$path_two="D:".PATH_SEPARATOR."www".PATH_SEPARATOR."test".PATH_SEPARATOR."path".PATH_SEPARATOR."path_two";
$path_two_s="D:\\www\\test\\path";
set_include_path($path);
set_include_path($path_two);
//set_include_path($path_two_s);
var_dump( get_include_path() );
var_dump("orgin DIR :".__DIR__);
require("doc1.php");
require("test_overload.php");
//require("wamp.php");
require("doc_1_1.php");
//require "doc1.php";