<?php

require dirname(__FILE__) . '/../../../main/server/ini/IniFile.php';

try {

    $iniFile = IniFile::getInstance();
    $value = $iniFile->getValue(IniFile::EMBEDLY_KEY);
    echo $value;

} catch (Exception $e) {
    echo $e;
}