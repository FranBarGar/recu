#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U rec2ev -d rec2ev < $BASE_DIR/rec2ev.sql
fi
psql -h localhost -U rec2ev -d rec2ev_test < $BASE_DIR/rec2ev.sql
