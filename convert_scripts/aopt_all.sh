#!/bin/bash

TARGET_LIST="\
nagatama_labels \
nagatama_outline \
suziguro_labels \
suziguro_outline \
yamamayuga_labels \
yamamayuga_outline \
"

for TARGET in ${TARGET_LIST}; do
    rm -rf bingeo_decimate?
    mkdir bingeo_${TARGET}_decimate1
    aopt.exe -i ${TARGET}_decimate1.x3d -G "bingeo_${TARGET}_decimate1/:saic" -x ${TARGET}_decimate1_aopt.x3d
    mkdir bingeo_${TARGET}_decimate2
    aopt.exe -i ${TARGET}_decimate2.x3d -G "bingeo_${TARGET}_decimate2/:saic" -x ${TARGET}_decimate2_aopt.x3d
done
