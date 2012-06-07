#!/bin/sh

rm -r data/*
rm -r temp/*

/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot < "bin/export.sql"

