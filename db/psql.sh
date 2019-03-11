#!/bin/sh

[ "$1" = "test" ] && BD="_test"
psql -h localhost -U rec2ev -d rec2ev$BD
