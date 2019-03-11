#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE rec2ev_test;"
    psql -U postgres -c "CREATE USER rec2ev PASSWORD 'rec2ev' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists rec2ev
    sudo -u postgres dropdb --if-exists rec2ev_test
    sudo -u postgres dropuser --if-exists rec2ev
    sudo -u postgres psql -c "CREATE USER rec2ev PASSWORD 'rec2ev' SUPERUSER;"
    sudo -u postgres createdb -O rec2ev rec2ev
    sudo -u postgres psql -d rec2ev -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O rec2ev rec2ev_test
    sudo -u postgres psql -d rec2ev_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:rec2ev:rec2ev"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
